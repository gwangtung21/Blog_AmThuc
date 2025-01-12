@extends('layouts.app')

@section('content')
    <h1>Dashboard Quản Trị Viên</h1>
    <a href="{{ route('admin.users.manage') }}">Quản lý người dùng</a>
    <a href="{{ route('admin.posts.moderate') }}">Kiểm duyệt bài viết</a>
@endsection