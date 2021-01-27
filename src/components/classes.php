<?php

namespace andyp\pagebuilder\isotope\components;

class classes
{

    private $classes;


    public function set($classes)
    {
        $this->classes = $classes;
    }


    public function add($classes)
    {

        if (is_string($classes)){
            $this->classes .= ' ' . $classes;
        }

        if (is_array($classes)){
            foreach ($classes as $class) { $this->classes .= ' ' . $class; }
        }
    }

    public function get()
    {
        return $this->classes;
    }


}