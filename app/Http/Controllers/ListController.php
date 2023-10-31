<?php

namespace App\Http\Controllers;

use App\Models\Rindou;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $prefecture = $request->input('prefecture');
        $count = 0;
        if(!empty($prefecture)) {
            $markers = Rindou::where('prefecture', 'LIKE', "%{$prefecture}%")->groupBy('name')->get(['name']);
            // $markers = Rindou::all();
            $count = $markers->count();
        } else {
            $markers = Rindou::all();
        }

        return view('list.index', compact('prefecture', 'markers', 'count'));
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
        //
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
