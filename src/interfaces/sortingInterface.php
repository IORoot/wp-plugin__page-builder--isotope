<?php

namespace andyp\pagebuilder\isotope\interfaces;

interface sortingInterface
{

    public function set_options($options);

    public function run();

    public function get_output();


}