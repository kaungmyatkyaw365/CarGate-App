<?php

namespace App\Http\Controllers;
use App\Models\Monthsaryin;
use App\Models\City;
use App\Models\Kengtung;
use App\Models\Carsite;
use App\Models\Productsite;
use App\Models\Additional;
use App\Models\Carrefund;
use App\Models\Novouncher;
use App\Models\Togetpaided;
use App\Models\Psite;
use App\Models\Carhtut;
use App\Models\Tksite;





use Illuminate\Http\Request;

class MonthsaryinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('monthsaryin',[
            'cities'=> City::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Monthsaryin::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $d = Monthsaryin::where('id',$id)->first();
        $city = City::where('id',$d->city_id)->first();
        return view('saryin', [
            'city' => $city,
            'monthsaryinid' => $d,
            'toget' => Kengtung::where('to_get', true)->where('monthsaryin_id', $d->id)->get(),
            'topay' => Kengtung::where('to_get', false)->where('monthsaryin_id', $d->id)->get(),
            'topaytotal' => Kengtung::where('to_get', false)->where('monthsaryin_id', $d->id)->sum('amount'),
            'togettotal' => Kengtung::where('to_get', true)->where('monthsaryin_id', $d->id)->sum('amount'),
            'carsitetotal' =>Carsite::where('monthsaryin_id', $d->id)->sum('amount'),
            'productsitetotal' =>Productsite::where('monthsaryin_id', $d->id)->sum('amount'),
            'additionaltotal' =>Additional::where('monthsaryin_id', $d->id)->sum('amount'),
            'carrefundtotal' =>Carrefund::where('monthsaryin_id', $d->id)->sum('amount'),
            'novounchertotal' =>Novouncher::where('monthsaryin_id', $d->id)->sum('amount'),
            'togetpaidedtotal' =>Togetpaided::where('monthsaryin_id', $d->id)->sum('amount'),
            'psitetotal' =>Psite::where('monthsaryin_id', $d->id)->sum('amount'),
            'tksitetotal' =>Tksite::where('monthsaryin_id', $d->id)->sum('amount'),

        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Monthsaryin::where('id', $id)->delete();
        Kengtung::where('monthsaryin_id', $id)->delete();
        Carsite::where('monthsaryin_id', $id)->delete();
        Productsite::where('monthsaryin_id', $id)->delete();
        Additional::where('monthsaryin_id', $id)->delete();
        Carrefund::where('monthsaryin_id', $id)->delete();
        Novouncher::where('monthsaryin_id', $id)->delete();
        Togetpaided::where('monthsaryin_id', $id)->delete();
        Psite::where('monthsaryin_id', $id)->delete();
        Tksite::where('monthsaryin_id', $id)->delete();
        Carhtut::where('monthsaryin_id', $id)->delete();
        
        return redirect()->back();
        
    }
}
