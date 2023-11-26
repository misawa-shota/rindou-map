@extends('layouts.postShow')

@section('content')
    <div class="position-relative">
        <div class="container position-absolute z-3 d-block m-auto bottom-0 start-0 end-0 text-light">
            <div class="link_nav my-3">
                <span><a href="{{ route('posts.index') }}" class="text-shadow link-underline link-underline-opacity-0 link-light link-opacity-50-hover fs-5">投稿一覧</a></span>
                <span class="text-shadow mx-3 fs-5">></span>
                <span class="text-shadow fs-5">投稿詳細ページ</span>
            </div>
            <div class="mb-5">
                <h2 class="text-shadow fw-bold fs-1">{{ $post->title }}</h2>
                <?php
                    $names = DB::table('rindous')->select('name')->where('id', $post->rindou_id)->get();
                ?>
                <div class="d-flex align-items-center my-3">
                    <span class="me-3 text-shadow fs-3"><?php echo $names[0]->name; ?></span>
                    <span class="text-shadow fs-3">{{ $post->created_at->format('Y/m/d') }}</span>
                </div>
            </div>
        </div>
        <div class="detailpage_img_thumbnail">
            @if (!empty($post->img))
                <?php
                    $images = explode(",", $post->img);
                ?>
                <img src="{{ asset('img/'. $images[0]) }}" alt="<?php echo $names[0]->name; ?>の写真" class="img-fluid overflow-hidden">
            @else
                <img src="{{ asset('img/no_image.png') }}" alt="No_imageの画像" class="d-block mx-auto">
            @endif
        </div>
    </div>
    <div class="container my-5">
        @if (session('flash_message'))
            <p class="my-5 text-primary fs-4">{{ session('flash_message') }}</p>
        @endif
        <h3 class="my-5 fs-3 fw-bold">投稿詳細</h3>
        <p class="fs-5 lh-lg">{!! nl2br(e($post->content)) !!}</p>
        <div class="row row-cols-3 g-2 my-5">
            @if (!empty($post->img))
                @foreach ($images as $image)
                    <div class="col">
                        <img src="{{ asset('img/'. $image) }}" data-src="{{ asset('img/'. $image) }}" alt="投稿された画像" class="img-thumbnail border border-0 detail_page_post_img zoom_up">
                    </div>
                @endforeach
            @else
                <div class="col-3">
                    <img src="{{ asset('img/no_image.png') }}" alt="No_imageの画像" class="img-thumbnail border border-0">
                </div>
            @endif
        </div>
    </div>
    <div class="my-5 d-flex align-items-center justify-content-center">
        <a href="{{ route('posts.edit', $post->id) }}" class="text-light text-center fs-4 w-25 py-2 bg-primary link-underline link-underline-opacity-0 rounded-pill link_btn">内容を編集する</a>
    </div>
    {{-- 画像拡大表示部分 ------------------------------}}
    <div id="zoom_up_wrapper">
        <img src="" alt="投稿された画像" id="zoom_up_img">
    </div>
    {{------------------------------------------------}}
@endsection
