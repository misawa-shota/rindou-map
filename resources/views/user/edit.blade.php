@extends('layouts.app')

@section('content')
    <div class="container my-5 py-5">
        <div class="d-flex my-5 align-items-center">
            <h2 class="me-5">プロフィール編集画面</h2>
            <a href="{{ route('mypage', Auth::user()->id) }}" class="link-underline link-underline-opacity-0 link-opacity-75-hover link-dark fs-5">マイページへ戻る</a>
        </div>
        <div class="my-5">
            <form action="{{ route('mypage.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="name">ユーザー名</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('name')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="form-control" type="text" name="name" value="{{ old('name', Auth::user()->name) }}">
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="icon_img">アイコンの画像を選択</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('icon_img')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="form-control" type="file" name="icon_img" accept=".jpeg, .jpg, .png">
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="email">メールアドレス</label>
                        <span class="bg-danger text-light ms-2 mb-2 px-1 rounded-pill">必須</span>
                        @error('email')
                            <span class="error ms-3 mb-2 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input class="form-control" type="email" name="email" value="{{ old('email', Auth::user()->email) }}">
                </div>
                <div class="form-group my-5">
                    <div class="d-flex align-items-center">
                        <label class="form-label" for="introduction">自己紹介入力欄</label>
                        <span class="bg-secondary text-light ms-2 mb-2 px-1 rounded-pill">任意</span>
                    </div>
                    <textarea class="form-control" name="introduction" rows="10">{{ old('introduction', Auth::user()->introduction) }}</textarea>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto my-5">
                    <button class="btn btn-primary" type="submit">プロフィールを更新する</button>
                </div>
            </form>
        </div>
    </div>
@endsection
