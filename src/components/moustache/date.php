<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class date {

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
        if (empty($this->args)){ return; }

        $date = new \DateTime($this->data['post']->post_date);
        $this->result = $date->format($this->args);

    }

    

}