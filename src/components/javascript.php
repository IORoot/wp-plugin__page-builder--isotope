<?php

namespace andyp\pagebuilder\isotope\components;

class javascript
{

    public $slug;


    public $taxonomy;


    public $script_name;



    public function set_slug($slug)
    {
        $this->slug = $slug;
    }

    public function set_taxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;
    }

    public function enqueue()
    {
        $this->register_javascript();

        $this->add_inline_javascript();
        
        $this->enqueue_javascript();
    }


    private function register_javascript()
    {
        $this->script_name = $this->slug . '-' . $this->taxonomy;

        wp_register_script(  $this->script_name  , ANDYP_PAGEBUILDER_ISOTOPE_URL . '/src/js/blank.js');
    }

    private function enqueue_javascript()
    {
        wp_enqueue_script( $this->script_name );
    }

    private function add_inline_javascript()
    {
        wp_add_inline_script($this->script_name, $this->inline_javascript());
    }

    private function inline_javascript()
    {

        $this->script = 'window.onload=(function() {'. PHP_EOL;

            $this->js_root_variables();

            $this->script .= '(function() {'. PHP_EOL;

                $this->js_function_variables();

                $this->js_func_getSelectedOption();

                $this->js_loop_select_options();

            $this->script .= '}() );'. PHP_EOL;

            $this->js_func_concatValues();

        $this->script .= '});'. PHP_EOL;

        return $this->script;
    }

    private function js_root_variables()
    {
        $this->script .= 'var $isotope_element = document.querySelector(\''.$this->slug.'\');'. PHP_EOL;
        $this->script .= 'var $grid_element   = document.querySelector(\''.$this->slug.' .isotope-grid\');'. PHP_EOL;
        $this->script .= 'var $select_element = document.querySelectorAll(\''.$this->slug.' .isotope-grid\'),'. PHP_EOL;
        $this->script .= 'var $grid_data      = Isotope.data( $grid );'. PHP_EOL;
        
    }


    private function js_function_variables()
    {
        $this->script .= 'var $select = document.querySelectorAll(\'.'.$this->script_name.'\');'. PHP_EOL;
        $this->script .= 'var filters = {};'. PHP_EOL;
    }


    private function js_loop_select_options()
    {
        $this->script .= 'for(i=0; i<$select.length; i++) {'. PHP_EOL;
            $this->js_add_event_listener();
        $this->script .= '}'. PHP_EOL;
    }


    private function js_add_event_listener()
    {
        $this->script .= '$select[i].addEventListener(\'change\', function(event) {  '. PHP_EOL;

            $this->script .= 'var opt = getSelectedOption(event.target);'. PHP_EOL;

            $this->script .= 'var selectGroup = fizzyUIUtils.getParent( event.target, \'.'.$this->script_name.'\' );'. PHP_EOL;

            $this->script .= 'filters[selectGroup.dataset.filterGroup] = opt.value;'. PHP_EOL;

            $this->script .= 'var isoFilters = [];'. PHP_EOL;

            $this->script .= 'for (var group in filters) { isoFilters.push(filters[group]) }'. PHP_EOL;

            $this->script .= 'var selector = concatValues(isoFilters);'. PHP_EOL;

            $this->script .= 'iso.arrange({ filter: selector });'. PHP_EOL;

        $this->script .= '}); '. PHP_EOL;
    }


    private function js_func_getSelectedOption()
    {
        $this->script .= '
        function getSelectedOption(sel) {
            var opt;
            for ( var i = 0, len = sel.options.length; i < len; i++ ) {
                opt = sel.options[i];
                if ( opt.selected === true ) {
                    break;
                }
            }
            return opt;
        }';
    }


    private function js_func_concatValues()
    {
        $this->script .= '
        function concatValues( obj ) {
            var value = \'\';
            for ( var prop in obj ) {
                value += obj[ prop ];
            }
    
            console.log(value);
    
            return value;
        }';
    }

    
}