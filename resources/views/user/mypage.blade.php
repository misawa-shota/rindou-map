@extends('layouts.app')

@section('content')
    <div class="position-relative">
        <div class="container position-absolute start-0 end-0 user_icon_position">
            <img src="{{ asset('storage/icon_img/'. Auth::user()->icon_img) }}" alt="ユーザーのアイコン画像" class="object-fit-cover mypage_icon">
        </div>
        <div class="detailpage_img_thumbnail">
            <img src="{{ asset('storage/icon_img/'. Auth::user()->icon_img) }}" alt="ユーザーのアイコン画像" class="img-fluid overflow-hidden">
        </div>
    </div>
    <div class="bg-body-secondary py-5">
        <div class="container py-5">
            <div class="d-flex justify-content-between my-5">
                <div class="d-flex">
                    <h2 class="me-3">{{ Auth::user()->name }}</h2>
                    @if (session('flash_message'))
                        <span class="ms-3 text-primary fs-4">{{ session('flash_message') }}</span>
                    @endif
                </div>
                <a href="{{ route('mypage.edit') }}" class="link-underline link-underline-opacity-0 link-opacity-50-hover link-primary bg-light border border-primary rounded-pill px-3 py-1 fs-5">プロフィール編集</a>
            </div>
            @if (empty(Auth::user()->introduction))
                <p class="my-5">プロフィールを編集して自己紹介文を記入して下さい。</p>
            @else
                <p class="my-5">{!! nl2br(e(Auth::user()->introduction)) !!}</p>
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row my-5 py-5">
            <div class="d-flex align-items-center">
                <h3 class="fs-2 fw-bold">活動記録</h3>
                <span class="ms-5 fs-3 fw-bold pb-2">{{ $count }}件</span>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('posts.index') }}" class="link-underline link-underline-opacity-0 fs-5">もっと見る</a>
            </div>
            <div>
                @foreach ($posts as $post)
                    <div class="card my-5">
                        <div class="row g-0">
                            <div class="col-md-4 position-relative">
                                <?php
                                    $postImg = $post->img;
                                    $images = explode(",", $postImg);
                                    $count = count($images);
                                ?>
                                <a href="{{ route('posts.show', $post->id) }}" class="post_img_link">
                                    @if (!empty($post->img))
                                        <img src="{{ asset('storage/post_img/'. $images[0]) }}" class="img-fluid border border-0 post_img" alt="投稿された画像">
                                        <div class="position-absolute bottom-0 end-0 bg-black opacity-75">
                                            <img src="{{ asset('img/camera-icon.png') }}" alt="カメラのアイコン画像" class="ms-3 w-25 h-25">
                                            <span class="ms-3 text-light"><?php echo $count; ?></span>
                                        </div>
                                    @else
                                        <img src="{{ asset('img/no_image.png') }}" alt="No-imageの画像" class="img-thumbnail border border-0 post_img">
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $post->title }}</h3>
                                    <?php
                                        $names = DB::table('rindous')->select('name')->where('id', $post->rindou_id)->get();
                                    ?>
                                    <div class="d-flex align-items-center my-3">
                                        <span class="me-3 text-secondary"><?php echo $names[0]->name ?></span>
                                        <span class="text-secondary">{{ $post->created_at->format('Y/m/d') }}</span>
                                    </div>
                                    <p>{!! Str::limit(nl2br(e($post->content)), 200, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
