<?php

namespace andyp\pagebuilder\isotope\interfaces;

interface filterInterface
{

    public function set_options($options);

    public function set_data($data);

    public function run();

    public function get_output();


}