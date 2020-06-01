<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'store_id' => 1,
        'name' => $faker->name,
        'bname' => $faker->name,
        'manufacturer' => $faker->name,
        's_desc' => $faker->paragraph,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'in_stock' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});
