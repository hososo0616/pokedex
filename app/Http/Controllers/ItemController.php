<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $data = Item::select(
        //     'item_id',
        //     'jp_name',
        //     'en_name',
        //     'cost',
        //     'description',
        //     'front_default',
        //     'category',
        // )->get();

        // dd($data)

        $query = Item::query();
        $requestTypeList = [];

        //キーワード検索
        if ($request->search) {
            $keyword = $request->search;
            $query->where('jp_name','like','%'.$keyword.'%');
            // dd($request->search);
        }

        //タイプ一致検索
        // if ($request->type) {
        //     foreach ($request->type as $typer) {
        //         array_push($requestTypeList, $typer);
        //     }
        //     // dd($typewild);

        //     if ( count($requestTypeList) == 1) {                     //1タイプのみの場合
        //         $query->where('type1', $requestTypeList[0]);
        //         $query->orWhere('type2', $requestTypeList[0]);
        //     } elseif (count($requestTypeList) == 2) {                //2タイプの場合
        //         $query->where([
        //             ['type1', '=', $requestTypeList[0]],
        //             ['type2', '=', $requestTypeList[1]],
        //         ]);
        //         $query->orWhere([
        //             ['type1', '=', $requestTypeList[1]],
        //             ['type2', '=', $requestTypeList[0]],
        //         ]);
        //     } elseif (count($requestTypeList) >= 3) {               //３タイプ以上の場合　存在しないので適当な文字列と比較
        //         $query->where('type1', 'abcde');
        //     }
        // }

        $data = $query->get();

        return Inertia::render('PokeItem/Index', [
            'iteminfo' => $data,
        ]);
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
    public function show($pokeitem)
    {
        $item = Item::findOrFail($pokeitem);

        // 確認用
        // dd($pokemon);

        return Inertia::render('PokeItem/Show', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
