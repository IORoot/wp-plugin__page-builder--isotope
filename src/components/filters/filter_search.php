<?php

namespace andyp\pagebuilder\isotope\components\filters;

use andyp\pagebuilder\isotope\interfaces\filterInterface;

class filter_search implements filterInterface
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

        $this->set_cell_moustaches();
        $this->set_cell_attributes();
    }

    public function get_output()
    {
        return $this->output;
    }


    private function set_cell_moustaches()
    {
        $this->output['cell_moustaches'] = '';
    }

    private function set_cell_attributes()
    {
        $this->output['cell_attributes'] = '';
    }


}
