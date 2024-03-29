<?php

namespace andyp\pagebuilder\isotope\components\moustache;

/**
 * Adds all taxonomy terms and parent terms {{taxonomies}}}
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

        if (is_a($this->data['post'], 'WP_Post')){
            $this->match_wp_post();
        }

        if (is_a($this->data['post'], 'WP_Term')){
            $this->match_wp_term();
        }

    }


    private function match_wp_post()
    {
    
        $this->taxonomies = get_post_taxonomies($this->data['post']);

        foreach ($this->taxonomies as $this->loop_taxonomy)
        {
            $this->get_taxonomy_terms();
        }

    }

    private function get_taxonomy_terms()
    {
        $terms = get_the_terms($this->data['post'], $this->loop_taxonomy);

        // Add parents
        foreach ($terms as $term)
        {
            if (empty($term->parent)){ continue; }
            $parent_term = get_term($term->parent, $this->loop_taxonomy);
            $terms[] = $parent_term;
        }

        // make string
        foreach($terms as $term)
        {
            $this->result .= ' ' . $term->slug ;
        }
    }



    private function match_wp_term()
    {
        $term = $this->data['post'];

        // Add parent
        if (!empty($term->parent)){ 
            $parent_term = get_term($term->parent, $term->taxonomy);
            $this->result .= ' ' . $parent_term->slug;
        }

        $this->result .= ' ' . $term->slug ;
    }


}