<?php

namespace andyp\pagebuilder\isotope\components\modifiers;

class admin
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
        if (current_user_can('administrator')){
            $this->output = addslashes(strip_tags($this->field));
        }
    }

    public function get_result()
    {
        return $this->output;
    }
}