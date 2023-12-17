@extends('layouts.listpage')

@section('content')
    <div class="container my-5 py-5">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center my-5">
                <h2 class="fw-bold">{{ $rindou->name }}に関する投稿一覧ページ</h2>
                <span class="ms-5 fs-3 fw-bold pb-2">{{ $count }}件</span>
            </div>
            <a href="{{ route('rindous.show', $rindou->id) }}?prefecture={{ $prefecture }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover fs-4">{{ $rindou->name }}の詳細ページ</a>
        </div>
        <div class="my-5">
            @foreach ($posts as $post)
                <div class="card my-5">
                    <div class="row g-0">
                        <div class="col-md-4 position-relative">
                            <?php
                                $postImg = $post->img;
                                $images = explode(",", $postImg);
                                $count = count($images);
                            ?>
                            <a href="{{ route('posts.detailpage', $post->id) }}?prefecture={{ $prefecture }}" class="post_img_link">
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
                                <div class="d-flex align-items-center my-3">
                                    <span class="me-3 text-secondary">{{ $rindou->name }}</span>
                                    <span class="text-secondary">{{ $post->created_at->format('Y/m/d') }}</span>
                                </div>
                                <p>{!! Str::limit(nl2br(e($post->content)), 200, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $posts->appends(request()->input())->links() }}
        </div>
    </div>
    <div class="to_pagetop_btn">
        <span>↑</span>
    </div>
@endsection