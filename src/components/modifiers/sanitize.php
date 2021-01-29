<?php

namespace andyp\pagebuilder\isotope\components\modifiers;

class sanitize
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
        $this->output = sanitize_title($this->field);
    }

    public function get_result()
    {
        return $this->output;
    }
}