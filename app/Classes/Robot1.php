<?php


namespace App\Classes;


use App\AbstractClasses\Robot;

class Robot1 extends Robot
{
    /**
     * Robot1 constructor.
     */
    public function __construct()
    {
        $this->type = 'Robot1';

        $this->weight = 1000;
        $this->speed = 10;
        $this->height = 100;
    }
}
