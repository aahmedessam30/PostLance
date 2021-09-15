<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $posts = Post::latest()->get();
        $comments = Comment::latest()->get();
        return view('admin.layouts.dashboard', ['users' => $users, 'posts' => $posts, 'comments' => $comments]);
    }
}
