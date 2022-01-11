<?php

namespace andyp\pagebuilder\isotope\components;

use andyp\pagebuilder\isotope\components\enqueue;
use andyp\pagebuilder\isotope\components\classes;
use andyp\pagebuilder\isotope\components\render;
use andyp\pagebuilder\isotope\components\filters;
use andyp\pagebuilder\isotope\components\sorting;
use andyp\pagebuilder\isotope\components\theme;
use andyp\pagebuilder\isotope\components\template;
use andyp\pagebuilder\isotope\components\query;


class isotope
{

    private $organism;

    private $results = [];

    private $output;

    private $loop_index = 0;



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

        $this->append_classes();

        $this->add_filters_to_template();

        $this->items();

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
        $this->filters->render();
    }

    private function new_sorting()
    {
        $this->sorting = new sorting;
        $this->sorting->set_options($this->organism);
        $this->sorting->render();
    }



    private function append_classes()
    {
        $this->classes = new classes;
        $this->classes->set($this->organism["grid_item_classes"]);
        $this->classes->add('{{taxonomies}}');
        $this->classes->add($this->filters->get_cell_moustaches());
        $this->organism["classes"] = $this->classes->get();
    }


    private function add_filters_to_template()
    {
        $this->template = new template;
        $this->template->set_template($this->organism["template"]);
        $this->template->set_classes( $this->organism["classes"]);
        $this->template->set_attributes($this->filters->get_cell_attributes());
        $this->template->run();
        $this->organism["template"] = $this->template->get_output();
    }




    private function items()
    {

        if (empty($this->results)) { return; }
        if ( !is_array( $this->results ) ) { return; }

        $this->output = $this->render->open_wrapper() . PHP_EOL;

        $this->output .= $this->controls();

        $this->output .= $this->render->open_grid() . PHP_EOL;

        foreach ( $this->results as $this->loop_index => $item ) {
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
        $theme->set_loop_index($this->loop_index);
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


    private function enqueue_assets()
    {
        $this->enqueue = new enqueue;
        $this->enqueue->set_slug($this->organism['slug']);
        $this->enqueue->set_css($this->organism['additional_css']);
        $this->enqueue->set_js($this->organism['javascript']);
        $this->enqueue->run();
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