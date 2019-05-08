<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name'    => $faker->word,
        'detail'  => $faker->paragraph,
        'price'   => $faker->numberBetween(1000, 9000), // 8567
        'file'    => $faker->imageUrl(640,480)


    ];
});
