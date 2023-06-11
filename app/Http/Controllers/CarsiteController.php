<?php

namespace App\Http\Controllers;

use App\Models\Carsite;
use Illuminate\Http\Request;

class CarsiteController extends Controller
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
        Carsite::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carsite  $carsite
     * @return \Illuminate\Http\Response
     */
    public function show(Carsite $carsite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carsite  $carsite
     * @return \Illuminate\Http\Response
     */
    public function edit(Carsite $carsite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carsite  $carsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carsite $carsite)
    {
        $carsite->update($request->all());
        return redirect()->back();
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carsite  $carsite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carsite $carsite)
    {
        //
    }
}
