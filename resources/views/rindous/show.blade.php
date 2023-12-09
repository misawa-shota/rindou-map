@extends('layouts.detailpage')

@section('content')
    <div class="position-relative">
        <div class="container position-absolute z-3 d-block m-auto bottom-0 start-0 end-0 text-light">
            <div class="link_nav my-5">
                <span><a href="{{ route('rindous.index') }}" class="text-shadow link-underline link-underline-opacity-0 link-light link-opacity-50-hover fs-5">都道府県一覧</a></span>
                <span class="text-shadow mx-3 fs-5">></span>
                <span><a href="{{ route('rindous.index') }}?prefecture={{ $prefecture }}" class="text-shadow link-underline link-underline-opacity-0 link-light link-opacity-50-hover fs-5">{{ $prefecture }}の林道一覧</a></span>
                <span class="text-shadow mx-3 fs-5">></span>
                <span class="text-shadow fs-5">{{ $rindou->name }}</span>
            </div>
            <div class="d-flex align-items-center mb-5">
                <h2 class="text-shadow fw-bold fs-1">{{ $rindou->name }}</h2>
                @if (strlen($rindou->distance) >= 4)
                    <span class="text-shadow fs-3 fw-bold">（ 約 {{ mb_substr(number_format(round($rindou->distance, -1), 0, '', '.'), 0, 4) }} km ）</span>
                @else
                    <span class="text-shadow fs-3 fw-bold">（ 約 {{ $rindou->distance }} m ）</span>
                @endif
            </div>
        </div>
        <div class="detailpage_img_thumbnail">
            @if (!empty($rindou->rindou_img))
                <img src="{{ asset('img/'. $rindou->rindou_img) }}" alt="戸川林道の写真" class="img-fluid overflow-hidden">
            @else
                <img src="{{ asset('img/no_image.png') }}" alt="No_imageの画像" class="d-block mx-auto">
            @endif
        </div>
    </div>
    <div class="container my-5">
        <div class="my-5">
            <h3 class="my-5 fs-3 fw-bold">< {{ $rindou->name }}の地図 ></h3>
            <div id="map"></div>
        </div>
        <div class="my-5">
            <h3 class="my-5 fs-3 fw-bold">< {{ $rindou->name }}の情報 ></h3>
            @if (!empty($rindou->description))
                <p class="fs-5 lh-lg">{!! nl2br(e($rindou->description)) !!}</p>
            @else
                <p class="fs-5 lh-lg">
                    まだ{{ $rindou->name }}に関する情報はありません。<br>
                    情報が更新されるまでお待ち下さい。
                </p>
            @endif
        </div>
        <div class="my-5">
            @if (!empty($posts))
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center my-5">
                        <h3 class="fs-3 fw-bold">< {{ $rindou->name }}に関する投稿 ></h3>
                        <span class="fs-4 ms-5">{{ $count }}件</span>
                    </div>
                    <a href="" class="link-underline link-underline-opacity-0 link-opacity-75-hover fs-4">もっと見る</a>
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
                                    <a href="{{ route('posts.detailpage', $post->id) }}" class="post_img_link">
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
            @else
                <div class="d-flex align-items-center my-5">
                    <h3 class="fs-3 fw-bold">< {{ $rindou->name }}に関する投稿 ></h3>
                    <span class="fs-4 ms-5">{{ $count }}件</span>
                </div>
                <p class="fs-5 lh-lg">
                    まだ{{ $rindou->name }}に関する投稿はありません。<br>
                    皆様からの投稿をお待ちしております。
                </p>
            @endif
        </div>
    </div>
    <?php $rindou = json_encode($rindou); ?>
    <script type="text/javascript">
        var markers = {!! $markers !!};
        var rindou = {!! $rindou !!};
    </script>
@endsection
