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
        return view('posts.index');
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

        if ($prefecture == '都道府県を選択して下さい') {
            $rindous = Rindou::all();

            foreach($rindous as $rindou) {
                $rindouList[] = array(
                    'name' => $rindou->name
                );
            }
            echo json_encode($rindouList);
        } else {
            $rindous = Rindou::where('prefecture', 'LIKE', "%{$prefecture}%")->get();

            if (!$rindous->isempty()) {
                foreach($rindous as $rindou) {
                    $rindouList[] = array(
                        'name' => $rindou->name
                    );
                }
                echo json_encode($rindouList);
            } else {
                $rindouList[] = array(
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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
