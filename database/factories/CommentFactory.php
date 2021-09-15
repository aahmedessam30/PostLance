<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'content' => $faker->paragraph(2),
        'image'   => $faker->imageUrl(200, 100),
        'user_id' => User::all()->random(),
    ];
});
