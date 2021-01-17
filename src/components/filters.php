<?php

namespace andyp\pagebuilder\isotope\components;

use andyp\pagebuilder\isotope\components\filter_taxonomies;

class filters
{

    public $options;

    /**
     * PostMeta
     */
    public $results;

    /**
     * HTML Output
     */
    public $output;

    /**
     * Classes to add to each cell
     */
    public $cell_moustaches;

    /**
     * data-attributes to add to each cell
     */
    public $cell_attributes;

    /**
     * Contains the data to send to the renderer
     */
    private $filter_data;
    




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
        if ($this->options['render_filters'] == FALSE){ return; }

        $this->output .= $this->open_filters();

        foreach ($this->options['filters'] as $this->current_filter)
        {
            $this->get_filter_data();

            $this->set_cell_moustaches();

            $this->set_cell_attributes();

            $this->render_filter();

        }

        $this->output .= $this->close_filters();
    }


    public function get_output()
    {
        return $this->output;
    }


    public function get_cell_moustaches()
    {
        return $this->cell_moustaches;
    }


    public function get_cell_attributes()
    {
        return $this->cell_attributes;
    }



    private function get_filter_data()
    {
        $filter_type       = $this->current_filter['acf_fc_layout'];
        $namespaced_filter = '\\andyp\\pagebuilder\\isotope\\components\\filters\\' . $filter_type;

        $filter = new $namespaced_filter;
        $filter->set_data($this->results);
        $filter->set_options($this->current_filter);
        $filter->run();
        $this->filter_data = $filter->get_output();
    }


    private function set_cell_moustaches()
    {
        $this->cell_moustaches[] = $this->filter_data['cell_moustaches'];
    }


    private function set_cell_attributes()
    {
        $this->cell_attributes[] = $this->filter_data['cell_attributes'];
    }


    private function render_filter()
    {
        $this->filter_data['slug'] = sanitize_title($this->options['title']);

        $render_type       = $this->current_filter['filter_render']['render_type'];
        $namespaced_render = '\\andyp\\pagebuilder\\isotope\\components\\render\\' . $render_type;

        $render = new $namespaced_render;
        $render->set_data($this->filter_data);
        $render->set_options($this->current_filter);
        $render->run();
        $this->output .= $render->get_output();
    }



    /**
     * <div class="filters">
     * </div>
     */
    private function open_filters()
    {
        $output = '<div class="filters '.$this->options['filters_classes'].'">';

        $this->output .= apply_filters('andyp_isotope_filters_open', $output);
    }

    private function close_filters()
    {
        $this->output .= '</div>';
    }


}