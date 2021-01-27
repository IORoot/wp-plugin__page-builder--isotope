<?php

namespace andyp\pagebuilder\isotope\components\moustache;

/**
 * Adds all taxonomy terms and parent terms
 */
class taxonomies {


    public $match;
    public $theme;
    public $data;
    public $result;


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
        $post = $this->data['post'];

        $taxonomies = get_post_taxonomies($post);

        $terms = get_the_terms($post, $taxonomies[0]);

        // Add parents
        foreach ($terms as $term)
        {
            if (empty($term->parent)){ continue; }
            $parent_term = get_term($term->parent, $taxonomies[0]);
            $terms[] = $parent_term;
        }

        // make string
        foreach($terms as $term)
        {
            $this->result .= ' ' . $term->slug ;
        }

    }
 

}