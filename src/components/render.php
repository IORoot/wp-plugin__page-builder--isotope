<?php

namespace andyp\pagebuilder\isotope\components;

class render
{

    public $options;

    public function set_options($options)
    {
        $this->options = $options;
    }


    public function open_wrapper()
    {
        return '<div class="isotope '.$this->options['slug'].' '.$this->options['classes'].'">';
    }


    public function close_wrapper()
    {
        return '</div>';
    }


    public function open_grid()
    {
        return '<div class="isotope-grid">';
    }


    public function close_grid()
    {
        return '</div>';
    }


    public function open_controls()
    {
        return '<div class="controls flex">';
    }


    public function close_controls()
    {
        return '</div>';
    }

}