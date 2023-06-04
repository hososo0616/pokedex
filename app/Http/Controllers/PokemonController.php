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
        if ($request->number == 'desc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("id", "desc")
            ->get();
        } elseif($request->name == 'asc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("jp_name", "asc")
            ->get();
        } elseif($request->name == 'desc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("jp_name", "desc")
            ->get();
        } elseif($request->height == 'asc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("height", "asc")
            ->get();
        } elseif($request->height == 'desc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("height", "desc")
            ->get();
        } elseif($request->weight == 'asc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("weight", "asc")
            ->get();
        } elseif($request->weight == 'desc') {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )
            ->orderBy("weight", "desc")
            ->get();
        } else {
            $data = Pokemon::select(
                'p_id',
                'jp_name',
                'en_name',
                'type1',
                'type2',
                'ability1',
                'ability2',
                'hidden_ability',
                'hp',
                'attack',
                'defense',
                'special_attack',
                'special_defense',
                'speed',
                'total_stats',
                'front_default',
                'back_default',
                'dream_world_front_default',
                'home_front_default',
                'official_artwork_front_default',
                'height',
                'weight'
            )->get();
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
