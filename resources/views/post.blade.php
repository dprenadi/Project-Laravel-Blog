@extends('layouts.main')

@section('container')

    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-7">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
                    <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                </p>

                {{-- IMAGE --}}
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt=".." class="img-fluid">
                @else    
                    <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" alt=".." class="img-fluid">
                @endif
                {{-- END IMAGE --}}
                
                <article class="my-3">
                    {!! $post->body !!}
                </article>

                <br>
                <a href="/posts" class="btn btn-outline-info mt-2">Kembali</a>
            </div>

            <div class="col-md-5 ms-auto">
                {{-- <div class="row justify-content-center">
                    <div class="col-md-8"> --}}
                    
                    @if(session()->has('success'))
                        <div class="alert alert-info" role="alert">
                        {{ session('success') }}
                        </div>
                    @endif
                    
                {{-- BUTTON ACTION --}}
                <div class="my-2">
                    {{-- LIKE --}}
                    <a href="/likes/{{ $post->id }}" class="btn btn-sm btn-transparent"><span data-feather="thumbs-up"></span> {{ $likes }} Like</a>
            
                    {{-- COMMENT --}}
                    <a href="/countComments/{{ $post->id }}" class="btn btn-sm btn-transparent" id="btn-comments"><span data-feather="message-square"></span> {{ $countComments }} Comment</a>
                </div>
                {{-- END BUTTON ACTION --}}
        
                {{-- TEXT AREA COMMENTS --}}
                <form action="/comments" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="hidden" name="parent" value="0">
                        <textarea class="form-control" id="comments" name="comments"></textarea>
                        <label for="comments">Comments</label>
                        <input type="submit" class="btn btn-sm btn-info mt-2" value="Submit">
                    </div>
                </form>
                {{-- END TEXT AREA COMMENTS --}}

                {{-- CARD TAMPILAN COMMENTS --}}
                @foreach ($post->comments()->where('parent',0)->latest()->get() as $comments)
                {{-- @foreach($comments as $comment) --}}
            <ul class="list-group mt-3">
                <li class="list-group-item border-3">
                <div class="card my-2">
                    <div class="card-header">
                        <small class="text-muted">
                        By. <a href="/posts?author={{ $comments->author->username }}" class="text-decoration-none">{{ $comments->author->name }}</a>  
                        <p class="d-inline ms-5"><span data-feather="clock"></span>
                        {{ $comments->created_at->diffForHumans() }}
                        </p>
                        </small>
                    </div>
                    <div class="card-body d-inline">
                        <p class="card-text">{{ $comments->comments }}</p>
                    </div>
                    <form action="/comments" method="post" class="input-group mt-2">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $comments->id }}">
                    <input type="hidden" name="parent" value="{{ $comments->id }}">
                    <input type="text" class="form-control" placeholder="Reply this comments" name="comments">
                    <input class="btn btn-sm btn-outline-secondary" type="submit" id="comments" value="Reply">
                    </form>
                </div>

                    @foreach ($comments->childs()->latest()->get() as $child)
                    {{-- @foreach($childs as $child) --}}
                    {{-- @foreach($comments->childs() as $child) --}}
                    <ul class="list-group">
                    <li class="list-group-item border-0">
                    <div class="card">
                    <div class="card-header">
                        <small class="text-muted">
                        By. <a href="/posts?author={{ $child->author->username }}" class="text-decoration-none">{{ $child->author->name }}</a>  
                        <p class="d-inline ms-5"><span data-feather="clock"></span>
                        {{ $child->created_at->diffForHumans() }}
                        </p>
                        </small>
                    </div>
                    <div class="card-body d-inline">
                        <p class="card-text">{{ $child->comments }}</p>
                    </div>
                    </div>
                    </li>
                    </ul>
                    @endforeach
                
                </li>
            </ul>
            @endforeach
            {{-- END CARD TAMPILAN COMMENTS --}}
            
            
            </div>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function(){
            $('#btn-comments').click(function(){
                $('#comments').toggle('slide');
            });
        });
    </script> --}}

@endsection