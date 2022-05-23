<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index() 
    {
        // $likes = Like::where('post_id', $post->id)->count();
        // $countComments = Comment::where('post_id', $post->id)->count();

        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts.index', [
        "title" => "All Posts" . $title,
        // "likes" => $likes,
        // "countComments" => $countComments,
        "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        "categories" => Category::all()
    ]);
    }

    public function create()
    {
        return view('posts.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // $validatedData['slug'] = Crypt::encryptString($validatedData['slug']);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);

        return redirect('/posts')->with('success', 'New Posts Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $childs = Comment::where(Comment::class, 'childs', $request->parent);
        $likes = Like::where('post_id', $post->id)->count();
        $countComments = Comment::where('post_id', $post->id)->count();
        // $comments = Comment::where('parent', 0)->latest()->get();
        // $childs = Comment::where(Comment::class, 'childs', $request->parent)->latest()->get();
        return view('post', [
        "title" => "Single Post",
        "likes" => $likes,
        "countComments" => $countComments,
        // "comments" => Comment::latest()->where('parent', 0)->get(),
        // "childs" => Comment::select('parent')->orderBy('created_at','desc')->get(),
        // "childs" => Comment::with('childs')->where('parent')->orderBy('created_at','desc')->get(),
        // "childs" => $childs,
        "post" => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $validatedData = $request->validate([
        //     'title' => 'required|max:255',
        //     'slug' => "required|unique:posts,slug,$post->id",
        //     'category_id' => 'required',
        //     'body' => 'required'
        // ]);

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/posts')->with('success', 'Post Has Been Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);

        return redirect('/posts')->with('success', 'Post Has Been Deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function postComments(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        Comment::create($request->all());

        return back()->with('success', 'Comments Has Added');
        // return back()->withInput();
    }

    // public function likes(Post $post, Request $request)
    // {
    //     $likes = Like::where('post_id', $post->id)->count();
    //     return view('post', compact('likes'));
    // }
    // public function subComments(Request $request)
    // {
    //     $childs = Comment::where(Post::class, 'slug', $request->title);
    // }

    // function menampilkan single post
    // public function show(Post $post)
    // {
    //     return view('post', [
    //     "title" => "Single Post",
    //     "active" => 'posts',
    //     "post" => $post
    // ]);
    // }
}
