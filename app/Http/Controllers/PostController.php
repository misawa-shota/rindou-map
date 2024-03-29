<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rindou;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(15);
        $count = 0;
        if (!$posts->isempty()) {
            $count = Post::where('user_id', Auth::user()->id)->count();
        }

        return view('posts.index', compact('posts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rindous = Rindou::all();

        return view('posts.create', compact('rindous'));
    }

    public function getRindouList(Request $request)
    {
        $prefecture = $request->prefecture;

        if ($prefecture == '') {
            $rindous = Rindou::all();

            foreach($rindous as $rindou) {
                $rindouList[] = array(
                    'id' => $rindou->id,
                    'name' => $rindou->name
                );
            }
            echo json_encode($rindouList);
        } else {
            $rindous = Rindou::where('prefecture', 'LIKE', "%{$prefecture}%")->get();

            if (!$rindous->isempty()) {
                foreach($rindous as $rindou) {
                    $rindouList[] = array(
                        'id' => $rindou->id,
                        'name' => $rindou->name
                    );
                }
                echo json_encode($rindouList);
            } else {
                $rindouList[] = array(
                    'id' => '',
                    'name' => ''
                );
                echo json_encode($rindouList);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'prefecture' => 'required',
            'rindou_id' => 'required',
            'rindou_img.*' => 'file|mimes:jpeg,jpg,png',
            'title' => 'required',
            'content' => 'required'
        ], [
            'prefecture.required' => '都道府県の選択は必須です。',
            'rindou_id.required' => '林道名の選択は必須です。',
            'rindou_img.*.file' => 'ファイルを正しくアップロードして下さい。',
            'rindou_img.*.mimes' => 'アップロードできるファイルは拡張子が「.jpeg」「.jpg」「.png」の3種類のみです。',
            'title.required' => 'タイトルは必須です。',
            'content.required' => '投稿内容の項目は必須です。'
        ]);

        $post = new Post();

        $post->rindou_id = $request->rindou_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->content = $request->content;

        $files = $request->file('rindou_img');
        $dir = 'post_img';
        $filePath = 'https://s3-ap-northeast-1.amazonaws.com/rindou-map/post_img/';
        if(!empty($files)) {
            $rindouImgArray = [];
            foreach ($files as $file) {
                $path = Storage::disk('s3')->putFile('/'.$dir, $file, 'public');
                $fullPath = Storage::disk('s3')->url($path);
                $fileName = str_replace($filePath, '', $fullPath);
                $rindouImgArray[] = $fileName;
            }
            $rindouImgString = implode(",", $rindouImgArray);
            $post->img = $rindouImgString;
        } else {
            $post->img = '';
        }

        $post->save();

        return redirect()->route('posts.index')->with('flash_message', '新しい投稿を追加しました。');
    }

    public function detailpage(Post $post)
    {
        $prefecture = $_GET['prefecture'];
        $rindou = Rindou::where('id', $post->rindou_id)->get();
        $user = User::where('id', $post->user_id)->get();

        return view('posts.detailpage', compact('post', 'rindou', 'user', 'prefecture'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $rindous = Rindou::all();

        return view('posts.edit', compact('post', 'rindous'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'prefecture' => 'required',
            'rindou_id' => 'required',
            'rindou_img.*' => 'file|mimes:jpeg,jpg,png',
            'title' => 'required',
            'content' => 'required'
        ], [
            'prefecture.required' => '都道府県の選択は必須です。',
            'rindou_id.required' => '林道名の選択は必須です。',
            'rindou_img.*.file' => 'ファイルを正しくアップロードして下さい。',
            'rindou_img.*.mimes' => 'アップロードできるファイルは拡張子が「.jpeg」「.jpg」「.png」の3種類のみです。',
            'title.required' => 'タイトルは必須です。',
            'content.required' => '投稿内容の項目は必須です。'
        ]);

        $post->rindou_id = $request->rindou_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->input('title');
        $post->content = $request->content;

        $dir = 'post_img';
        $filePath = 'https://s3-ap-northeast-1.amazonaws.com/rindou-map/post_img/';
        $oldImgValue = $post->getOriginal('img');
        if (!empty($oldImgValue)) {
            $oldImgArray = explode(",", $oldImgValue);
            foreach($oldImgArray as $oldImg) {
                Storage::disk('s3')->delete($dir. '/'. $oldImg);
            }
        }

        $files = $request->file('rindou_img');
        if(!empty($files)) {
            $rindouImgArray = [];
            foreach ($files as $file) {
                $path = Storage::disk('s3')->putFile('/'.$dir, $file, 'public');
                $fullPath = Storage::disk('s3')->url($path);
                $fileName = str_replace($filePath, '', $fullPath);
                $rindouImgArray[] = $fileName;
            }
            $rindouImgString = implode(",", $rindouImgArray);
            $post->img = $rindouImgString;
        } else {
            $post->img = '';
        }

        $post->update();

        return redirect()->route('posts.show', compact('post'))->with('flash_message', '投稿内容を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $dir = 'post_img';
        if (!empty($post->img)) {
            $images = explode(",", $post->img);

            foreach ($images as $image) {
                Storage::disk('s3')->delete($dir. '/'. $image);
            }
        }

        $post->delete();

        return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました。');
    }
}
