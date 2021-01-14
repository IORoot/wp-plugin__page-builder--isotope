<?php

namespace andyp\pagebuilder\isotope\components;

use andyp\pagebuilder\isotope\components\javascript;

/**
 * 
 * Filters available:
 * 
 * apply_filters('andyp_isotope_filters_filters', $output);
 * apply_filters('andyp_isotope_filters_filter', $output);
 * apply_filters('andyp_isotope_filters_select', $output);
 * apply_filters('andyp_isotope_filters_option', $output);
 * apply_filters('andyp_isotope_filters_output', $output);
 * 
 * 
 */
class filters
{

    public $options;

    
    /**
     * Taxonomy
     */
    public $taxonomy;

    public $terms;

    public $term;

    /**
     * PostMeta
     */
    public $results;

    public $postmeta_fields;

    public $postmeta_field;

    public $postmeta = false; 


    /**
     * Output
     * 
     */
    public $output;


    
    public function set_options($options)
    {
        $this->options = $options;
    }
    
    /**
     * Used for the POSTMETA
     */
    public function set_results($results)
    {
        $this->results = $results;
    }




    public function render()
    {
        if ($this->options['render_filters'] == FALSE){
            return;
        }

        if (empty($this->options['taxonomies'])){
            return;
        }

        $this->open_filters();

        $this->loop_taxonomies();

        $this->loop_postmetas();

        $this->close_filters();

        return apply_filters('andyp_isotope_filters_output', $this->output);

    }



    private function loop_taxonomies()
    {

        foreach ($this->options['taxonomies'] as $this->taxonomy)
        {
            $this->set_taxonomy();

            $this->get_tax_terms();

            $this->open_wrapper();

            $this->open_select();

            $this->add_all_term();

            $this->loop_terms();

            $this->close_select();

            $this->close_wrapper();

            $this->javascript();
        }

    }



    private function loop_postmetas()
    {
        if (empty($this->options['postmeta_fields'])){ return; }
        if (empty($this->results)){ return; }

        $this->postmeta = true; // Use to switch off the get_tax_terms() function

        foreach($this->options['postmeta_fields'] as $this->postmeta_field)
        {
            $this->postmeta_field = $this->postmeta_field['postmeta_field'];

            $this->postmetas_as_taxonomies();

            $this->postmetas_as_terms();

            $this->loop_taxonomies();
        }

    }



    private function postmetas_as_taxonomies()
    {
        $this->options['taxonomies'] = $this->options['postmeta_fields'];
    }



    private function postmetas_as_terms()
    {
        // Clear the terms array, so we can reuse it for custom postmetas
        $this->terms = [];

        foreach ($this->results as $result)
        {
            // WP_Post object
            if (property_exists($result['post'], $this->postmeta_field))
            {
                $this->terms[] = $result['post']->$this->postmeta_field;
            }

            // Meta Array
            if (array_key_exists($this->postmeta_field, $result['meta']))
            {
                $this->terms[] = $result['meta'][$this->postmeta_field][0];
            }

        }

        
    }


    private function set_taxonomy()
    {
        if ($this->postmeta == true){ 
            $this->taxonomy = $this->taxonomy['postmeta_field'];
            return; 
        }

        $this->taxonomy = $this->taxonomy['taxonomy'];
    }

    private function get_tax_terms()
    {
        if ($this->postmeta == true){ return; }

        $this->terms = get_terms($this->taxonomy);

        if (is_a($this->terms, 'WP_Error')){ return; }
    }

    private function open_filters()
    {
        $output = '<div class="filters '.$this->options['filters_classes'].'">';

        $this->output .= apply_filters('andyp_isotope_filters_filters', $output);
    }

    private function close_filters()
    {
        $this->output .= '</div>';
    }

    private function open_wrapper()
    {
        $output = '<div class="filter '.$this->options['filter_classes'].'" data-filter-group="'.$this->taxonomy.'">';

        $this->output .= apply_filters('andyp_isotope_filters_filter', $output);
    }

    private function close_wrapper()
    {
        $this->output .= '</div>';
    }

    private function open_select()
    {
        $output = '<select class="' . $this->options['slug'] . '-' . $this->taxonomy.' '.$this->options['select_classes'].'">';
    
        $this->output .= apply_filters('andyp_isotope_filters_select', $output);
    }

    private function close_select()
    {
        $this->output .= '</select>';
    }

    private function add_all_term()
    {

        $title = str_replace('_', ' ', $this->taxonomy);
        $title = str_replace('-', ' ', $title);
        $title = preg_replace('/(?<!\ )[A-Z]/', ' $0', $title);

        $all = [
            'slug' => '',
            'name' => 'All ' . ucwords($title),
        ];

        array_unshift($this->terms, $all);

    }

    private function loop_terms()
    {
        foreach ($this->terms as $this->term){

            $this->term = (array) $this->term;

            $this->postmeta_option();

            if (!empty($this->term['slug'])){
                $this->term['slug'] = '.' . $this->term['slug'];
            }

            $this->render_option();
        }
    }



    private function postmeta_option()
    {
        if ($this->postmeta == false){ return; }
        if (array_key_exists('slug',$this->term)){ return; }

        $value = $this->term;

        $this->term['slug'] = $value[0];
        $this->term['name'] = $value[0];
    }




    private function render_option()
    {

        $output =  '<option class="option '.$this->options['option_classes'].'" value="'. $this->term['slug'] .'">'. $this->term['name'] .'</option>';
        
        $this->output .= apply_filters('andyp_isotope_filters_option', $output);

    }


    private function javascript()
    {
        $js = new javascript;
        $js->set_slug($this->options['slug']);
        $js->set_taxonomy($this->taxonomy);
        $js->enqueue();
    }

    
}