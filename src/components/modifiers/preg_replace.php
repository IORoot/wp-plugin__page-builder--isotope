<?php

namespace andyp\pagebuilder\isotope\components\modifiers;

class preg_replace
{
    private $field;
    private $config;
    private $output;

    public function set_field($field)
    {
        $this->field = $field;
    }

    public function set_config($config)
    {
        $this->config = $config;
    }

    public function run()
    {
        if (empty($this->config[1])){return; }

        $this->output = preg_replace($this->config[1], $this->config[2], $this->field);
        
    }

    public function get_result()
    {
        return $this->output;
    }
}