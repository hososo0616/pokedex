<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // デバッグコード
        // dd($request->type);

        $query = Pokemon::query(); //クエリ生成
        $requestTypeList = [];     //タイプ用リスト
        $requestSortList = [];
        $sort = '0';

        //キーワード検索
        if ($request->search) {
            $keyword = $request->search;
            $requestSortList['search'] = $keyword;
            $query->where('jp_name','like','%'.$keyword.'%');
            // dd($request->search);
        }

        //タイプ一致検索
        if ($request->type) {
            foreach ($request->type as $typer) {
                array_push($requestTypeList, $typer);
            }
            // dd($typewild);

            if ( count($requestTypeList) == 1) {                     //1タイプのみの場合
                $query->where('type1', $requestTypeList[0]);
                $query->orWhere('type2', $requestTypeList[0]);
            } elseif (count($requestTypeList) == 2) {                //2タイプの場合
                $query->where([
                    ['type1', '=', $requestTypeList[0]],
                    ['type2', '=', $requestTypeList[1]],
                ]);
                $query->orWhere([
                    ['type1', '=', $requestTypeList[1]],
                    ['type2', '=', $requestTypeList[0]],
                ]);
            } elseif (count($requestTypeList) >= 3) {               //３タイプ以上の場合　存在しないので適当な文字列と比較
                $query->where('type1', 'abcde');
            }
            $requestSortList['type'] = $request->type;
        }

        //表示順並び替え
        if ($request->number == 'desc') {
            $data = $query->orderBy("id", "desc")->get();
            $requestSortList['sort'] = '番号順 最後→最初';
        } elseif($request->number == 'asc') {
            $data = $query->orderBy("id", "asc")->get();
            $requestSortList['sort'] = '番号順 最初→最後';
        } elseif($request->name == 'desc') {
            $data = $query->orderBy("jp_name", "desc")->get();
            $requestSortList['sort'] = '名前順 あ→ん';
        } elseif($request->name == 'asc') {
            $data = $query->orderBy("jp_name", "asc")->get();
            $requestSortList['sort'] = '名前順 ん→あ';
        } elseif($request->height == 'asc') {
            $data = $query->orderBy("height", "asc")->get();
            $requestSortList['sort'] = '高さ順 低い→高い';
        } elseif($request->height == 'desc') {
            $data = $query->orderBy("height", "desc")->get();
            $requestSortList['sort'] = '高さ順 高い→低い';
        } elseif($request->weight == 'asc') {
            $data = $query->orderBy("weight", "asc")->get();
            $requestSortList['sort'] = '重さ順 重い→軽い';
        } elseif($request->weight == 'desc') {
            $data = $query->orderBy("weight", "desc")->get();
            $requestSortList['sort'] = '重さ順 重い→軽い';
        } else {
            $data = $query->orderBy("id", "asc")->get();
            if (!$request->type) {
                $sort = '1';
            }
        }

        // dd($requestSortList);

        return Inertia::render('Pokedex/Index', [
            'pokeinfo' => $data,
            'sort' => $sort,
            'requestSortList' => $requestSortList,
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
    public function show($pokedex)
    {
        $pokemon = Pokemon::findOrFail($pokedex);

        // 確認用
        // dd($pokemon);

        // dd($_SERVER['HTTP_REFERER']);

        return Inertia::render('Pokedex/Show', [
            'pokemon' => $pokemon,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
