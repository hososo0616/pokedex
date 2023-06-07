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

        $query = Pokemon::query();
        $requestTypeList = [];

        //キーワード検索
        if ($request->search) {
            $keyword = $request->search;
            $query->where('jp_name','like','%'.$keyword.'%');
            // dd($request->search);
        }

        //タイプ一致検索
        if ($request->type) {
            foreach ($request->type as $typer) {
                array_push($requestTypeList, $typer);
            }
            // dd($typewild);
        }

        //表示順並び替え
        if ($request->number == 'desc') {
            $data = $query->orderBy("id", "desc")->get();
        } elseif($request->number == 'asc') {
            $data = $query->orderBy("id", "asc")->get();
        } elseif($request->name == 'desc') {
            $data = $query->orderBy("jp_name", "desc")->get();
        } elseif($request->name == 'asc') {
            $data = $query->orderBy("jp_name", "asc")->get();
        } elseif($request->height == 'asc') {
            $data = $query->orderBy("height", "asc")->get();
        } elseif($request->height == 'desc') {
            $data = $query->orderBy("height", "desc")->get();
        } elseif($request->weight == 'asc') {
            $data = $query->orderBy("weight", "asc")->get();
        } elseif($request->weight == 'desc') {
            $data = $query->orderBy("weight", "desc")->get();
        } else {
            $data = $query->get();
        }

        return Inertia::render('Pokedex/Index', [
            'pokeinfo' => $data,
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
