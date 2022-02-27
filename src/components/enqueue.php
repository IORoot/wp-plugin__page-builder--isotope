<?php

namespace andyp\pagebuilder\isotope\components;

class enqueue
{

    private $slug;
    private $css;
    private $js;


    public function set_slug($slug)
    {
        $this->slug = $slug;
    }

    public function set_css($css)
    {
        $this->css = $css;
    }

    public function set_js($js)
    {
        $this->js = $js;
    }


    public function run(){
        $this->enqueue_js();
        $this->inline_css();
        $this->inline_js();
    }


    private function enqueue_js()
    {
        // wp_enqueue_script('isotope_js', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
        wp_enqueue_script('isotope_js', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/isotope.min.js');

        // JS needs to be enqueud to allow inlining.
        wp_enqueue_script('andyp_isotope_inline_js', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/inline.js', ['isotope_js']);

        wp_enqueue_script('andyp_isotope_filtering', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/js/filtering_and_sorting.js', ['andyp_isotope_inline_js']);

    }

    private function inline_css()
    {
        if (empty($this->css)){ return; }

        wp_register_style('andyp_isotope_css', ANDYP_PAGEBUILDER_ISOTOPE_URL.'src/css/inline.css');
        wp_add_inline_style( 'andyp_isotope_css' , $this->css );
        wp_enqueue_style( 'andyp_isotope_css');
    }




    private function inline_js()
    {
        if (empty($this->js)){ return; }

        // $this->javascript =  'window.addEventListener("load",function(event) {';
        $this->javascript = $this->js;
        // $this->javascript .= ' isotope_list.push(".'.$this->slug.'"); ' ; // add slug to 'isotope_list' array (see filtering.js)
        // $this->javascript .= '},false);';
        
        wp_add_inline_script( 'andyp_isotope_inline_js' , $this->javascript );
    }

}