<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class loop_index {

    public $match;
    public $theme;
    public $data;
    public $args;
    public $result;
    

    public function set_args($args)
    {
        $this->args = $args;
    }

    public function set_match($match)
    {
        $this->match = $match;
    }

    public function set_theme($theme)
    {
        $this->theme = $theme;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }

    public function result()
    {
        return str_replace('{{'.$this->match.'}}', $this->result, $this->theme);
    }

    public function match()
    {
        $number = $this->data['loop_index'];
        $length = 4;
        $this->result = substr(str_repeat(0, $length).$number, - $length);
    }


}