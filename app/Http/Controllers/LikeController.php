<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function likes($post_id)
    {
        $likes = Like::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();

        if ($likes) {
            $likes->delete();
            return back();
        } else {
            Like::create([
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
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Like $like)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Like $like)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Like $like)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Like  $like
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Like $like)
    // {
    //     //
    // }
}
