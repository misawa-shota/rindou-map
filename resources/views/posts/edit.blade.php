@extends('layouts.postCreate')

@section('content')
    <div class="container my-5 py-5">
        <div class="d-flex align-items-center">
            <h2 class="me-5">投稿編集ページ</h2>
            <a href="{{ route('posts.show', $post->id) }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover link-dark fs-5">投稿詳細ページへ戻る</a>
        </div>
        <div>
            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
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
                        <?php
                            $prefectures = DB::table('rindous')->select('prefecture')->where('id', $post->rindou_id)->get();
                        ?>
                        <option selected value="" @if ( old('prefecture') == '' ) selected @endif>都道府県を選択して下さい</option>
                        <option value="北海道" @if ( old('prefecture') == "北海道" || strpos($prefectures[0]->prefecture, '北海道') !== false ) selected @endif>北海道</option>
                        <option value="青森県" @if ( old('prefecture') == "青森県" || strpos($prefectures[0]->prefecture, '青森県') !== false ) selected @endif>青森県</option>
                        <option value="岩手県" @if ( old('prefecture') == "岩手県" || strpos($prefectures[0]->prefecture, '岩手県') !== false ) selected @endif>岩手県</option>
                        <option value="宮城県" @if ( old('prefecture') == "宮城県" || strpos($prefectures[0]->prefecture, '宮城県') !== false ) selected @endif>宮城県</option>
                        <option value="秋田県" @if ( old('prefecture') == "秋田県" || strpos($prefectures[0]->prefecture, '秋田県') !== false ) selected @endif>秋田県</option>
                        <option value="山形県" @if ( old('prefecture') == "山形県" || strpos($prefectures[0]->prefecture, '山形県') !== false ) selected @endif>山形県</option>
                        <option value="福島県" @if ( old('prefecture') == "福島県" || strpos($prefectures[0]->prefecture, '福島県') !== false ) selected @endif>福島県</option>
                        <option value="茨城県" @if ( old('prefecture') == "茨城県" || strpos($prefectures[0]->prefecture, '茨城県') !== false ) selected @endif>茨城県</option>
                        <option value="栃木県" @if ( old('prefecture') == "栃木県" || strpos($prefectures[0]->prefecture, '栃木県') !== false ) selected @endif>栃木県</option>
                        <option value="群馬県" @if ( old('prefecture') == "群馬県" || strpos($prefectures[0]->prefecture, '群馬県') !== false ) selected @endif>群馬県</option>
                        <option value="埼玉県" @if ( old('prefecture') == "埼玉県" || strpos($prefectures[0]->prefecture, '埼玉県') !== false ) selected @endif>埼玉県</option>
                        <option value="千葉県" @if ( old('prefecture') == "千葉県" || strpos($prefectures[0]->prefecture, '千葉県') !== false ) selected @endif>千葉県</option>
                        <option value="東京都" @if ( old('prefecture') == "東京都" || strpos($prefectures[0]->prefecture, '東京都') !== false ) selected @endif>東京都</option>
                        <option value="神奈川県" @if ( old('prefecture') == "神奈川県" || strpos($prefectures[0]->prefecture, '神奈川県') !== false ) selected @endif>神奈川県</option>
                        <option value="新潟県" @if ( old('prefecture') == "新潟県" || strpos($prefectures[0]->prefecture, '新潟県') !== false ) selected @endif>新潟県</option>
                        <option value="富山県" @if ( old('prefecture') == "富山県" || strpos($prefectures[0]->prefecture, '富山県') !== false ) selected @endif>富山県</option>
                        <option value="石川県" @if ( old('prefecture') == "石川県" || strpos($prefectures[0]->prefecture, '石川県') !== false ) selected @endif>石川県</option>
                        <option value="福井県" @if ( old('prefecture') == "福井県" || strpos($prefectures[0]->prefecture, '福井県') !== false ) selected @endif>福井県</option>
                        <option value="山梨県" @if ( old('prefecture') == "山梨県" || strpos($prefectures[0]->prefecture, '山梨県') !== false ) selected @endif>山梨県</option>
                        <option value="長野県" @if ( old('prefecture') == "長野県" || strpos($prefectures[0]->prefecture, '長野県') !== false ) selected @endif>長野県</option>
                        <option value="岐阜県" @if ( old('prefecture') == "岐阜県" || strpos($prefectures[0]->prefecture, '岐阜県') !== false ) selected @endif>岐阜県</option>
                        <option value="静岡県" @if ( old('prefecture') == "静岡県" || strpos($prefectures[0]->prefecture, '静岡県') !== false ) selected @endif>静岡県</option>
                        <option value="愛知県" @if ( old('prefecture') == "愛知県" || strpos($prefectures[0]->prefecture, '愛知県') !== false ) selected @endif>愛知県</option>
                        <option value="三重県" @if ( old('prefecture') == "三重県" || strpos($prefectures[0]->prefecture, '三重県') !== false ) selected @endif>三重県</option>
                        <option value="滋賀県" @if ( old('prefecture') == "滋賀県" || strpos($prefectures[0]->prefecture, '滋賀県') !== false ) selected @endif>滋賀県</option>
                        <option value="京都府" @if ( old('prefecture') == "京都府" || strpos($prefectures[0]->prefecture, '京都府') !== false ) selected @endif>京都府</option>
                        <option value="大阪府" @if ( old('prefecture') == "大阪府" || strpos($prefectures[0]->prefecture, '大阪府') !== false ) selected @endif>大阪府</option>
                        <option value="兵庫県" @if ( old('prefecture') == "兵庫県" || strpos($prefectures[0]->prefecture, '兵庫県') !== false ) selected @endif>兵庫県</option>
                        <option value="奈良県" @if ( old('prefecture') == "奈良県" || strpos($prefectures[0]->prefecture, '奈良県') !== false ) selected @endif>奈良県</option>
                        <option value="和歌山県" @if ( old('prefecture') == "和歌山県" || strpos($prefectures[0]->prefecture, '和歌山県') !== false ) selected @endif>和歌山県</option>
                        <option value="鳥取県" @if ( old('prefecture') == "鳥取県" || strpos($prefectures[0]->prefecture, '鳥取県') !== false ) selected @endif>鳥取県</option>
                        <option value="島根県" @if ( old('prefecture') == "島根県" || strpos($prefectures[0]->prefecture, '島根県') !== false ) selected @endif>島根県</option>
                        <option value="岡山県" @if ( old('prefecture') == "岡山県" || strpos($prefectures[0]->prefecture, '岡山県') !== false ) selected @endif>岡山県</option>
                        <option value="広島県" @if ( old('prefecture') == "広島県" || strpos($prefectures[0]->prefecture, '広島県') !== false ) selected @endif>広島県</option>
                        <option value="山口県" @if ( old('prefecture') == "山口県" || strpos($prefectures[0]->prefecture, '山口県') !== false ) selected @endif>山口県</option>
                        <option value="徳島県" @if ( old('prefecture') == "徳島県" || strpos($prefectures[0]->prefecture, '徳島県') !== false ) selected @endif>徳島県</option>
                        <option value="香川県" @if ( old('prefecture') == "香川県" || strpos($prefectures[0]->prefecture, '香川県') !== false ) selected @endif>香川県</option>
                        <option value="愛媛県" @if ( old('prefecture') == "愛媛県" || strpos($prefectures[0]->prefecture, '愛媛県') !== false ) selected @endif>愛媛県</option>
                        <option value="高知県" @if ( old('prefecture') == "高知県" || strpos($prefectures[0]->prefecture, '高知県') !== false ) selected @endif>高知県</option>
                        <option value="福岡県" @if ( old('prefecture') == "福岡県" || strpos($prefectures[0]->prefecture, '福岡県') !== false ) selected @endif>福岡県</option>
                        <option value="佐賀県" @if ( old('prefecture') == "佐賀県" || strpos($prefectures[0]->prefecture, '佐賀県') !== false ) selected @endif>佐賀県</option>
                        <option value="長崎県" @if ( old('prefecture') == "長崎県" || strpos($prefectures[0]->prefecture, '長崎県') !== false ) selected @endif>長崎県</option>
                        <option value="熊本県" @if ( old('prefecture') == "熊本県" || strpos($prefectures[0]->prefecture, '熊本県') !== false ) selected @endif>熊本県</option>
                        <option value="大分県" @if ( old('prefecture') == "大分県" || strpos($prefectures[0]->prefecture, '大分県') !== false ) selected @endif>大分県</option>
                        <option value="宮崎県" @if ( old('prefecture') == "宮崎県" || strpos($prefectures[0]->prefecture, '宮崎県') !== false ) selected @endif>宮崎県</option>
                        <option value="鹿児島県" @if ( old('prefecture') == "鹿児島県" || strpos($prefectures[0]->prefecture, '鹿児島県') !== false ) selected @endif>鹿児島県</option>
                        <option value="沖縄県" @if ( old('prefecture') == "沖縄県" || strpos($prefectures[0]->prefecture, '沖縄県') !== false ) selected @endif>沖縄県</option>
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
                        <?php
                            $names = DB::table('rindous')->select('name')->where('id', $post->rindou_id)->get();
                            $prefectureRindouList = DB::table('rindous')->select('*')->where('prefecture', 'LIKE', "%{$prefectures[0]->prefecture}%")->get();
                        ?>
                        @if (!empty($post->id))
                            @foreach ($prefectureRindouList as $rindouList)
                                <option @if ($names[0]->name == $rindouList->name) selected @endif value="{{ $rindouList->id }}">{{ $rindouList->name }}</option>
                            @endforeach
                        @else
                            @foreach ($rindous as $rindou)
                                <option value="{{ $rindou->id }}" class="default_select">{{ $rindou->name }}</option>
                            @endforeach
                        @endif
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
                    <input class="form-control" name="title" value="{{ old('title', $post->title) }}">
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="content">投稿する内容を入力</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('content')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <textarea class="form-control" name="content" rows="10">{{ old('content', $post->content) }}</textarea>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto my-5">
                    <button class="btn btn-primary" type="submit">再投稿する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
