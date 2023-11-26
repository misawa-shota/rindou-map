<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rindou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(15);

        return view('posts.index', compact('posts'));
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
        $rindouImgArray = [];
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            $fileName = date('Ymd_His').'_'.$fileName;
            $file->move('img', $fileName);
            $rindouImgArray[] = $fileName;
        }
        $rindouImgString = implode(",", $rindouImgArray);
        $post->img = $rindouImgString;

        $post->save();

        return redirect()->route('posts.index')->with('flash_message', '新しい投稿を追加しました。');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
