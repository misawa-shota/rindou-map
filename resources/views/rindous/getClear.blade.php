@extends('layouts.detailpage_clear')

@section('content')
    <div class="position-relative">
        <div class="container-xl position-absolute z-3 d-block m-auto bottom-0 start-0 end-0 text-light">
            <div class="link_nav my-1 my-md-5">
                <span><a href="{{ route('rindous.index') }}" class="text-shadow link-underline link-underline-opacity-0 link-light link-opacity-50-hover fs-6 fs-md-5">都道府県一覧</a></span>
                <span class="text-shadow mx-1 mx-md-3 fs-6 fs-md-5">></span>
                <span><a href="{{ route('rindous.index') }}?prefecture={{ $prefecture }}" class="text-shadow link-underline link-underline-opacity-0 link-light link-opacity-50-hover fs-6 fs-md-5">{{ $prefecture }}の林道一覧</a></span>
                <span class="text-shadow mx-1 mx-md-3 fs-6 fs-md-5">></span>
                <span class="text-shadow fs-6 fs-md-5">{{ $rindou->name }}</span>
            </div>
            <div class="d-flex align-items-center mb-0 mb-md-5">
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
                <img src="{{ Storage::disk('s3')->url('img/'. $rindou->rindou_img) }}" alt="戸川林道の写真" class="img-fluid overflow-hidden">
            @else
                <img src="{{ Storage::disk('s3')->url('img/no_image.png') }}" alt="No_imageの画像" class="img-fluid d-block mx-auto">
            @endif
        </div>
    </div>
    <div class="container-xl my-5">
        <div class="my-5">
            <h3 class="my-5 fs-3 fw-bold text-center text-md-start">< {{ $rindou->name }}の地図 ></h3>
            <div id="map"></div>
        </div>
        <div class="my-5">
            <h3 class="my-5 fs-3 fw-bold text-center text-md-start">< {{ $rindou->name }}の情報 ></h3>
            @if (!empty($rindou->description))
                <p class="fs-5 lh-lg">{!! nl2br(e($rindou->description)) !!}</p>
            @else
                <div class="d-flex d-md-block justify-content-center">
                    <p class="fs-5 lh-lg">
                        {{ $rindou->name }}に関する情報はありません。<br>
                        情報が更新されるまでお待ち下さい。
                    </p>
                </div>
            @endif
        </div>
        <div class="my-5">
            @if (!empty($posts))
                <div class="d-md-flex align-items-md-center justify-content-md-between">
                    <div class="d-block d-sm-flex align-items-center my-md-5 justify-content-center justify-content-md-start text-center text-sm-start">
                        <h3 class="fs-3 fw-bold">< {{ $rindou->name }}に関する投稿 ></h3>
                        <span class="fs-4 fw-bold ms-sm-5 pb-2">{{ $count }}件</span>
                    </div>
                    <a href="{{ route('rindous.postList', $rindou->id) }}?prefecture={{ $prefecture }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover fs-5 fs-md-4 float-end float-lg-none">もっと見る</a>
                </div>
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
                                    <a href="{{ route('posts.detailpage', $post->id) }}?prefecture={{ $prefecture }}" class="post_img_link">
                                        @if (!empty($post->img))
                                            <img src="{{ Storage::disk('s3')->url('post_img/'. $images[0]) }}" class="img-fluid border border-0 post_img" alt="投稿された画像">
                                            <div class="position-absolute bottom-0 end-0 bg-black opacity-75">
                                                <img src="{{ Storage::disk('s3')->url('img/camera-icon.png') }}" alt="カメラのアイコン画像" class="ms-3 w-25 h-25">
                                                <span class="ms-3 text-light"><?php echo $count; ?></span>
                                            </div>
                                        @else
                                            <img src="{{ Storage::disk('s3')->url('img/no_image.png') }}" alt="No-imageの画像" class="img-thumbnail border border-0 post_img">
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
            @else
                <div class="d-block d-md-flex align-items-center my-5 text-center text-md-start">
                    <h3 class="fs-3 fw-bold">< {{ $rindou->name }}に関する投稿 ></h3>
                    <span class="fs-4 ms-md-5">{{ $count }}件</span>
                </div>
                <div class="d-flex d-md-block justify-content-center">
                    <p class="fs-5 lh-lg">
                        {{ $rindou->name }}に関する投稿はありません。<br>
                        皆様からの投稿をお待ちしております。
                    </p>
                </div>
            @endif
        </div>
    </div>
    <?php $rindou = json_encode($rindou); ?>
    <script type="text/javascript">
        var markers = {!! $markers !!};
        var rindou = {!! $rindou !!};
        var clearList = {!! $clearList !!};
    </script>
@endsection
