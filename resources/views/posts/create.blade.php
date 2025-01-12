@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Tạo bài viết mới</h1>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Tiêu đề</label>
            <input type="text" name="title" id="title" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Nội dung</label>
            <textarea name="content" id="content" rows="5" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                required></textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Hình ảnh</label>
            <input type="file" name="image" id="image" 
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <button type="submit" 
            class="bg-blue-500 text-white px-4 py-2 rounded">Lưu bài viết</button>
    </form>
</div>
@endsection
