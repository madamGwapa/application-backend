<?php

use Faker\Generator as Faker;

$factory->define(App\Folder::class, function (Faker $faker) {
    return [
        'code' => $faker->random()->randomLetter,
        'folder_name' => $faker->random()->word
    ];
});

$factory->define(App\Workpaper::class, function (Faker $faker) {
    return [
        //
        'reference' => $faker->word,
        'content' => $faker->sentence,
        'folder_id' => function () {
            return factory('App\Folder')->create()->id
        }
    ];
});
