<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết trên trang chủ
    public function index()
    {
        $posts = Post::all(); // Lấy danh sách bài viết từ cơ sở dữ liệu
        return view('home', compact('posts')); // Truyền biến $posts vào view 'home'
    }

    // Hiển thị form tạo bài viết
    public function create()
    {
        return view('author.edit'); // Trả về view form để tạo bài viết
    }

    // Lưu bài viết mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Lưu bài viết vào cơ sở dữ liệu
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        
            'user_id' => auth()->id(),
        ]);

        // Chuyển hướng về trang chủ với thông báo thành công
        return redirect()->route('home')->with('success', 'Bài viết đã được lưu!');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'author_id' => 'required|exists:users,id',
    //     ]);

    //     Post::create([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'user_id' => auth()->id(), // Lấy ID người dùng hiện tại
    //         'author_id' => $request->author_id,
    //     ]);

    //     return redirect()->route('posts.index');
    // }

    // public function update(Request $request, Post $post)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'content' => 'required|string',
    //         'author_id' => 'required|exists:users,id',
    //     ]);

    //     $post->update([
    //         'title' => $request->title,
    //         'content' => $request->content,
    //         'user_id' => auth()->id(), // Lấy ID người dùng hiện tại
    //         'author_id' => $request->author_id,
    //     ]);

    //     return redirect()->route('posts.index');
    // }
}