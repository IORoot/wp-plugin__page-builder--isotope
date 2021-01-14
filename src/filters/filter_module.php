<?php

namespace andyp\pagebuilder\isotope\filters;

use andyp\pagebuilder\isotope\components\isotope;

class filter_module
{


    public function __construct()
    {
        add_filter('pagebuilder_isotope', [$this, 'filter_code'], 10, 1);
    }


    public function filter_code($organism)
    {

        $isotope = new isotope;

        $isotope->set_organism($organism);

        $isotope->run();

        return $isotope->get_output();

    }

}