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
        // $url = 'https://pokeapi.co/api/v2/item/114';
        //         $curl = curl_init($url);
        //         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        //         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //         $r = curl_exec($curl);
        //         $data = json_decode($r, true);

        //         dd($data['flavor_text_entries'][0]['text']
        //     );

        $query = Item::query();
        $sort = '0'; //表示順表示管理変数

        //キーワード検索
        if ($request->search) {
            $keyword = $request->search;
            $query->where('jp_name','like','%'.$keyword.'%');
            // dd($request->search);
        }

        //カテゴリ検索
        if ($request->category) {
            if ($request->category == 'tool') {
                $query->where('category', '=', 'evolution')
                ->orwhere('category', '=', 'spelunking');
            }
            if ($request->category == 'ball') {
                $query->where('category', '=', 'standard-balls')
                    ->orwhere('category', '=', 'special-balls');
            }
            if ($request->category == 'healing') {
                $query->where('category', '=', 'status-cures')
                    ->orwhere('category', '=', 'healing')
                    ->orwhere('category', '=', 'pp-recovery');
            }
            if ($request->category == 'vitamins') {
                $query->where('category', '=', 'vitamins');
            }
            if ($request->category == 'stat-boosts') {
                $query->where('category', '=', 'stat-boosts');
            }
        }

        //表示順並び替え
        //表示順並び替え
        if ($request->sort == 'name-desc') {
            $data = $query->orderBy("jp_name", "desc")->get();
            $requestSortList['sort'] = '名前順 最後→最初';
        } elseif($request->sort == 'name-asc') {
            $data = $query->orderBy("jp_name", "asc")->get();
            $requestSortList['sort'] = '名前順 最初→最後';
        } elseif($request->price == 'price-desc') {
            $data = $query->orderBy("cost", "desc")->get();
            $requestSortList['sort'] = '価格順 高い順';
        } elseif($request->price == 'price-asc') {
            $data = $query->orderBy("cost", "asc")->get();
            $requestSortList['sort'] = '価格順 低い順';
        } else {
            $data = $query->orderBy("id", "asc")->get();
            if (!$request->type) {
                $sort = '1';
            }
        }

        $data = $query->get();

        return Inertia::render('PokeItem/Index', [
            'iteminfo' => $data,
            'sort' => $sort,
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
