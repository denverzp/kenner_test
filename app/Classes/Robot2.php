<?php


namespace App\Classes;


use App\AbstractClasses\Robot;

class Robot2 extends Robot
{
    public function __construct()
    {
        $this->type = 'Robot2';

        $this->weight = 2000;
        $this->speed = 20;
        $this->height = 200;
    }

}
