<?php

namespace andyp\pagebuilder\isotope\components;

class query
{

    private $query_type;

    private $options;

    private $results;


    public function set_options($options)
    {
        $this->options = $options;
    }


    public function run()
    {
        if (empty($this->options)){ return; }
        
        $this->query_type = $this->options['query_type'];

        $this->query_switch();
    }

    public function get_results()
    {
        return $this->results;
    }



    private function query_switch()
    {
        if ($this->query_type == 'taxonomy'){
            $this->tax_query();
            $this->tax_metadata();
            return;
        }

        $this->post_query();
        $this->post_metadata();
    }


    private function post_query()
    {
        if (empty($this->options['wp_query'])){ return; }
        $post_query = $this->options['wp_query'];
        $args = eval("return $post_query;");
        $this->results = get_posts($args);
    }


    private function post_metadata()
    {
        if (empty($this->results)){ return; }
        foreach ($this->results as $key => $WP_Post) {
            $this->results[$key] = [];
            $this->results[$key]['post'] = $WP_Post;
            $this->results[$key]['meta'] = get_metadata('post', $WP_Post->ID);
        }
    }

    private function tax_query()
    {
        if (empty($this->options['wp_term_query'])){ return; }
        $tax_query = $this->options['wp_term_query'];
        $args = eval("return $tax_query;");
        $this->results = get_terms($args);

    }


    private function tax_metadata()
    {
        if (empty($this->results)){ return; }
        foreach ($this->results as $key => $WP_Term) {
            $this->results[$key] = [];
            $this->results[$key]['post'] = $WP_Term;
            $this->results[$key]['meta'] = get_term_meta($WP_Term->term_id);
        }
    } 



}