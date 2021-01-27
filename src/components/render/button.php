<?php

namespace andyp\pagebuilder\isotope\components\render;

use andyp\pagebuilder\isotope\interfaces\renderInterface;

class button implements renderInterface
{

    private $data;

    private $options;

    private $attributes;

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
        $this->setup_variables();

        $this->open_wrapper();

        $this->loop_buttons();

        $this->close_wrapper();
    }


    public function get_output()
    {
        return $this->output;
    }


    private function setup_variables()
    {
        $this->slug              = $this->data['slug'];
        $this->classes           = $this->options['filter_render']['button_classes'];
        $this->data_filter_group = $this->options["data_filter_group"];
        $this->items             = $this->data['items'];
    }




    /**
     * <div class="filters">
     *      <div class="filter">
     *      </div>
     * </div>
     */

    private function open_wrapper()
    {
        $this->output .= '<div class="filter '.$this->classes['filter_classes'].'" data-filter-group="'.$this->data_filter_group.'" >'. PHP_EOL;
    }

    private function close_wrapper()
    {
        $this->output .= '</div>';
    }



    /**
     * <div class="filters">
     *      <div class="filter">
     *          <button></button>
     *          <button></button>
     *          <button></button>
     *      </div>
     * </div>
     */
    private function loop_buttons()
    {
        foreach ($this->items as $this->option_name => $this->option_value){
            $this->option();
        }
    }

    private function option()
    {

        $this->output .= '<button class="option '.$this->classes['button_classes'].'" value="'. $this->option_value .'" >'. $this->option_name . '</button>'. PHP_EOL;

    }


}