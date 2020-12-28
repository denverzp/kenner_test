<?php


namespace App\Classes;


use \App\AbstractClasses\Robot;

class FactoryRobot
{
    /**
     * @var array
     */
    private $types = [];

    /**
     * @param Robot $robot
     */
    public function addType(Robot $robot)
    {
        // check for robot type in registered types
        if (false === array_key_exists($robot->type, $this->types)) {

            $this->types[$robot->type] = $robot;
        }

    }

    /**
     * @param $name
     * @param $args
     * @return array|null
     */
    public function __call($name, $args)
    {
        // search method name started with "create" - like "createRobot1"
        $robotType = str_replace('create', '', $name);

        // only if get robotType in registered types - create result array
        if(true === array_key_exists($robotType, $this->types) && !empty($args[0])){

            $result = [];

            // fill result array with objects
            for($i = 0; $i < (int)$args[0]; $i++){

                $result[$i] = $this->types[$robotType];
            }

            // return array of robots or single robot - if assembled single
            return count($result) > 1 ? $result : $result[0];
        }

        return null;
    }
}
