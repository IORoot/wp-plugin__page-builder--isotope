<?php

namespace andyp\pagebuilder\isotope\components\modifiers;

class slice
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
        if (empty($this->config[2])){return; }

        $parts = explode($this->config[1], $this->field);
        $parts = array_slice($parts, $this->config[2]);
        if (empty($parts)){
            $this->output = $this->field;
            return;
        }
        $this->output = implode($this->config[1], $parts);
        
    }

    public function get_result()
    {
        return $this->output;
    }
}