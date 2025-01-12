@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Danh sách bài viết</h1>

    <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
        Tạo bài viết mới
    </a>

    @if($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="border p-4 mb-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                <p>{{ Str::limit($post->content, 150) }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500">Xem chi tiết</a>
            </div>
        @endforeach

        <!-- Phân trang -->
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    @else
        <p>Chưa có bài viết nào!</p>
    @endif
</div>
@endsection
