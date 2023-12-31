@extends('layouts.listpage')

@section('content')
    @if ($prefecture === null)
        {{-- 日本地図と都道府県の一覧ページ --}}
        <div class="container-xl my-5 py-5 text-black">
            <h2 class="fs-1 fw-bold my-5 text-center text-lg-start">都道府県一覧で検索</h2>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="prefectures_list">
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="hokkaidou">北海道</span></dt>
                            <dd class="col">
                                <ul class="list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">北海道</button>
                                            <input type="hidden" value="北海道" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="touhoku">東北地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">青森県</button>
                                            <input type="hidden" value="青森県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">秋田県</button>
                                            <input type="hidden" value="秋田県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">山形県</button>
                                            <input type="hidden" value="山形県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">岩手県</button>
                                            <input type="hidden" value="岩手県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">宮城県</button>
                                            <input type="hidden" value="宮城県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">福島県</button>
                                            <input type="hidden" value="福島県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="chubu">中部地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">新潟県</button>
                                            <input type="hidden" value="新潟県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">富山県</button>
                                            <input type="hidden" value="富山県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">石川県</button>
                                            <input type="hidden" value="石川県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">福井県</button>
                                            <input type="hidden" value="福井県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">長野県</button>
                                            <input type="hidden" value="長野県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">山梨県</button>
                                            <input type="hidden" value="山梨県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">静岡県</button>
                                            <input type="hidden" value="静岡県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">岐阜県</button>
                                            <input type="hidden" value="岐阜県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">愛知県</button>
                                            <input type="hidden" value="愛知県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="kantou">関東地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">茨城県</button>
                                            <input type="hidden" value="茨城県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">千葉県</button>
                                            <input type="hidden" value="千葉県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">群馬県</button>
                                            <input type="hidden" value="群馬県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">栃木県</button>
                                            <input type="hidden" value="栃木県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            <button type="submit" class="text-black">神奈川県</button>
                                            <input type="hidden" value="神奈川県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">埼玉県</button>
                                            <input type="hidden" value="埼玉県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">東京都</button>
                                            <input type="hidden" value="東京都" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="kansai">関西地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">滋賀県</button>
                                            <input type="hidden" value="滋賀県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">兵庫県</button>
                                            <input type="hidden" value="兵庫県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">三重県</button>
                                            <input type="hidden" value="三重県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">和歌山県</button>
                                            <input type="hidden" value="和歌山県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">京都府</button>
                                            <input type="hidden" value="京都府" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">大阪府</button>
                                            <input type="hidden" value="大阪府" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">奈良県</button>
                                            <input type="hidden" value="奈良県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="chugoku">中国地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">鳥取県</button>
                                            <input type="hidden" value="鳥取県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">岡山県</button>
                                            <input type="hidden" value="岡山県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">山口県</button>
                                            <input type="hidden" value="山口県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">島根県</button>
                                            <input type="hidden" value="島根県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">広島県</button>
                                            <input type="hidden" value="広島県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="sikoku">四国地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">香川県</button>
                                            <input type="hidden" value="香川県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">徳島県</button>
                                            <input type="hidden" value="徳島県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">愛媛県</button>
                                            <input type="hidden" value="愛媛県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">高知県</button>
                                            <input type="hidden" value="高知県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="kyusyu">九州地方</span></dt>
                            <dd class="col">
                                <ul class="d-flex align-items-center justify-content-start flex-wrap list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">福岡県</button>
                                            <input type="hidden" value="福岡県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">長崎県</button>
                                            <input type="hidden" value="長崎県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">熊本県</button>
                                            <input type="hidden" value="熊本県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">鹿児島県</button>
                                            <input type="hidden" value="鹿児島県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">佐賀県</button>
                                            <input type="hidden" value="佐賀県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">大分県</button>
                                            <input type="hidden" value="大分県" name="prefecture">
                                        </form>
                                    </li>
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">宮崎県</button>
                                            <input type="hidden" value="宮崎県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-12 col-xxl-3"><span class="fs-4" id="okinawa">沖縄地方</span></dt>
                            <dd class="col">
                                <ul class="list-unstyled pt-2">
                                    <li class="me-2">
                                        <form action="{{ route('rindous.index') }}" method="get">
                                            @csrf
                                            <button type="submit" class="text-black">沖縄県</button>
                                            <input type="hidden" value="沖縄県" name="prefecture">
                                        </form>
                                    </li>
                                </ul>
                            </dd>
                        </dl>
                    </div>
                </div>
                <img src="{{ asset('storage/img/japan_map.png') }}" alt="日本地図の画像" class="col-lg-6 w-50 h-50 mx-auto mx-lg-0">
            </div>
        </div>
    @else
        {{-- 各県の林道一覧ページ --}}
        <div class="container-xl my-5 py-1">
            <div class="my-5 d-flex justify-content-center d-md-block">
                <div class="link_nav">
                    <span><a class="link-underline link-underline-opacity-0 link-dark link-opacity-50-hover" href="{{ route('rindous.index') }}">都道府県一覧</a></span>
                    <span class="mx-3">></span>
                    <span>{{ $prefecture }}</span>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                <h2 class="fw-bold">{{ $prefecture }}の林道</h2>
                <span class="ms-5 fw-bold fs-3 pb-2">{{ $count }}件</span>
            </div>
            <div class="card_container my-5">
                <ul class="list-unstyled">
                    @if ($count == 0)
                        <p class="fs-4">
                            現在登録されている林道がありません。<br>
                            更新されるまで暫くお待ち下さい。
                        </p>
                    @else
                        @foreach ($rindous as $rindou)
                            <li class="d-block mb-5">
                                <div class="card border border-0">
                                    <div class="row align-items-center">
                                        <div class="col-md-4">
                                            <a href="{{ route('rindous.show', $rindou) }}?prefecture={{ $prefecture }}" class="img_link">
                                                @if ($rindou->rindou_img == null)
                                                    <img src="{{ asset('storage/img/no_image.png') }}" alt="No-imageの画像" class="img-fluid">
                                                @else
                                                    <img src="{{ asset('storage/img/'. $rindou->rindou_img) }}" alt="林道の画像" class="img-fluid">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <div class="mb-4 d-block d-md-flex align-items-center">
                                                    <h3 class="card-title"><a class="link-underline link-underline-opacity-0 link-dark link-opacity-50-hover" href="{{ route('rindous.show', $rindou) }}?prefecture={{ $prefecture }}">{{ $rindou->name }}</a></h3>
                                                    @if (strlen($rindou->distance) >= 4)
                                                        <span class="ms-1 fs-5">（ 約 {{ mb_substr(number_format(round($rindou->distance, -1), 0, '', '.'), 0, 4) }} km ）</span>
                                                    @else
                                                        <span class="ms-1 fs-5">（ 約 {{ $rindou->distance }} m ）</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <dl>
                                                        <dt class="mb-2">< 林道の情報 ></dt>
                                                        <dd class="ps-2">
                                                            <p class="card-text">{!! Str::limit(nl2br(e($rindou->description)), 230, '...') !!}</p>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="d-flex justify-content-center">
                {{ $rindous->appends(request()->input())->links() }}
            </div>
        </div>
        <div class="to_pagetop_btn">
            <span>↑</span>
        </div>
    @endif
@endsection
