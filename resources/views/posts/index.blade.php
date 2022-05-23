@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    {{-- SEARCHING --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts" method="get">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-info" type="submit">Search</button>
            </div>
            </form>
        </div>
    </div>
    {{-- END SEARCHING --}}

    {{-- CREATE --}}
    <div class="row text-center">
        <div class="col-md">
            {{-- <a href="/posts/create" class="btn btn-info mb-3">Create New Posts</a> --}}
            <a href="/posts/create" class="btn btn-outline-secondary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Post</a>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/posts" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            
            {{-- TITLE --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- END TITLE --}}

            {{-- SLUG --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- END SLUG --}}

            {{-- CATEGORY --}}
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id" required>
                <option selected disabled>Choose One</option>
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            {{-- END CATEGORY --}}

            {{-- FILE INPUT FOTO --}}
            <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>
            {{-- END FILE INPUT FOTO --}}

            {{-- BODY --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            {{-- END BODY --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
    
    {{-- END CREATE --}}

    {{-- PENGONDISIAN POST TERBARU --}}
@if ($posts->count())
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card mb-3">
                <div class="card-body">
                <p class="text-muted">
                        By. <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in 
                        <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> 
                        <p>
                            <span data-feather="clock"></span> {{ $posts[0]->created_at->diffForHumans() }}
                        </p>
                </p>
                <h3 class="card-title">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
                    {{ $posts[0]->title }}
                    </a>
                </h3>

                {{-- READ MORE EXCERPT --}}
                <p class="card-text">{{ $posts[0]->excerpt }}</p>
                {{-- END READ MORE EXCERPT --}}
        
                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">Read More..</a>
                </div>
        
                {{-- IMAGE --}}
                @if ($posts[0]->image)
                    {{-- <div style="max-height: 300px; overflow:hidden"> --}}
                    <div>
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt=".." class="img-fluid">
                    </div>
                @else    
                    <img src="https://source.unsplash.com/1000x300?{{ $posts[0]->category->name }}" class="card-img-top" alt="...">
                @endif
                {{-- END IMAGE --}}

                

                {{-- VIEW JUMLAH LIKE & COMMENT --}}
                        <div class="my-2 mx-2">
                            @if ($posts[0]->likes())
                            <a href="/likes/{{ $posts[0]->id }}" class="btn btn-sm btn-transparent"><span data-feather="thumbs-up"></span> {{ $posts[0]->likes->count() }} Like</a>
                            @endif
        
                            @if ($posts[0]->countComments())
                            <a href="/countComments/{{ $posts[0]->id }}" class="btn btn-sm btn-transparent"><span data-feather="message-square"></span> {{ $posts[0]->countComments->count() }} Comment</a>
                            @endif
                        </div>
                {{-- END VIEW JUMLAH LIKE & COMMENT --}}
            </div>

            
        </div>


    </div>
    {{-- END PENGONDISIAN POST TERBARU --}}

    {{-- FORUM --}}
    @foreach ($posts->skip(1) as $post)
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3">
                <div class="card-body">
                <p>
                    <small class="text-muted">
                        By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in 
                        <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                        <p>
                            <span data-feather="clock"></span> {{ $post->created_at->diffForHumans() }}
                        </p>
                    </small>
                </p>
                <h3 class="card-title">
                    <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                    {{ $post->title }}
                    </a>
                </h3>
                <p class="card-text">{{ $post->excerpt }}</p>
        
                <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read More..</a>
                </div>
        
                {{-- IMAGE --}}
                @if ($post->image)
                    <div style="max-height: 300px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt=".." class="img-fluid">
                    </div>
                @else    
                    
                @endif
                {{-- END IMAGE --}}
                
                {{-- VIEW JUMLAH LIKE & COMMENT --}}
                <div class="my-2 mx-2">
                    @if ($post->likes())
                    <a href="/likes/{{ $post->id }}" class="btn btn-sm btn-transparent"><span data-feather="thumbs-up"></span> {{ $post->likes->count() }} Like</a>
                    @endif

                    @if ($post->countComments())
                    <a href="/countComments/{{ $post->id }}" class="btn btn-sm btn-transparent"><span data-feather="message-square"></span> {{ $post->countComments->count() }} Comment</a>
                    @endif
                </div>
                {{-- END VIEW JUMLAH LIKE & COMMENT --}}

                {{-- VIEW JUMLAH LIKE --}}
                {{-- @if ($post->likes())    
                <div class="my-2 me-2">
                    <a href="/likes/{{ $post->id }}" class="btn btn-sm btn-transparent"><span data-feather="thumbs-up"></span> {{ $post->likes->count() }} Like</a>
                </div>
                @endif --}}
                {{-- END VIEW JUMLAH LIKE --}}

                {{-- VIEW JUMLAH COMMENTS --}}
                {{-- @if ($post->countComments())    
                <div class="my-2 me-2">
                    <a href="/countComments/{{ $post->id }}" class="btn btn-sm btn-transparent"><span data-feather="message-square"></span> {{ $post->countComments->count() }} Comment</a>
                </div>
                @endif --}}
                {{-- END VIEW JUMLAH COMMENTS --}}

            </div>
        </div>
    </div>
    @endforeach
    {{-- END FORUM --}}

   
    @else
        <p class="text-center fs-4">No Post Found.</p>
    @endif

    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    
    {{-- UNTUK PAGINATION SEBELAH KANAN
    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div> --}}

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });


        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
@endsection

