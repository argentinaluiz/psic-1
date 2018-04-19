<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Painel\ListChoice::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
