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
        <div class="mb-5">
            <h3 class="mb-3">< {{ $rindou->name }}の地図 ></h3>
            <div id="map"></div>
        </div>
        <div class="mb-5">
            <h3 class="mb-3">< {{ $rindou->name }}の情報 ></h3>
            <p class="lh-lg">{!! nl2br(e($rindou->description)) !!}</p>
        </div>
    </div>
    <?php $rindou = json_encode($rindou); ?>
    <script type="text/javascript">
        var markers = {!! $markers !!};
        var rindou = {!! $rindou !!};
    </script>
@endsection
