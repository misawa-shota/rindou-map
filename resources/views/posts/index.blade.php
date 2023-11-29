@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-5">投稿一覧ページ</h2>
        <div class="d-flex align-items-center justify-content-end">
            <a href="{{ route('posts.create') }}" class="link-underline link-underline-opacity-0 bg-primary py-2 px-5 rounded-pill text-light fs-6 text-center link_btn">投稿を追加する</a>
        </div>
        @if (session('flash_message'))
            <p class="my-5 text-primary fs-4">{{ session('flash_message') }}</p>
        @endif
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
@endsection
