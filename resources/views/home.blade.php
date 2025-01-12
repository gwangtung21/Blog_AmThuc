<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Danh sách bài viết</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Nút tạo bài viết -->
    <a href="{{ route('posts.create') }}" class="button">Tạo bài viết mới</a>

    <hr>

    @foreach($posts as $post)
        <div style="margin-bottom: 20px;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p><strong>Tác giả:</strong> {{ $post->author }}</p>
            <p><em>Ngày tạo: {{ $post->created_at->format('d/m/Y H:i') }}</em></p>
        </div>
    @endforeach
</body>
</html>
