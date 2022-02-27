<?php

namespace andyp\pagebuilder\isotope\components\render;

use andyp\pagebuilder\isotope\interfaces\renderInterface;

class text implements renderInterface
{

    private $data;

    private $options;

    private $attributes;

    private $output;


    public function set_data($data)
    {
        $this->data = $data;
    }

    public function set_options($options)
    {
        $this->options = $options;
    }

    public function run()
    {

        $this->text_input();
    }


    public function get_output()
    {
        return $this->output;
    }

    private function text_input()
    {
        $this->output .= '<input type="text" class="quicksearch '.$this->options["search_classes"].'" placeholder="Search" />'. PHP_EOL;
    }

}