<?php

namespace andyp\pagebuilder\isotope\components\filters;

use andyp\pagebuilder\isotope\interfaces\filterInterface;

class filter_postmeta implements filterInterface
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
        $this->postmeta_choices();
        $this->add_all_term();

    }

    public function get_output()
    {
        return $this->output;
    }


    private function set_data_filter_group()
    {
        $this->output['data-filter-group'] = $this->options['postmeta_field'];
    }


    private function set_cell_moustaches()
    {
        $this->output['cell_moustaches'] = '{{'.$this->options['postmeta_field'].':sanitize}}';
    }

    private function set_cell_attributes()
    {
        $this->output['cell_attributes'] = '';
    }


    private function postmeta_choices()
    {
    
        $field = $this->options['postmeta_field'];

        foreach ($this->data as $data)
        {
            // WP_Post object
            if (property_exists($data['post'], $field))
            {
                $value = $data['post']->$field;
                $this->output['items'][ucwords($value)] = '.' . sanitize_title($value);
            }

            // Meta Array
            if (array_key_exists($field, $data['meta']))
            {
                $value = $data['meta'][$field][0];
                $this->output['items'][ucwords($value)] = '.' . $value;
            }

        }

    }



    private function add_all_term()
    {

        $title = str_replace('_', ' ', $this->options['postmeta_field']);
        $title = str_replace('-', ' ', $title);
        $title = preg_replace('/(?<!\ )[A-Z]/', ' $0', $title);
        $title = 'All ' . ucwords($title);

        if (!empty($this->options["all_label"])){
            $title = $this->options["all_label"];
        }

        $all = [  $title => '' ];
        $this->output['items'] = array_merge($all, $this->output['items']);

    }


}
