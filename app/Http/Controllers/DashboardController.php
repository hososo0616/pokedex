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
        // $rand_num = mt_rand(1, 1200);
        // $pokemon = mt_rand(1, 1200);

        $pokemon = Pokemon::findOrFail(1);


        return Inertia::render('Dashboard', [
            'pokemon' => $pokemon,
        ]);

        // return Inertia::render('Dashboard');
    }
}
