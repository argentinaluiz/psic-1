<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\TypeChoice::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
