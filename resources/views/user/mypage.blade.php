@extends('layouts.app')

@section('content')
    <div class="position-relative">
        <div class="container-xl position-absolute start-0 end-0 user_icon_position">
            <img src="{{ asset('storage/icon_img/'. Auth::user()->icon_img) }}" alt="ユーザーのアイコン画像" class="object-fit-cover mypage_icon">
        </div>
        <div class="detailpage_img_thumbnail">
            <img src="{{ asset('storage/icon_img/'. Auth::user()->icon_img) }}" alt="ユーザーのアイコン画像" class="img-fluid overflow-hidden">
        </div>
    </div>
    <div class="bg-body-secondary py-0 py-md-5">
        <div class="container-xl py-5">
            <div class="d-flex justify-content-between my-3 my-sm-5">
                <div class="d-flex">
                    <h2 class="me-3">{{ Auth::user()->name }}</h2>
                    @if (session('flash_message'))
                        <span class="ms-3 text-primary fs-4">{{ session('flash_message') }}</span>
                    @endif
                </div>
                <a href="{{ route('mypage.edit') }}" class="link-underline link-underline-opacity-0 link-opacity-50-hover link-primary bg-light border border-primary rounded-pill px-1 px-md-3 pt-2 fs-6 fs-md-5">プロフィール編集</a>
            </div>
            @if (empty(Auth::user()->introduction))
                <p class="my-1 my-md-5">プロフィールを編集して自己紹介文を登録して下さい。</p>
            @else
                <p class="my-1 my-md-5">{!! nl2br(e(Auth::user()->introduction)) !!}</p>
            @endif
        </div>
    </div>
    <div class="container-xl">
        <div class="row my-5">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <h3 class="fs-2 fw-bold">活動記録</h3>
                    <span class="ms-3 ms-md-5 fs-3 fw-bold pb-2">{{ $count }}件</span>
                </div>
                <a href="{{ route('posts.index') }}" class="link-underline link-underline-opacity-0 fs-5">もっと見る</a>
            </div>
            @if ($posts->isempty())
                <p class="lh-lg">
                    走行した林道を選択してご自身の体験を登録できます。<br>
                    走行した感想などを他のユーザーと共有しましょう。
                </p>
            @else
                <div>
                    @foreach ($posts as $post)
                        <div class="card my-5">
                            <div class="row g-0">
                                <div class="col-xl-4 position-relative">
                                    <?php
                                        $postImg = $post->img;
                                        $images = explode(",", $postImg);
                                        $count = count($images);
                                    ?>
                                    <a href="{{ route('posts.show', $post->id) }}" class="post_img_link">
                                        @if (!empty($post->img))
                                            <img src="{{ asset('storage/post_img/'. $images[0]) }}" alt="投稿された画像" class="img-fluid border border-0 post_img">
                                            <div class="position-absolute bottom-0 end-0 bg-black opacity-75">
                                                <img src="{{ asset('storage/img/camera-icon.png') }}" alt="カメラのアイコン画像" class="ms-3 w-25 h-25">
                                                <span class="ms-3 text-light"><?php echo $count; ?></span>
                                            </div>
                                        @else
                                            <img src="{{ asset('storage/img/no_image.png') }}" alt="No-imageの画像" class="img-fluid border border-0 post_img">
                                        @endif
                                    </a>
                                </div>
                                <div class="col-xl-8">
                                    <div class="card-body">
                                        <h3 class="card-title">{{ $post->title }}</h3>
                                        <?php
                                            $names = DB::table('rindous')->select('name')->where('id', $post->rindou_id)->get();
                                        ?>
                                        <div class="d-flex align-items-center">
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
            @endif
        </div>
        <div class="row my-5">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <h3 class="fs-2 fw-bold">走行済みの林道</h3>
                    <span class="ms-3 ms-md-5 fs-3 fw-bold pb-2">{{ $clearCount }}件</span>
                </div>
                <a href="{{ route('clear.index') }}" class="link-underline link-underline-opacity-0 fs-5">もっと見る</a>
            </div>
            @if ($clears->isempty())
                <p class="fs-5 lh-lg">
                    走行した林道を登録すると表示されます。<br>
                    「もっと見る」のリンクから走行した林道を登録しましょう。
                </p>
            @else
                <div class="row">
                    @foreach ($clears as $clear)
                        <div class="col-4 col-sm-3 col-md-2 my-1 my-md-5">
                            <div class="position-relative d-flex justify-content-center">
                                <?php
                                    $rindouImg = DB::table('rindous')->select('rindou_img')->where('id', $clear->rindou_id)->get();
                                    $rindouName = DB::table('rindous')->select('name')->where('id', $clear->rindou_id)->get();
                                    $rindouPrefecture = DB::table('rindous')->select('prefecture')->where('id', $clear->rindou_id)->get();
                                ?>
                                @if (!empty($rindouImg[0]->rindou_img))
                                    <img src="{{ asset('storage/img/'. $rindouImg[0]->rindou_img) }}" alt="林道の画像" class="stamp_rally">
                                @else
                                    <img src="{{ asset('storage/img/no_image.png') }}" alt="No_imageの画像" class="stamp_rally">
                                @endif
                                <img src="{{ asset('storage/img/clear_stamp.png') }}" alt="clearスタンプの画像" class="position-absolute bottom-0 end-0 clear_stamp">
                            </div>
                            <div class="mt-3 text-center">
                                <span class="d-block fw-bold"><?php echo $rindouName[0]->name; ?></span>
                                <span class="d-block"><?php echo $rindouPrefecture[0]->prefecture; ?></span>
                                <span class="d-block">{{ $clear->created_at->format('Y/m/d') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
