<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(App\User::class, function ($faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => str_random(10),
//        'remember_token' => str_random(10),
//    ];
//});
$factory->define(CodeAgenda\Entities\Person::class, function($faker){
   return [
       'name' => $faker->name,
       'nickname' => $faker->firstName,
       'sex' => $faker->randomElement(['F', 'M'])
   ];
});
$factory->define(\CodeAgenda\Entities\Phone::class, function($faker){
    return [
        'description' => $faker->randomElement(['residencial', 'comercial', 'celular', 'recado']),
        'country_code' => $faker->optional(0.7, 55)->numberBetween(1,197),
        'number' => rand(10000000000,99999999999),
        'person_id' => rand(1, 30)
    ];
});