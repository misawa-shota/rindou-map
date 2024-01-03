@extends('layouts.postShow')

@section('content')
    <div class="position-relative">
        <div class="container-xl position-absolute z-3 d-block m-auto bottom-0 start-0 end-0 text-light">
            <div class="link_nav my-1 my-md-3">
                <span><a href="{{ route('rindous.postList', $rindou[0]['id']) }}?prefecture={{ $prefecture }}" class="text-shadow link-underline link-underline-opacity-0 link-light link-opacity-50-hover fs-6 fs-md-5">{{ $rindou[0]['name'] }}の投稿一覧ページ</a></span>
                <span class="text-shadow mx-3 fs-6 fs-md-5">></span>
                <span class="text-shadow fs-6 fs-md-5">投稿詳細ページ</span>
            </div>
            <div class="mb-0 mb-md-5">
                <h2 class="text-shadow fw-bold fs-3 fs-md-1">{{ $post->title }}</h2>
                <div class="d-flex align-items-center my-1 my-md-3">
                    <span class="me-3 text-shadow fs-5 fs-md-3">{{ $rindou[0]['name'] }}</span>
                    <span class="text-shadow fs-5 fs-md-3">{{ $post->created_at->format('Y/m/d') }}</span>
                </div>
                <div class="d-flex align-items-center my-1 my-md-3">
                    <span class="me-3"><img  class="object-fit-cover icon_img" src="{{ Storage::disk('s3')->url('icon_img/'. $user[0]['icon_img']) }}" alt="ユーザーのアイコン画像"></span>
                    <span class="text-shadow fs-5 fs-md-3">{{ $user[0]['name'] }}</span>
                </div>
            </div>
        </div>
        <div class="detailpage_img_thumbnail">
            @if (!empty($post->img))
                <?php
                    $images = explode(",", $post->img);
                ?>
                <img src="{{ Storage::disk('s3')->url('post_img/'. $images[0]) }}" alt="{{ $rindou[0]['name'] }}の写真" class="img-fluid overflow-hidden">
            @else
                <img src="{{ Storage::disk('s3')->url('img/no_image.png') }}" alt="No_imageの画像" class="d-block mx-auto img-fluid">
            @endif
        </div>
    </div>
    <div class="container-xl my-5">
        @if (session('flash_message'))
            <p class="my-5 text-primary fs-4">{{ session('flash_message') }}</p>
        @endif
        <h3 class="my-5 fs-3 fw-bold">投稿詳細</h3>
        <p class="fs-5 lh-lg">{!! nl2br(e($post->content)) !!}</p>
        <div class="row row-cols-3 g-2 my-5">
            @if (!empty($post->img))
                @foreach ($images as $image)
                    <div class="col">
                        <img src="{{ Storage::disk('s3')->url('post_img/'. $image) }}" alt="投稿された画像" class="img-thumbnail border border-0 detail_page_post_img zoom_up">
                    </div>
                @endforeach
            @else
                <div class="col-3">
                    <img src="{{ Storage::disk('s3')->url('img/no_image.png') }}" alt="No_imageの画像" class="img-thumbnail border border-0">
                </div>
            @endif
        </div>
    </div>
    {{-- 画像拡大表示部分 ------------------------------}}
    <div id="zoom_up_wrapper">
        <img src="" alt="投稿された画像" id="zoom_up_img">
    </div>
    {{------------------------------------------------}}
@endsection
