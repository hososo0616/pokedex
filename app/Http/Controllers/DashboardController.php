<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        //ランダムな数値生成
        $rand_num = mt_rand(1, 1010);

        //対象のポケモン情報を取得
        $pokemon = Pokemon::findOrFail($rand_num);

        return Inertia::render('Dashboard', [
            'pokemon' => $pokemon,
        ]);
    }
}
