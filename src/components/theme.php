<?php

namespace andyp\pagebuilder\isotope\components;

class theme
{

    public $theme;

    public $cell_data;

    public $loop_index;

    public $moustache_functions;

    

    public function set_theme($theme)
    {
        $this->theme = $theme;
    }

    public function set_cell_data($cell_data)
    {
        $this->cell_data = $cell_data;
    }

    public function set_loop_index($loop_index)
    {
        $this->cell_data['loop_index'] = $loop_index;
    }

    public function result()
    {
        return $this->theme;
    }

    public function convert_moustaches()
    {
        if (empty($this->theme)){ return; }

        $this->strip_administrator_only_parts();

        preg_match_all('/\{\{([\S|\s]*?)\}\}/', $this->theme, $matches);
        
        foreach ($matches[1] as $match) {
            $this->search_through_post($match);
            $this->search_through_meta($match);
            $this->search_through_extra($match);
        }

        return;
    }


    public function strip_administrator_only_parts()
    {
        if (!current_user_can('administrator')){
            $this->theme = preg_replace('/{{admin}}.*{{\/admin}}/sU', '', $this->theme);
        } else {
            $this->theme = preg_replace('/{{\/*admin}}/', '', $this->theme);
        }
    }



    public function search_through_post($match)
    {
        if (!isset($match)) {
            return;
        }

        $moustache_parts = explode(':', $match);
        $field = $moustache_parts[0];

        // if (!isset($this->cell_data['post']->$field)) {
        //     return;
        // }
        if (!property_exists($this->cell_data['post'],$field)) {
            return;
        }

        $value = $this->cell_data['post']->$field;

        if (isset( $moustache_parts[1])){
            $value = $this->modify_field($value,$moustache_parts[1]);
        }

        $this->theme = str_replace('{{'.$match.'}}', $value, $this->theme);

        return;
    }




    public function search_through_meta($match)
    {
        if (!isset($match)) {
            return;
        }

        $moustache_parts = explode(':', $match);
        $field = $moustache_parts[0];

        // if (!isset($this->cell_data['meta'][$field])) {
        //     return;
        // }
        if (!array_key_exists($field, $this->cell_data['meta'])) {
            return;
        }

        $value = $this->cell_data['meta'][$field][0];

        
        // if (isset( $moustache_parts[1]) && $moustache_parts[1] == 'sanitize'){
        if (isset( $moustache_parts[1]) && isset($moustache_parts[1])){
            $value = $this->modify_field($value,$moustache_parts[1]);
        }

        // check if INTEGER and prefix the field name.
        if (isset( $moustache_parts[2]) && $moustache_parts[2] == 'classname'){
            if (is_numeric($value)){
                $value = $moustache_parts[0] . $value;
            }
        }

        $this->theme = str_replace('{{'.$match.'}}', $value, $this->theme);

        return;
    }






    
    public function search_through_extra($match)
    {
        $match_parts = explode(':', $match);

        $this->get_moustache_list();

        foreach ($this->moustache_functions as $moustache) {

            if ($moustache != $match_parts[0]){ continue; }

            $instance = '\\andyp\\pagebuilder\\isotope\\components\\moustache\\'. $moustache;

            $obj = new $instance;
            $obj->set_match($match);
            $obj->set_theme($this->theme);
            $obj->set_data($this->cell_data);

            /**
             * If there is a {{image_url:full}}
             * send the 'full' to set_args()
             */
            if (!empty($match_parts[1])){
                $arg_array = $match_parts;
                unset($arg_array[0]);
                $arg_string = implode(':',$arg_array);
                $obj->set_args($arg_string);
            }

            $obj->match();
            $this->theme = $obj->result();
        }
    }




    public function get_moustache_list()
    {
        $files = scandir(__DIR__ . '/moustache');

        foreach ($files as $file) {
            $file = str_replace('.php', '', $file);
            $file_array["${file}"] = $file;
        }

        unset($file_array['.']);
        unset($file_array['..']);

        $this->moustache_functions = $file_array;

        return;
    }


    private function modify_field($field, $modification)
    {

        $mod_parts = explode(',', $modification);
        $mod_type = $mod_parts[0];
        $namespaced = '\\andyp\\pagebuilder\\isotope\\components\\modifiers\\' . $mod_type;
        $mod = new $namespaced;

        $mod->set_field($field);
        $mod->set_config($mod_parts);
        $mod->run();
        return $mod->get_result();
    }


}
