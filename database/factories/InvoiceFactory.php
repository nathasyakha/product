<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use App\User;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return User::all()->random();
        },
        'invoiceDate' => $faker->dateTime($max = 'now', $timezone = null),
        'invoiceDue' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});
