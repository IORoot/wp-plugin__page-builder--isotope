<?php

namespace andyp\pagebuilder\isotope\components\filters;

use andyp\pagebuilder\isotope\interfaces\filterInterface;

class filter_taxonomies implements filterInterface
{

    private $options;

    private $data;

    private $output;



    public function set_data($data)
    {  
        $this->data = $data;
    }

    public function set_options($options)
    {  
        $this->options = $options;
    }

    public function run()
    {
        $this->output = [];

        $this->set_data_filter_group();
        $this->set_cell_moustaches();
        $this->set_cell_attributes();
        $this->get_tax_terms();
        $this->alphabetical();
        $this->add_all_term();
    }


    public function get_output()
    {
        return $this->output;
    }


    private function set_data_filter_group()
    {
        $this->output['data-filter-group'] = $this->options['taxonomy'];
    }


    private function set_cell_moustaches()
    {
        $this->output['cell_moustaches'] = '';
    }

    
    private function set_cell_attributes()
    {
        $this->output['cell_attributes'] = '';
    }


    private function get_tax_terms()
    {
        $tax_query = $this->options['taxonomy'];
        $args = eval("return $tax_query;");
        $terms = get_terms($args);

        if (is_a($terms, 'WP_Error')){ return; }

        foreach($terms as $term)
        {
            $class_selector = '.' . $term->slug;
            $this->output['items'][ucwords($term->name)] = $class_selector;
        }
    }


    private function alphabetical()
    {
        ksort($this->output['items']);
    }


    private function add_all_term()
    {

        $title = str_replace('_', ' ', $this->options['taxonomy']);
        $title = str_replace('-', ' ', $title);
        $title = preg_replace('/(?<!\ )[A-Z]/', ' $0', $title);
        $title = 'All ' . ucwords($title);

        if (!empty($this->options["all_label"])){
            $title = $this->options["all_label"];
        }

        $all = [  $title => '' ];
        $this->output['items'] = array_merge($all, $this->output['items'] );

    }


}
