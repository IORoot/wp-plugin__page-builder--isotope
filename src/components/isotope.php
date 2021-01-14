<?php

namespace andyp\pagebuilder\isotope\components;

use andyp\pagebuilder\isotope\components\render;
use andyp\pagebuilder\isotope\components\filters;
use andyp\pagebuilder\isotope\components\theme;


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
        if (empty($this->organism['wp_query'])){ return; }

        $this->query();

        $this->metadata();

        $this->set_slug();

        $this->new_render();

        $this->new_filters();

        $this->render();

        $this->register_assets();

        $this->inline_css();

        $this->enqueue_assets();

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
    }


    private function render()
    {

        if (empty($this->results)) { return; }
        if ( !is_array( $this->results ) ) { return; }

        $this->output = $this->render->open_wrapper() . PHP_EOL;

        $this->output .= $this->filters->render();

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


    private function register_assets()
    {
        wp_register_script( 'andyp_isotope_js', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/andyp-isotope.js' );
        wp_register_script( 'isotope_js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js' );

    }

    private function inline_css()
    {
        if (empty($this->organism['additional_css'])){ return; }
        wp_add_inline_style( 'andyp_isotope_css' , $this->organism['additional_css'] );
    }


    private function enqueue_assets()
    {
        wp_enqueue_script('isotope_js');
        wp_enqueue_script('andyp_isotope_js');
    }



    private function query()
    {
        if (empty($this->organism['wp_query'])){ return; }
        $post_query = $this->organism['wp_query'];
        $args = eval("return $post_query;");
        $this->results = get_posts($args);
    }


    private function metadata()
    {
        if (empty($this->results)){ return; }
        foreach ($this->results as $key => $WP_Post) {
            $this->results[$key] = [];
            $this->results[$key]['post'] = $WP_Post;
            $this->results[$key]['meta'] = get_metadata('post', $WP_Post->ID);
        }
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