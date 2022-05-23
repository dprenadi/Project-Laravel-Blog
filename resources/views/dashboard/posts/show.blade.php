@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                
                <div class="mb-2">
                    {{-- BACK --}}
                    <a href="/dashboard/posts" class="btn btn-sm btn-success"><span data-feather="arrow-left"></span> Back to All My Posts</a>
    
                    {{-- EDIT --}}
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-warning"><span data-feather="edit"></span> Edit</a>

                    {{-- DELETE --}}
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
                    </form>
                {{-- END DELETE --}}
                </div>

                {{-- IMAGE --}}
                @if ($post->image)
                    <div style="max-height: 300px; overflow:hidden">
                        <img src="{{ asset('storage/' . $post->image) }}" alt=".." class="img-fluid">
                    </div>
                @else    
                    <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" alt=".." class="img-fluid">
                @endif
                {{-- END IMAGE --}}

                <article class="my-3">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection