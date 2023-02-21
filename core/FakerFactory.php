<?php 

namespace Core;

use Faker\Factory;

class FakerFactory{


    public function create(){
    $faker=Factory::create();
    echo $faker->randomNumber(3);
    }
}