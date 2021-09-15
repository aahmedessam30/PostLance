<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\comment\CreateCommentRequest;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(10);
        return view("admin.comments.index", ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('admin.comments.create', ['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request)
    {
        $validated = $request->validated();

        if ($request->image) {
            $validated['image'] = $validated['image']->store('images');
        }

        auth()->user()->comments()->create($validated);
        return redirect(route('admin.comment.admins'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->forceDelete();
        return redirect(route('admin.comment.index'));
    }
}
