@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="images">Add New Images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>

            <div class="form-group mt-3">
                <h5>Current Images</h5>
                <div class="row">
                    @foreach ($post->images as $image)
                        <div class="col-md-3 mb-3 text-center">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Image" class="img-thumbnail">
                            <div class="form-check mt-2">
                                <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="form-check-input">
                                <label class="form-check-label">Delete</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Post</button>
        </form>
    </div>
@endsection
