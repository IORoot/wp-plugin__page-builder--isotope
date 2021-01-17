<?php

namespace andyp\pagebuilder\isotope\interfaces;

interface renderInterface
{

    public function set_options($options);

    public function set_data($data);

    public function run();

    public function get_output();


}