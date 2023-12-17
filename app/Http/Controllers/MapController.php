<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rindou;
use App\Models\Clear;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rindouList = Rindou::all();
        $rindouList = json_encode($rindouList);

        if(Auth::check()) {
            $clearList = Clear::where('user_id', Auth::user()->id)->get();
            $clearList = json_encode($clearList);

            return view('map.getClear', compact('rindouList', 'clearList'));
        }

        return view('map.index', compact('rindouList'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
