<?php

namespace andyp\pagebuilder\isotope\components;

class template
{

    private $template;

    private $classes;

    private $attributes;

    private $output;

    public function set_template($template)
    {
        $this->template = $template;
    }

    public function set_classes($classes)
    {
        $this->classes = $classes;
    }

    public function set_attributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function get_output()
    {
        return $this->output;
    }


    /**
     * Wraps each cell with a DIV with classes and data-attributes
     * - grid-item
     * - taxonomies
     * - data-unixtime
     */
    public function run()
    {
        // Open DIV
        $this->start_open_wrapper();

        // Add classes for grid-item
        $this->add_classes();

        // Add data-attributes
        $this->add_data_attributes();

        // Add unixdate as standard
        $this->add_unixdate();
        
        // >
        $this->end_open_wrapper();

        // add cell template
        $this->add_template();

        // close DIV
        $this->close_wrapper();
    }



    private function start_open_wrapper()
    {
        $this->output = '<div class="grid-item';
    }


    private function add_classes()
    {
        $this->output .= ' ' . $this->classes . '" ';
    }

    private function add_data_attributes()
    {
        $attributes = $this->attributes;
        if (is_array($attributes)){
            foreach ($attributes as $attribute) { 
                $this->output .= ' ' . $attribute;
            }
        }
    }

    private function add_unixdate()
    {
        $this->output .= ' data-unixdate="{{unixdate}}"';
    }


    private function end_open_wrapper()
    {
        $this->output .= ' >';
    }


    private function add_template()
    {
        $this->output .= $this->template;
    }


    private function close_wrapper()
    {
        $this->output .= '</div>';
    }

}