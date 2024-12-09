@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    @if ($post->images->count() === 1)
        <img src="{{ asset('storage/' . $post->images->first()->path) }}" alt="Image">
    @elseif ($post->images->count() > 1)
        <div id="carousel{{ $post->id }}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($post->images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="Image">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $post->id }}" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $post->id }}" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    @endif
@endsection
