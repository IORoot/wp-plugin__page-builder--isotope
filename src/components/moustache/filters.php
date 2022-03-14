<?php

namespace andyp\pagebuilder\isotope\components\moustache;

class filters 
{

    public $single_result;
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

        $this->single_result();

        if ($this->args == 'taxonomies'){
            $this->match_all();
            return;
        }

        $this->items = $this->data['post'];
        
        if (!is_a($this->items, 'WP_Term')) {
            $terms = $this->wp_post();
        }

        if (is_a($this->items, 'WP_Term')) {
            $terms = $this->wp_term();
        } 

        if (is_a($terms, 'WP_Error')){ return; }

        foreach ($terms as $term)
        {
            $this->result .= $term->slug . ' ';
        }

        if (isset($this->single_result)){
            $this->result = $terms[$this->single_result]->slug;
        }

    }

    private function single_result()
    {
        $parts = explode(':',$this->args);
        if (isset($parts[1])) {
            $this->single_result = $parts[1];
            $this->args = substr($this->args, 0, -2);
        }

    }
    
    private function wp_post()
    {

        $terms = get_the_terms($this->items, $this->args);
        $ordered_tems = [];

        foreach ($terms as $index => $term)
        {
            // ADD TO FRONT OF ARRAY
            if ($term->parent == 0){
                array_unshift($ordered_tems, $term);
            }

            // ADD TO END OF ARRAY
            if ($term->parent != 0){
                array_push($ordered_tems, $term);
            }
        }
        
        return $ordered_tems;
    }



    private function wp_term()
    {
        $all_terms[] = $child_term = $this->items;

        if ($child_term->parent != 0){
            $all_terms[] = get_term($child_term->parent);
        }

        
        
        return $all_terms;
    }


    public function match_all()
    {

        $post = $this->data['post'];

        $taxonomies = get_post_taxonomies($post);

        foreach ($taxonomies as $taxonomy)
        {
            $terms = get_the_terms($post, $taxonomy);

            if (is_a($terms, 'WP_Error')){ continue; }
            if (empty($terms)){ continue; }

            foreach ($terms as $term)
            {
                $this->result .= $term->slug . ' ';
            }

        }

    }


    

}