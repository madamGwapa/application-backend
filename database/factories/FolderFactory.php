<?php

use Faker\Generator as Faker;

$factory->define(App\Folder::class, function (Faker $faker) {
    return [
        'code' => $faker->unique()->randomLetter,
        'folder_name' => $faker->word
    ];
});

$factory->define(App\Workpaper::class, function (Faker $faker) {
    return [
        //
        'reference' => $faker->unique()->word,
        'workpaper_name' => $faker->word,
        'folder_id' => function () {
            return factory('App\Folder')->create()->id;
        }
    ];
});
