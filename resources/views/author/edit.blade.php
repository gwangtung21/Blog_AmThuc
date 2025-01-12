@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo bài viết mới</title>
</head>
<body>
    <h1>Tạo bài viết mới</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required><br><br>

        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content" rows="5" required>{{ old('content') }}</textarea><br><br>

        <label for="author">Tác giả (Tùy chọn):</label><br>
        <input type="text" id="author" name="author" value="{{ old('author') }}"><br><br>

        <button type="submit">Lưu bài viết</button>
    </form>
</body>
</html>

@endsection
