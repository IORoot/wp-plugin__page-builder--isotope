<?php

namespace andyp\pagebuilder\isotope\components\render;

use andyp\pagebuilder\isotope\interfaces\renderInterface;

class select implements renderInterface
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

        $this->open_select();

            $this->loop_options();

        $this->close_select();

        $this->close_wrapper();
    }

    public function get_output()
    {
        return $this->output;
    }


    private function setup_variables()
    {
        $this->slug              = $this->data['slug'];
        $this->classes           = $this->options['filter_render']['select_classes'];
        $this->data_filter_group = $this->data["data-filter-group"];
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
     *          <select>
     *          </select>
     *      </div>
     * </div>
     */

    private function open_select()
    {
        $select[] = '<select class="';
            $select[] .= $this->slug . '-' . $this->data_filter_group.' '; 
            $select[] .= $this->classes['select_classes'];
            $select[] .= '" ';
            $select[] .= 'aria-label="';
            $select[] .= 'Select the '.$this->data_filter_group;
            $select[] .= '" ';
        $select[] .= '>'. PHP_EOL;

        $this->output .= implode('',$select);
    }

    private function close_select()
    {
        $this->output .= '</select>';
    }



    /**
     * <div class="filters">
     *      <div class="filter">
     *          <select>
     *              <option></option>
     *              <option></option>
     *              <option></option>
     *          </select>
     *      </div>
     * </div>
     */
    private function loop_options()
    {
        foreach ($this->items as $this->option_name => $this->option_value){
            $this->check_values();
            $this->open_option();
            $this->close_option();
        }
    }

    /**
     * If the class is just an integer (.3)
     * This is an invalid class. Therefore prefix with the
     * data_filter_group and rename the keys,
     */
    private function check_values()
    {
        // Removes the '.' at the front.
        $value = \sanitize_title($this->option_value);

        // checks if it a number in string form.
        if (is_numeric($value)){
            $this->option_value = "." . $this->data_filter_group . $value;
            $this->option_name = $value;
        }
    }


    private function open_option()
    {
        $value = \sanitize_title($this->option_value);
        if (!empty($value)){
            $value = '.'.$value;
        }
        $this->output .= '<option class="option '.$this->classes['option_classes'].'" value="'. $value .'" >'. $this->option_name;

    }

    private function close_option()
    {
        $this->output .= '</option>'. PHP_EOL;
    }


}