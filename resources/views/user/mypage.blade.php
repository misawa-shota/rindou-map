@extends('layouts.app')

@section('content')
    <h2 class="my-5">マイページ</h2>
    <div class="container">
        <div>
            <a href="{{ route('posts.index') }}">投稿する</a>
        </div>
    </div>
@endsection
