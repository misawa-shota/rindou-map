@extends('layouts.postCreate')

@section('content')
    <div class="container-xl my-5 pt-5">
        <div class="d-block d-sm-flex align-items-center justify-content-between text-center text-sm-start">
            <h2 class="fw-bold mb-3 mb-sm-0">投稿作成ページ</h2>
            <a href="{{ route('posts.index') }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover fs-5">投稿一覧ページへ戻る</a>
        </div>
        <p class="my-5">
            林道を選択してご自身の体験を投稿することができます。<br>
            情報のご提供お待ちしております。
        </p>
        <div>
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="prefecture">都道府県を選択</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('prefecture')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <select class="form-select" id="select_box" name="prefecture" onchange="prefectureSubmit();">
                        <option selected value="" @if ( old('prefecture') == '' ) selected @endif>都道府県を選択して下さい</option>
                        <option value="北海道" @if ( old('prefecture') == "北海道" ) selected @endif>北海道</option>
                        <option value="青森県" @if ( old('prefecture') == "青森県" ) selected @endif>青森県</option>
                        <option value="岩手県" @if ( old('prefecture') == "岩手県" ) selected @endif>岩手県</option>
                        <option value="宮城県" @if ( old('prefecture') == "宮城県" ) selected @endif>宮城県</option>
                        <option value="秋田県" @if ( old('prefecture') == "秋田県" ) selected @endif>秋田県</option>
                        <option value="山形県" @if ( old('prefecture') == "山形県" ) selected @endif>山形県</option>
                        <option value="福島県" @if ( old('prefecture') == "福島県" ) selected @endif>福島県</option>
                        <option value="茨城県" @if ( old('prefecture') == "茨城県" ) selected @endif>茨城県</option>
                        <option value="栃木県" @if ( old('prefecture') == "栃木県" ) selected @endif>栃木県</option>
                        <option value="群馬県" @if ( old('prefecture') == "群馬県" ) selected @endif>群馬県</option>
                        <option value="埼玉県" @if ( old('prefecture') == "埼玉県" ) selected @endif>埼玉県</option>
                        <option value="千葉県" @if ( old('prefecture') == "千葉県" ) selected @endif>千葉県</option>
                        <option value="東京都" @if ( old('prefecture') == "東京都" ) selected @endif>東京都</option>
                        <option value="神奈川県" @if ( old('prefecture') == "神奈川県" ) selected @endif>神奈川県</option>
                        <option value="新潟県" @if ( old('prefecture') == "新潟県" ) selected @endif>新潟県</option>
                        <option value="富山県" @if ( old('prefecture') == "富山県" ) selected @endif>富山県</option>
                        <option value="石川県" @if ( old('prefecture') == "石川県" ) selected @endif>石川県</option>
                        <option value="福井県" @if ( old('prefecture') == "福井県" ) selected @endif>福井県</option>
                        <option value="山梨県" @if ( old('prefecture') == "山梨県" ) selected @endif>山梨県</option>
                        <option value="長野県" @if ( old('prefecture') == "長野県" ) selected @endif>長野県</option>
                        <option value="岐阜県" @if ( old('prefecture') == "岐阜県" ) selected @endif>岐阜県</option>
                        <option value="静岡県" @if ( old('prefecture') == "静岡県" ) selected @endif>静岡県</option>
                        <option value="愛知県" @if ( old('prefecture') == "愛知県" ) selected @endif>愛知県</option>
                        <option value="三重県" @if ( old('prefecture') == "三重県" ) selected @endif>三重県</option>
                        <option value="滋賀県" @if ( old('prefecture') == "滋賀県" ) selected @endif>滋賀県</option>
                        <option value="京都府" @if ( old('prefecture') == "京都府" ) selected @endif>京都府</option>
                        <option value="大阪府" @if ( old('prefecture') == "大阪府" ) selected @endif>大阪府</option>
                        <option value="兵庫県" @if ( old('prefecture') == "兵庫県" ) selected @endif>兵庫県</option>
                        <option value="奈良県" @if ( old('prefecture') == "奈良県" ) selected @endif>奈良県</option>
                        <option value="和歌山県" @if ( old('prefecture') == "和歌山県" ) selected @endif>和歌山県</option>
                        <option value="鳥取県" @if ( old('prefecture') == "鳥取県" ) selected @endif>鳥取県</option>
                        <option value="島根県" @if ( old('prefecture') == "島根県" ) selected @endif>島根県</option>
                        <option value="岡山県" @if ( old('prefecture') == "岡山県" ) selected @endif>岡山県</option>
                        <option value="広島県" @if ( old('prefecture') == "広島県" ) selected @endif>広島県</option>
                        <option value="山口県" @if ( old('prefecture') == "山口県" ) selected @endif>山口県</option>
                        <option value="徳島県" @if ( old('prefecture') == "徳島県" ) selected @endif>徳島県</option>
                        <option value="香川県" @if ( old('prefecture') == "香川県" ) selected @endif>香川県</option>
                        <option value="愛媛県" @if ( old('prefecture') == "愛媛県" ) selected @endif>愛媛県</option>
                        <option value="高知県" @if ( old('prefecture') == "高知県" ) selected @endif>高知県</option>
                        <option value="福岡県" @if ( old('prefecture') == "福岡県" ) selected @endif>福岡県</option>
                        <option value="佐賀県" @if ( old('prefecture') == "佐賀県" ) selected @endif>佐賀県</option>
                        <option value="長崎県" @if ( old('prefecture') == "長崎県" ) selected @endif>長崎県</option>
                        <option value="熊本県" @if ( old('prefecture') == "熊本県" ) selected @endif>熊本県</option>
                        <option value="大分県" @if ( old('prefecture') == "大分県" ) selected @endif>大分県</option>
                        <option value="宮崎県" @if ( old('prefecture') == "宮崎県" ) selected @endif>宮崎県</option>
                        <option value="鹿児島県" @if ( old('prefecture') == "鹿児島県" ) selected @endif>鹿児島県</option>
                        <option value="沖縄県" @if ( old('prefecture') == "沖縄県" ) selected @endif>沖縄県</option>
                    </select>
                </div>
                <div class="form-group my-5" id="rindou_select_form">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="rindou_name">林道の名前を選択</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('rindou_id')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <select class="form-select" id="rindou_select" name="rindou_id">
                        <option value="" selected>林道名を選択して下さい</option>
                        @foreach ($rindous as $rindou)
                            <option value="{{ $rindou->id }}" class="default_select">{{ $rindou->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="rindou_img">林道の画像を選択（複数選択可）</label>
                        <span class="bg-secondary text-light ms-2 mb-2 px-1 rounded-pill">任意</span>
                        @error('rindou_img.*')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="form-control" id="formFile" type="file" name="rindou_img[]" accept=".jpeg, .jpg, .png" multiple>
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="title">タイトルを入力</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('title')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="form-control" name="title" value="{{ old('title') }}">
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="content">投稿する内容を入力</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('content')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <textarea class="form-control" name="content" value="{{ old('content') }}" rows="10"></textarea>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto my-5">
                    <button class="btn btn-primary" type="submit">投稿する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
