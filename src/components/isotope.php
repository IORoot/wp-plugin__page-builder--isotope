<?php

namespace andyp\pagebuilder\isotope\components;

use andyp\pagebuilder\isotope\components\render;
use andyp\pagebuilder\isotope\components\filters;
use andyp\pagebuilder\isotope\components\sorting;
use andyp\pagebuilder\isotope\components\theme;
use andyp\pagebuilder\isotope\components\query;


class isotope
{

    private $organism;

    private $results = [];

    private $output;



    public function set_organism($organism)
    {
        $this->organism = $organism;
    }


    public function get_output()
    {
        return $this->output;
    }



    public function run()
    {
        
        $this->query();

        if (empty($this->results)){ return; }

        $this->set_slug();

        $this->new_render();

        $this->new_filters();

        $this->new_sorting();

        $this->wrap_theme_with_filters();

        $this->items();

        $this->inline_css();

        $this->enqueue_js();

        $this->inline_js();

    }


    private function new_render()
    {
        $this->render = new render;
        $this->render->set_options($this->organism);
    }

    private function new_filters()
    {
        $this->filters = new filters;
        $this->filters->set_options($this->organism);
        $this->filters->set_results($this->results);
        $this->filters->render();
        $this->organism['cell_moustaches'] = $this->filters->get_cell_moustaches();
        $this->organism['cell_attributes'] = $this->filters->get_cell_attributes();
    }

    private function new_sorting()
    {
        $this->sorting = new sorting;
        $this->sorting->set_options($this->organism);
        $this->sorting->render();
    }





    private function wrap_theme_with_filters()
    {
        $theme  = '<div class="grid-item';
        $moustaches = $this->organism['cell_moustaches'];
        $attributes = $this->organism['cell_attributes'];

        // Add {{moustaches}} for filters
        if (is_array($moustaches)){
            foreach ($moustaches as $moustache) { $theme .= ' ' . $moustache; }
        }

        // Add classes for grid-item
        $theme .= ' ' . $this->organism["grid_item_classes"] . '" ';

        // Add data-attributes
        if (is_array($attributes)){
            foreach ($attributes as $attribute) { $theme .= ' ' . $attribute; }
        }

        $theme .= ' >';
        $theme .= $this->organism["template"];
        $theme .= '</div>';

        $this->organism["template"] = $theme;
    }




    private function items()
    {

        if (empty($this->results)) { return; }
        if ( !is_array( $this->results ) ) { return; }

        $this->output = $this->render->open_wrapper() . PHP_EOL;

        $this->output - $this->controls();

        $this->output .= $this->render->open_grid() . PHP_EOL;
        
        foreach ( $this->results as $item ) {
            $this->output .= $this->theme($item);
        }

        $this->output .= $this->render->close_grid() . PHP_EOL;

        $this->output .= $this->render->close_wrapper() . PHP_EOL;

    }




    private function theme($cell)
    {
        $theme = new theme;
        $theme->set_theme($this->organism["template"]);
        $theme->set_cell_data($cell);
        $theme->convert_moustaches();
        $this->output .= $theme->result() . PHP_EOL;
    }


    private function controls()
    {

        $this->output .= $this->render->open_controls();
        $this->output .= $this->filters->get_output();
        $this->output .= $this->sorting->get_output();
        $this->output .= $this->render->close_controls();
    }


    private function enqueue_js()
    {
        wp_enqueue_script('isotope_js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');

        // JS needs to be enqueud to allow inlining.
        wp_enqueue_script('andyp_isotope_inline_js', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/inline.js', ['isotope_js']);

        wp_enqueue_script('andyp_isotope_filtering', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/filtering_and_sorting.js', ['andyp_isotope_inline_js']);

    }

    private function inline_css()
    {
        if (empty($this->organism['additional_css'])){ return; }

        wp_register_style('andyp_isotope_css', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/css/inline.css');
        wp_add_inline_style( 'andyp_isotope_css' , $this->organism['additional_css'] );
        wp_enqueue_style( 'andyp_isotope_css');
    }




    private function inline_js()
    {
        if (empty($this->organism['javascript'])){ return; }

        $this->javascript .= 'window.addEventListener("load",function(event) {';
        $this->javascript .= $this->organism['javascript'];
        $this->javascript .= ' isotope_list.push(".'.$this->organism['slug'].'"); ' ; // add slug to 'isotope_list' array (see filtering.js)
        $this->javascript .= '},false);';
        
        wp_add_inline_script( 'andyp_isotope_inline_js' , $this->javascript );
    }



    private function query()
    {
        $query = new query;
        $query->set_options($this->organism);
        $query->run();
        $this->results = $query->get_results();
    }


    private function set_slug()
    {
        $this->organism['slug'] = sanitize_title($this->organism['title']);
    }


    private function lb($in)
    {
        $this->organism[$in] = preg_replace("/\r|\n/", "", $this->organism[$in]);
    }


    private function cast_to_float($in)
    {
        $this->organism[$in] = (float) $this->organism[$in];
    }


}