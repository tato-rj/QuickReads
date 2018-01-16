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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Story::class, function (Faker $faker) {
    $title = $faker->sentence;

    return [
        'slug' => str_slug($title),
        'title' => $title,
        'summary' => $faker->paragraph,
        'content' => $faker->text(800),
        'author_id' => function() {
            return factory('App\Author')->create()->id;
        },
        'category_id' => function() {
            return factory('App\Category')->create()->id;
        },
        'reading_time' => $faker->randomDigitNotNull,
        'cost' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Author::class, function (Faker $faker) {

    $name = $faker->name;
    $died = $faker->year;
    $born = $faker->year($died);

    return [
        'slug' => str_slug($name),
        'name' => $name,
        'born_in' => $born,
        'died_in' => $died,
        'life' => $faker->paragraph
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    $name = $faker->word;

    return [
        'slug' => str_slug($name),
        'name' => $name,
        'sorting_order' => $faker->randomDigitNotNull
    ];
});