<?php

namespace andyp\pagebuilder\isotope\components;

class sorting
{

    private $options;

    /**
     * HTML Output
     */
    private $output;


    public function set_options($options){
        $this->options = $options["sorting_group"];
    }

    public function render(){

        if ($this->options["render_sorting"] == false){ return; }

        $this->open_wrapper();

        $this->open_select();

        $this->loop_options();

        $this->show_reverse();

        $this->close_wrapper();
    }

    public function get_output(){
        return $this->output;
    }

    private function open_wrapper()
    {
        $this->output = '<div class="sorting '.$this->options["sort_wrapper_classes"].'">';
    }

    private function close_wrapper()
    {
        $this->output .= '</div>';
    }

    private function open_select()
    {
        $this->output .= '<select class="'.$this->options["sort_select_classes"].'">';
    }

    private function close_select()
    {
        $this->output .= '<select>';
    }

    private function loop_options()
    {
        foreach($this->options["sortings"] as $this->sorting)
        {
            $this->open_option();
            $this->close_option();
        }
    }

    private function open_option()
    {
        $this->output .= '<option class="'.$this->options["sort_options_classes"].'" value="'.$this->sorting['value'].'" >' . $this->sorting['label'];
    }

    private function close_option()
    {
        $this->output .= '</option>';
    }

    private function show_reverse()
    {
        if ($this->options["render_reverse"] == false){ return; }

        $this->output .= '<input class="'.$this->options["reverse_input_classes"].'" type="checkbox" id="reverse" name="reverse" checked></input>';
        $this->output .= '<label class="'.$this->options["reverse_label_classes"].'" for="reverse">';
        $this->output .= $this->options["reverse_label_text"];
        $this->output .= '</label>';

    }
}