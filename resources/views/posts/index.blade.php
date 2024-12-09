@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
    <div class="mt-4">
        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>

                @if ($post->images->count() === 1)
                <img src="{{ asset('storage/' . $post->images->first()->path) }}" alt="Image" class="img-fluid mb-3">
                @elseif ($post->images->count() > 1)
                <div id="carousel{{ $post->id }}" class="carousel slide mb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($post->images as $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="Image">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $post->id }}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $post->id }}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @endif


                <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection