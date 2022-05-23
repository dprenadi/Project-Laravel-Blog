<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{

    public function countComments($post_id)
    {
        $countComments = Comment::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();

        if ($countComments) {
            $countComments->delete();
            return back();
        } else {
            Comment::create([
                'post_id' => $post_id,
                'user_id' => auth()->user()->id
            ]);
            return back();
        }
        
    }

    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreCommentRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreCommentRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Comment  $comment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Comment $comment)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Comment  $comment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Comment $comment)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateCommentRequest  $request
    //  * @param  \App\Models\Comment  $comment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateCommentRequest $request, Comment $comment)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Comment  $comment
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Comment $comment)
    // {
    //     //
    // }
}
