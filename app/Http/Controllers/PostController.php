<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

use App\Models\Post;
use App\Models\Image; // Додано
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('posts', 'public');
                $post->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You can only edit your own posts.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Валідація
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Оновлення поста
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
    
        // Видалення вибраних фото
        if ($request->has('delete_images')) {
            foreach ($request->input('delete_images') as $imageId) {
                $image = Image::find($imageId);
    
                if ($image) {
                    Storage::disk('public')->delete($image->path); // Видаляємо файл із папки
                    $image->delete(); // Видаляємо запис із бази
                }
            }
        }
    
        // Додавання нових фото
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('images', 'public'); // Зберігаємо у папці storage/app/public/images
                Image::create([
                    'post_id' => $post->id,
                    'path' => $path,
                ]);
            }
        }
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }
    

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You can only delete your own posts.');
        }

        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
