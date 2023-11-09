@extends('layouts.detailpage')

@section('content')
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                @if (!empty($rindou->rindou_img))
                    <img src="{{ asset('img/'. $rindou->rindou_img) }}" alt="戸川林道の写真" class="img-fluid overflow-hidden">
                @else
                    <img src="{{ asset('img/no_image.png') }}" alt="No_imageの画像" class="d-block mx-auto">
                @endif
            </div>
            <div class="swiper-slide">
                @if (!empty($rindou->rindou_img_2))
                    <img src="{{ asset('img/'. $rindou->rindou_img_2) }}" alt="戸川林道の写真" class="img-fluid overflow-hidden">
                @else
                    <img src="{{ asset('img/no_image.png') }}" alt="No_imageの画像" class="d-block mx-auto">
                @endif
            </div>
            <div class="swiper-slide">
                @if (!empty($rindou->rindou_img_3))
                    <img src="{{ asset('img/'. $rindou->rindou_img_3) }}" alt="戸川林道の写真" class="img-fluid overflow-hidden">
                @else
                    <img src="{{ asset('img/no_image.png') }}" alt="No_imageの画像" class="d-block mx-auto">
                @endif
            </div>
        </div>
        {{-- <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> --}}
    </div>
    <div class="container">
        <div class="link_nav my-5">
            <span><a href="{{ route('rindous.index') }}" class="link-underline link-underline-opacity-0 link-dark link-opacity-50-hover">都道府県一覧</a></span>
            <span class="mx-3">></span>
            <span><a href="{{ route('rindous.index') }}?prefecture={{ $prefecture }}" class="link-underline link-underline-opacity-0 link-dark link-opacity-50-hover">{{ $prefecture }}の林道一覧</a></span>
            <span class="mx-3">></span>
            <span>{{ $rindou->name }}</span>
        </div>
        <h2>{{ $rindou->name }}</h2>
        <div>
            <h3>マップで確認する</h3>
            <div id="map"></div>
        </div>
    </div>
    <?php $rindou = json_encode($rindou); ?>
    <script type="text/javascript">
        var markers = {!! $markers !!};
        var rindou = {!! $rindou !!};
    </script>
@endsection
