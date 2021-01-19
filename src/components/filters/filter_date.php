<?php

namespace andyp\pagebuilder\isotope\components\filters;

use andyp\pagebuilder\isotope\interfaces\filterInterface;

class filter_date implements filterInterface
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
        $this->add_time_choices();
        $this->add_all_term();
    }

    public function get_output()
    {
        return $this->output;
    }



    private function set_data_filter_group()
    {
        $this->output['data-filter-group'] = $this->options['operator']['value'];
    }


    private function set_cell_moustaches()
    {
        $this->output['cell_moustaches'] = '';
    }

    private function set_cell_attributes()
    {
        $this->output['cell_attributes'] = 'data-unixdate="{{unixdate}}"';
    }


    private function add_time_choices()
    {

        foreach ($this->options['date_fields'] as $item)
        {
            $value = strtotime($item['date_field']);
            $label = $item['label'];
    
            $this->output['items'][$label] = $value;
        }
        
    }


    private function add_all_term()
    {


        $title = 'All ' . ucwords($this->options['operator']['label']);

        if (!empty($this->options["all_label"])){
            $title = $this->options["all_label"];
        }

        $all = [ $title => '' ];
        $this->output['items'] = array_merge($all, $this->output['items']);

    }


}
