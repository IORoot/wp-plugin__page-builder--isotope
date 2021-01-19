<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class image_url {


    public $match;
    public $theme;
    public $data;
    public $args = 'full';
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
        if (is_a($this->data['post'], 'WP_Post'))
        {
            $this->post();
        }
        
        if (is_a($this->data['post'], 'WP_Term'))
        {
            $this->term();
        }
    }


    private function post()
    {
        $this->result = get_the_post_thumbnail_url($this->data['post'], $this->args);
    }


    private function term()
    {
        $image_id = $this->data["meta"]["featured_image"][0];
        if (empty($image_id)){ return; }
        $this->result = wp_get_attachment_image_url( $image_id, $this->args );

    }

    

}