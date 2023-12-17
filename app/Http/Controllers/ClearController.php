<?php

namespace App\Http\Controllers;

use App\Models\Clear;
use App\Models\Rindou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clears = Clear::where('user_id', Auth::user()->id)->paginate(18);

        $clearCount = 0;
        if(!$clears->isempty()) {
            $clearCount = Clear::where('user_id', Auth::user()->id)->count();
        }

        return view('clear.index', compact('clears', 'clearCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rindous = Rindou::all();

        return view('clear.create', compact('rindous'));
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
            'rindou_id' => 'required'
        ], [
            'prefecture.required' => '都道府県の選択は必須です。',
            'rindou_id.required' => '林道名の選択は必須です。'
        ]);

        $clear = new Clear();

        $clear->rindou_id = $request->rindou_id;
        $clear->user_id = Auth::user()->id;

        $clear->save();

        return redirect()->route('clear.index')->with('flash_message', '新しい走行済みの林道が登録されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clear $clear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clear $clear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clear $clear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clear $clear)
    {
        $name = Rindou::where('id', $clear->rindou_id)->get('name');
        $clear->delete();

        return redirect()->route('clear.index')->with('flash_message', '走行済みの林道から'.$name[0]['name'].'を削除しました。');
    }
}
