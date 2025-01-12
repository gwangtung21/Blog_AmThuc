<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class AuthorController extends Controller
{
    public function dashboard()
    {
        $posts = Post::where('author_id', auth()->id())->get();
        return view('author.dashboard', compact('posts'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => auth()->id(),
        ]);

        return redirect()->route('author.dashboard');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('author.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('author.dashboard');
    }
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function moderatePosts()
    {
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }
}
