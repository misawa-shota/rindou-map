@extends('layouts.app')

@section('content')
    <div class="position-relative">
        <div class="container position-absolute start-0">
            <img src="{{ asset('storage/icon_img/'. Auth::user()->icon_img) }}" alt="ユーザーアイコンの画像" class="mypage_icon">
        </div>
        <div class="detailpage_img_thumbnail">
            <img src="{{ asset('storage/icon_img/'. Auth::user()->icon_img ) }}" alt="ユーザーのアイコン画像" class="img-fluid overflow-hidden">
        </div>
    </div>
    <div class="container">
        <div>
            <a href="{{ route('posts.index') }}">投稿一覧ページ</a>
        </div>
    </div>
@endsection
