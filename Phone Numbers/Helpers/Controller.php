<?php

class Controller
{
    public function display($file, $data = [])
    {
        require "View/{$file}.view.php";
    }
}
