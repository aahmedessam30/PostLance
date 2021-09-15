<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence(),
        'content' => $faker->paragraph(8),
        'image'   => $faker->imageUrl(750, 300),
    ];
});
