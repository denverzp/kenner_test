<?php
//connect composer autoload
require_once __DIR__ . '/vendor/autoload.php';


use App\Classes\FactoryRobot;
use App\Classes\MergeRobot;
use App\Classes\Robot1;
use App\Classes\Robot2;


$factory = new FactoryRobot();
// Robot1, Robot2 типи роботів які може створювати фабрика
$factory->addType(new Robot1());
$factory->addType(new Robot2());

var_dump($factory->createRobot1(5));
var_dump($factory->createRobot2(2));

$mergeRobot = new MergeRobot();
$mergeRobot->addRobot(new Robot2());
$mergeRobot->addRobot($factory->createRobot2(2));

$factory->addType($mergeRobot);

// cant direct get factory call to reset function - got error "Only variables should be passed by reference"
// @source https://www.php.net/manual/en/function.reset.php
//$res = reset($factory->createMergeRobot(1));

//if created single robot - factory return single object
$res = $factory->createMergeRobot(1);

//Результатом роботи методу буде мінімальна швидкість з усіх об’єднаних роботів
echo $res->getSpeed() . PHP_EOL;
// Результатом роботи методу буде сума всіх ваг об’єднаних роботів
echo $res->getWeight() . PHP_EOL;

// For multiple assembled robots all working well too
//$results = $factory->createMergeRobot(3);
//foreach ($results as $result) {
//    //Результатом роботи методу буде мінімальна швидкість з усіх об’єднаних роботів
//    echo $result->getSpeed() . PHP_EOL;
//    // Результатом роботи методу буде сума всіх ваг об’єднаних роботів
//    echo $result->getWeight() . PHP_EOL;
//}
