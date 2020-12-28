<?php


namespace App\Classes;

use App\AbstractClasses\Robot;

/**
 * Class MergeRobot
 * @package App\Classes
 */
class MergeRobot extends Robot
{
    /**
     * @var array
     * List all assembled robots
     */
    private $robots = [];

    public function __construct()
    {
        $this->type = 'MergeRobot';
    }

    /**
     * @param mixed $robots
     * Add single robot or array of robots
     */
    public function addRobot($robots)
    {
        if (true === is_array($robots)) {

            foreach ($robots as $robot) {

                $this->assembleRobot($robot);
            }

        } else {

            $this->assembleRobot($robots);
        }
    }

    /**
     * @param Robot $robot
     */
    private function assembleRobot(Robot $robot)
    {
        $this->robots[] = $robot;

        $this->addWeight($robot);
        $this->addSpeed($robot);
        $this->addHeight($robot);
    }

    /**
     * @param Robot $robot
     * Sum of all weight
     */
    private function addWeight(Robot $robot)
    {
        $this->setWeight($this->getWeight() + $robot->getWeight());
    }

    /**
     * @param Robot $robot
     * Select less speed
     */
    private function addSpeed(Robot $robot)
    {
        // if this first robot or robot speed less then total speed
        if (1 === count($this->robots) || $this->getSpeed() > $robot->getSpeed()) {
            $this->setSpeed($robot->getSpeed());
        }
    }

    /**
     * @param Robot $robot
     * Sum of all height
     */
    private function addHeight(Robot $robot)
    {
        $this->setHeight($this->getHeight() + $robot->getHeight());
    }
}
