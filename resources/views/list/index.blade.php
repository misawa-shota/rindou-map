@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-1 fw-bold my-5">都道府県一覧で検索</h2>
        <div class="row align-items-center">
            <div class="col">
                <div class="prefectures_list">
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="hokkaidou">北海道</span></dt>
                        <dd class="col">
                            <ul class="list-unstyled pt-2">
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">北海道</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="touhoku">東北地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">青森県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">秋田県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">山形県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">岩手県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">宮城県</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">福島県</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="chubu">中部地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">新潟県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">富山県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">石川県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">福井県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">長野県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">山梨県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">静岡県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">岐阜県</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">愛知県</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="kantou">関東地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">茨城県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">千葉県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">群馬県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">栃木県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">神奈川県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">埼玉県</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">東京都</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="kansai">関西地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">滋賀県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">兵庫県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">三重県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">和歌山県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">京都府</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">大阪府</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">奈良県</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="chugoku">中国地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">鳥取県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">岡山県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">山口県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">島根県</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">広島県</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="sikoku">四国地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">香川県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">徳島県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">愛媛県</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">高知県</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="kyusyu">九州地方</span></dt>
                        <dd class="col">
                            <ul class="d-flex align-items-center list-unstyled pt-2">
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">福岡県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">長崎県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">熊本県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">鹿児島県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">佐賀県</a></li>
                                <li class="me-2"><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">大分県</a></li>
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">宮崎県</a></li>
                            </ul>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-3"><span class="fs-4" id="okinawa">沖縄地方</span></dt>
                        <dd class="col">
                            <ul class="list-unstyled pt-2">
                                <li><a class="link-body-emphasis link-underline link-underline-opacity-0" href="">沖縄県</a></li>
                            </ul>
                        </dd>
                    </dl>
                </div>
            </div>
            <img src="{{ asset('img/japan_map.png') }}" alt="日本地図の画像" class="col w-50 h-50">
        </div>

    </div>
@endsection
