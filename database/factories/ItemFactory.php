<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\Item;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'invoice_id' => function () {
            return Invoice::all()->random();
        },
        'item' => $faker->word,
        'product_id' => function () {
            return Product::all()->random();
        },
        'quantity' => $faker->randomDigit,
    ];
});
