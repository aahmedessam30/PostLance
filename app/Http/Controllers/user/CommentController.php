<?php

namespace App\Http\Controllers\user;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\comment\EditCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::latest()->where('user_id', auth()->id())->paginate(10);
        return view('user.comments.index', ['comments' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EditCommentRequest $request)
    {
        $validated = $request->validated();
        if ($validated['image']) {
            $validated['image'] = $validated['image']->store('images');
        }

        auth()->user()->comments()->create($validated);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        Gate::authorize('update', $comment);
        return view('user.comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(EditCommentRequest $request, Comment $comment)
    {
        $validated = $request->validated();
        if ($request->image) {
            $validated['image'] = $validated['image']->store('images');
        }

        $comment->update($validated);
        return redirect(route('user.post.show', $comment->post));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('forceDelete', $comment);
        $comment->forceDelete();
        return back();
    }
}
