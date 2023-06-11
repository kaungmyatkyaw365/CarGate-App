<?php

namespace App\Http\Controllers;

use App\Models\Carhtut;
use App\Models\Monthsaryin;
use App\Models\City;
use Illuminate\Http\Request;

class CarhtutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Carhtut::create($request->all());
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carhtut  $carhtut
     * @return \Illuminate\Http\Response
     */
    public function show(Carhtut $carhtut)
    {   
        //
    }
    
    public function shows($id)
    {   
        $carhtuts = Carhtut::where('monthsaryin_id',$id)->get();
        $carhtuttotal = Carhtut::where('monthsaryin_id',$id)->sum('amount');
        $d = Monthsaryin::where('id',$id)->first();
        $city = City::where('id',$d->city_id)->first();

        return view('carhtut',[
            'carhtuts' => $carhtuts,
            'carhtuttotal' => $carhtuttotal,
            'city' => $city
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carhtut  $carhtut
     * @return \Illuminate\Http\Response
     */
    public function edit(Carhtut $carhtut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carhtut  $carhtut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carhtut $carhtut)
    {
        $carhtut->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carhtut  $carhtut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carhtut $carhtut)
    {
        $carhtut->delete();
        return redirect()->back();

    }
}
