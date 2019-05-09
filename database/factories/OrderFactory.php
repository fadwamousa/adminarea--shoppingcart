<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'user_id' => function(){

          return User::all()->random();

        }
    ];
});
