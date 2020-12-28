<?php


namespace App\AbstractClasses;


/**
 * Class Robot
 * @package App\Classes
 */
abstract class Robot
{
    /**
     * @var string
     * Robot type - need for identification
     */
    public $type;

    protected $weight;

    protected $speed;

    protected $height;


    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }
}
