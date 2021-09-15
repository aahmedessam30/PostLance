<?php

use App\Post;
use App\User;
use App\Comment;
use App\Country;
use App\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);

        Role::create(['name' => 'user']);

        factory(Country::class, 20)->create();

        factory(User::class, 20)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(Post::class, 2)->make())->each(function ($post) {
                $post->comments()->saveMany(factory(Comment::class, 2)->make());
            });
        });

        User::create([
            'name' => 'Ahmed Essam',
            'email' => "aahmedessam32@yahoo.com",
            'password' => Hash::make('01094286927'),
            'age' => '21',
            'gender' => 'Male',
            'address' => 'Mansoura , Egypt',
            'phone' => '01094286927',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole(['admin', 'user']);
    }
}
