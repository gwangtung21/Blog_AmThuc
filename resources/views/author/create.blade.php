@extends('layouts.app')

@section('content')
<div>
    <h1>Danh sách bài viết</h1>

    @if($posts->isEmpty())
        <p>Không có bài viết nào.</p>
    @else
        <ul>
            @foreach ($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <small>Tác giả: {{ $post->author }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
