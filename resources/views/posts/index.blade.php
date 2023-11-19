@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">投稿一覧ページ</h2>
        <span><a href="{{ route('posts.create') }}">投稿を追加する</a></span>
    </div>
@endsection
