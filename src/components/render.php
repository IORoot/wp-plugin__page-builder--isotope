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
        return '<div class="isotope '.$this->options['slug'].'">';
    }


    public function close_wrapper()
    {
        return '</div>';
    }


    public function open_grid()
    {
        $isotope = '';

        if ($this->options['isotope_arguments'] != ''){
            $isotope = 'data-isotope=\' '.$this->options['isotope_arguments'].' \'';
        }

        return '<div class="isotope-grid" '.$isotope.'>';
    }


    public function close_grid()
    {
        return '</div>';
    }


}