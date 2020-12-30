<?php


namespace App\Classes;


use \App\AbstractClasses\Robot;

/**
 * Class FactoryRobot
 * @package App\Classes
 * @property array|mixed createRobot1
 * @property array|mixed createRobot2
 * @property array|mixed createMergeRobot
 */
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

            //@TODO - NOTICE - store robot details in factory $types storage
            // haven`t any way to modify stored robot details
            $this->types[$robot->type] = $robot;
        }

    }

    /**
     * @param $name
     * @param $args
     * @return array|mixed|null
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

                //clone - get new object - not copy of the initial
                $result[$i] = clone $this->types[$robotType];
            }

            // return array of robots or single robot - if assembled single
            return count($result) > 1 ? $result : $result[0];
        }

        return null;
    }
}
