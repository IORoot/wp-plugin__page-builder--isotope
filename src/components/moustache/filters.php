<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class filters 
{

    public $match;
    public $theme;
    public $data;
    public $args = 'full';
    public $result;


    /**
     * This will be the taxonomy we want
     */
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

        if ($this->args == 'taxonomies'){
            $this->match_all();
            return;
        }

        $post = $this->data['post'];

        $terms = get_the_terms($post, $this->args);

        if (is_a($terms, 'WP_Error')){ return; }

        foreach ($terms as $term)
        {
            $this->result .= $term->slug . ' ';
        }

    }


    public function match_all()
    {

        $post = $this->data['post'];

        $taxonomies = get_post_taxonomies($post);

        foreach ($taxonomies as $taxonomy)
        {
            $terms = get_the_terms($post, $taxonomy);

            if (is_a($terms, 'WP_Error')){ continue; }

            foreach ($terms as $term)
            {
                $this->result .= $term->slug . ' ';
            }

        }

    }


    

}