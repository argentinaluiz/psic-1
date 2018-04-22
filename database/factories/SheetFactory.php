<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Painel\Sheet::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
