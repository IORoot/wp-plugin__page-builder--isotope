<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class datetime {

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

        $this->args = explode(',',$this->args);

        $datetime_input = $this->search_for_value();
        if (!$datetime_input){ return; }

        // Add @ if a timestamp.
        if ($this->isValidTimeStamp($datetime_input)){
            $datetime_input = '@'.$datetime_input;
        }

        $date = new \DateTime($datetime_input);
        $this->result = $date->format($this->args[1]);

    }

    
    private function search_for_value()
    {
        $field = $this->args[0];

        if (property_exists($this->data['post'],$field))
        {
            return $this->data['post']->$field;
        }

        if (array_key_exists($field, $this->data['meta']))
        {
            return $this->data['meta'][$field][0];
        }   

        return false;

    }

    // DateTime class expects an @ before a timestamp. So check for a valid timestamp.
    private function isValidTimeStamp($timestamp)
    {
        return ((string) (int) $timestamp === $timestamp) 
            && ($timestamp <= PHP_INT_MAX)
            && ($timestamp >= ~PHP_INT_MAX);
    }


}