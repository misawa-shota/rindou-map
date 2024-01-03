@extends('layouts.toppage')

@section('content')
    <div class="position-relative mt-4 mt-lg-0">
        <div class="swiper detailpage_img_thumbnail">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('storage/img/nishizawasenn.jpg') }}" alt="林道の画像" class="img-fluid slide_img"></div>
                <div class="swiper-slide"><img src="{{ asset('storage/img/mitisakanahatasenn.jpg') }}" alt="林道の画像" class="img-fluid slide_img"></div>
                <div class="swiper-slide"><img src="{{ Storage::disc('s3')->url('img/togawarindou_1.jpg') }}" alt="林道の画像" class="img-fluid slide_img"></div>
                <div class="swiper-slide"><img src="{{ asset('storage/img/mitisakanahatasenn_2.jpg') }}" alt="林道の画像" class="img-fluid slide_img"></div>
            </div>
        </div>
        <div class="container position-absolute start-0 bottom-50 end-0 m-auto d-block z-3">
            <h2 class="fw-bold fs-1 text-shadow text-light">日常に冒険を</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="my-5">
            <div class="d-flex justify-content-center my-5">
                <div class="d-flex align-items-center">
                    <img class="header_icon" src="{{ asset('storage/img/icon.svg') }}" alt="林道のアイコン画像">
                    <h3 class="fw-bold ms-2 pt-3">林道マップ</h3>
                </div>
            </div>
            <p class="fs-5 lh-lg text-start text-lg-center">
                林道に行ってみたいけど、どこにあるのか分からない。ブログなど探せば情報は見つかるかもしれないけど、探すのが大変。<br>
                特に初心者にとっては林道を探すこと自体が難しいと思っていました。そんな経験からこのサイトを作成しました。<br>
                <br>
                このサイトを利用して日常に冒険という選択肢を追加しましょう。
            </p>
        </div>
        <div class="my-5">
            <div class="d-flex justify-content-center my-5">
                <div class="d-flex align-items-center">
                    <img class="header_icon" src="{{ asset('storage/img/icon.svg') }}" alt="林道のアイコン画像">
                    <h3 class="fw-bold ms-2 pt-3">林道マップでできること</h3>
                </div>
            </div>
            <div class="row gx-lg-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="{{ asset('storage/img/map_toppage.jpeg') }}" alt="マップの画像" class="w-100 h-75 object-fit-cover">
                    <div class="my-3">
                        <h4 class="fw-bold text-center text-lg-start">マップ上で林道の位置を確認できる</h4>
                        <p class="my-3 text-start">
                            林道の位置とルートが一目でわかります。林道名で検索したり表示しているマップのレイヤーを切り替えたりすることもできます。
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="{{ asset('storage/img/post_toppage.png') }}" alt="写真を撮影している画像" class="w-100 h-75 object-fit-cover">
                    <div class="my-3">
                        <h4 class="fw-bold text-center text-lg-start">撮影した写真や走った感想を投稿できる</h4>
                        <p class="my-3 text-start">
                            走行した林道の感想を投稿できます。投稿された内容は他のユーザーも閲覧することができるため、林道の情報収集に役立てることができます。
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <img src="{{ asset('storage/img/clear_toppage.jpeg') }}" alt="走行済みの林道一覧の画像" class="w-100 h-75 object-fit-cover">
                    <div class="my-3">
                        <h4 class="fw-bold text-center text-lg-start">走行した林道を登録することができる</h4>
                        <p class="my-3 text-start">
                            走行した林道はマイページから登録することができます。ログインした状態であればマップ上で確認することもできます。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
