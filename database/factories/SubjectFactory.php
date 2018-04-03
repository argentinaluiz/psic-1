<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Painel\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});

