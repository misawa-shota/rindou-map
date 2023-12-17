<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Clear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mypage()
    {
        $user = Auth::user();

        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->limit(3)->get();
        $clears = Clear::where('user_id', Auth::user()->id)->limit(12)->get();

        $clearCount = 0;
        if(!$clears->isempty()) {
            $clearCount = Clear::where('user_id', Auth::user()->id)->count();
        }

        $count = 0;
        if(!$posts->isempty()) {
            $count = Post::where('user_id', Auth::user()->id)->count();
        }

        return view('user.mypage', compact('user', 'posts', 'count', 'clears', 'clearCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[^!"#$%&\'()\.,\/:;<=>?@\[\\]^_`{|}~\+\*\-]*$/'],
            'icon_img' => 'required|file|mimes:jpeg,jpg,png',
            'email' => ['required', 'string', 'email:strict,dns,spoof', Rule::unique('users')->ignore(Auth::id())],
        ], [
            'name.required' => 'ユーザー名は必須です。',
            'name.string' => 'ユーザー名は文字列の形式で入力して下さい。',
            'name.regex' => '「^!"#$%&\'().,/:;<=>?@[]_`{|}~+*-」等の記号は入力できません。',
            'icon_img.required' => 'アイコン画像は必須です。',
            'icon_img.file' => 'ファイルを正しくアップロードして下さい。',
            'icon_img.mimes' => 'アップロードできるファイルは拡張子が「.jpeg」「.jpg」「.png」の3種類のみです。',
            'email.required' => 'メールアドレスは必須です。',
            'email.string' => 'メールアドレスは文字列の形式で入力して下さい。',
            'email.email' => 'abc@example.comのようにメールアドレスは正しく入力して下さい。',
            'email.unique' => 'このメールアドレスはすでに使用されています。'
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->introduction = $request->introduction;

        $dir = 'icon_img';
        $oldImgValue = $user->getOriginal('icon_img');
        Storage::disk('public')->delete($dir. '/'. $oldImgValue);

        $file = $request->file('icon_img');
        $fileName = $file->getClientOriginalName();
        $fileName = date('Ymd_His').'_'.$fileName;
        $file->storeAs('public/'. $dir, $fileName);
        $rindouImgString = $fileName;
        $user->icon_img = $rindouImgString;

        $user->save();

        return redirect()->route('mypage', compact('user'))->with('flash_message', 'プロフィールを更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
