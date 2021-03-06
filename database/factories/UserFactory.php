<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'enrolment' => str_random(6),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Models\Painel\UserProfile::class, function (Faker $faker) {

    return [
        'address' => $faker->address,
        'cep' => function() use($faker){
            $cep = preg_replace('/[^0-9]/','',$faker->postcode());
            return $cep;
        },
        'number' => rand(1,100),
        'complement' => rand(1,10)%2==0?null:$faker->sentence,
        'state_id' => rand(1,200), 
        'city_id' => rand(1,200), 
        'neighborhood' => $faker->city,
       // 'state' => collect(\App\Models\Painel\State::$states)->random(),
       // 'state' => collect(\App\Models\Painel\State::pluck('state_id'))->random(),
    ];
});