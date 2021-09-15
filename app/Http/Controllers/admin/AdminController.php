<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\User;
use App\Comment;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function add_admin(User $user)
    {
        $user->assignRole('admin');
        $users = User::Role('admin');
        return redirect(route('admin.user.admins', ['users' => $users]));
    }

    public function remove_admin(User $user)
    {
        $user->removeRole('admin');
        $users = User::Role('admin');
        return redirect(route('admin.user.admins', ['users' => $users]));
    }

    public function users()
    {
        $users = User::role('admin')->paginate(10);
        return view("admin.users.admins", ['users' => $users]);
    }

    public function posts()
    {
        $posts = auth()->user()->posts()->paginate(10);
        return view("admin.posts.admins", ['posts' => $posts]);
    }

    public function comments()
    {
        $comments = auth()->user()->comments()->paginate(10);
        return view("admin.comments.admins", ['comments' => $comments]);
    }
}
