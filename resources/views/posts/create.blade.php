@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group mt-3">
        <label for="images">Upload Images</label>
        <input type="file" name="images[]" id="images" class="form-control" multiple onchange="previewImages(event)">
    </div>
        <div id="image-preview" class="mt-3"></div>
        <button type="submit" class="btn btn-primary mt-3">Create Post</button>
    </form>
    <script>
    function previewImages(event) {
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = ''; // Очищуємо попередній вміст

        const files = event.target.files;
        if (files) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '150px';
                    img.style.margin = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    }
</script>

</div>
@endsection