@extends('layouts.app')

@section('content')
    <h1>Kiểm duyệt bài viết</h1>
    <ul>
        @foreach ($posts as $post)
            <li>{{ $post->title }} - {{ $post->author->name }}</li>
        @endforeach
    </ul>
@endsection