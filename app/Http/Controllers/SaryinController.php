<?php

namespace App\Http\Controllers;

use App\Models\Kengtung;
use Illuminate\Http\Request;

class SaryinController extends Controller
{
    public function index()
    {
        return view('saryin', [
            'toget' => Kengtung::where('to_get', true)->get(),
            'topay' => Kengtung::where('to_get', false)->get(),
            'topaytotal' => Kengtung::where('to_get', false)->sum('amount'),
            'togettotal' => Kengtung::where('to_get', true)->sum('amount'),
        ]);                                  
    }
    public function create(Request $request)
    {
        Kengtung::create($request->all());
        return redirect()->back();
    }
    public function update(Request $request)
    {
        Kengtung::where('id', $request->id)->first()->update([
            'about' => $request->about,
            'amount' => $request->amount
        ]);
        return redirect()->back();
    }
    public function destory(Request $request)
    {
        Kengtung::where('id', $request->id)->first()->delete();
        return redirect()->back();
    }
}
