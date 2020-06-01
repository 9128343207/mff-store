<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductsPhoto;
use Faker\Generator as Faker;

$factory->define(ProductsPhoto::class, function (Faker $faker) {
    return [
        'filename' => 'p'.rand(1, 19).'.jpg',
    ];
});
