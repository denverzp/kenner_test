<?php
//connect composer autoload
require_once __DIR__ . '/vendor/autoload.php';


use App\Classes\FactoryRobot;
use App\Classes\Robot1;
use App\Classes\Robot2;
use App\Classes\MergeRobot;


$factory = new FactoryRobot();
// Robot1, Robot2 типи роботів які може створювати фабрика
$factory->addType(new Robot1());
$factory->addType(new Robot2());

//var_dump($factory->createRobot1(5));
//var_dump($factory->createRobot2(2));

$mergeRobot = new MergeRobot();
$mergeRobot->addRobot(new Robot2());
$mergeRobot->addRobot($factory->createRobot2(2));

$factory->addType($mergeRobot);

$res = reset($factory->createMergeRobot(1));

//Результатом роботи методу буде мінімальна швидкість з усіх об’єднаних роботів
echo $res->getSpeed();
// Результатом роботи методу буде сума всіх ваг об’єднаних роботів
echo $res->getWeight();
