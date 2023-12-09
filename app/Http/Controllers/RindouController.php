<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rindou;
use App\Models\Post;

class RindouController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prefecture = $request->input('prefecture');
        $count = 0;
        if(!empty($prefecture)) {
            $rindous = Rindou::where('prefecture', 'LIKE', "%{$prefecture}%");
            $count = $rindous->count();
            $rindous = $rindous->paginate(15);
        } else {
            $rindous = Rindou::all();
        }

        return view('rindous.index', compact('prefecture', 'rindous', 'count'));
    }

    public function postList(Rindou $rindou)
    {
        $prefecture = $_GET['prefecture'];
        $posts = Post::where('rindou_id', $rindou->id)->orderBy('created_at', 'DESC')->paginate(15);
        $count = Post::where('rindou_id', $rindou->id)->count();

        return view('rindous.postList', compact('rindou', 'posts', 'count', 'prefecture'));
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
    public function show(Rindou $rindou)
    {
        $prefecture = $_GET['prefecture'];

        $markers = Rindou::all();
        $markers = json_encode($markers);

        $count = 0;
        if (Post::where('rindou_id', $rindou->id)->exists()) {
            $posts = Post::where('rindou_id', $rindou->id)->orderBy('created_at', 'DESC')->limit(3)->get();
            $count = Post::where('rindou_id', $rindou->id)->count();
        } else {
            $posts = '';
        }

        return view('rindous.show', compact('rindou', 'prefecture', 'markers', 'posts', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rindou $rindou)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rindou $rindou)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rindou $rindou)
    {
        //
    }
}
