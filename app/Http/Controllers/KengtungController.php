<?php

namespace App\Http\Controllers;

use App\Models\Additional;
use App\Models\Carrefund;
use App\Models\Novouncher;
use App\Models\Psite;
use App\Models\Tksite;
use App\Models\Togetpaided;
use Illuminate\Http\Request;

class KengtungController extends Controller
{
    public function index()
    {
        $tksite = Tksite::all();
        $psite = Psite::all();
        $togetpaided = Togetpaided::all();
        $novouncher = Novouncher::all();
        $carrefund = Carrefund::all();
        $additional = Additional::all();
        return view('detail', [
            'tksite' => $tksite,
            'tksitetotal' => $tksite->sum('amount'),
            'psite' => $psite,
            'psitetotal' => $psite->sum('tamount'),
            'togetpaided' => $togetpaided,
            'togetpaidedtotal' => $togetpaided->sum('amount'),
            'novouncher' => $novouncher,
            'novounchertotal' => $novouncher->sum('amount'),
            'carrefund' => $carrefund,
            'carrefundtotal' => $carrefund->sum('amount'),
            'additional' => $additional,
            'additionaltotal' => $additional->sum('amount'),
        ]);
    }
}
