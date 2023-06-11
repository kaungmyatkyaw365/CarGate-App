<?php

namespace App\Http\Controllers;

use App\Models\productsite;
use Illuminate\Http\Request;

class ProductsiteController extends Controller
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
        Productsite::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productsite  $productsite
     * @return \Illuminate\Http\Response
     */
    public function show(productsite $productsite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productsite  $productsite
     * @return \Illuminate\Http\Response
     */
    public function edit(productsite $productsite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productsite  $productsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, productsite $productsite)
    {
        $productsite->update($request->all());        
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productsite  $productsite
     * @return \Illuminate\Http\Response
     */
    public function destroy(productsite $productsite)
    {
        //
    }
}
