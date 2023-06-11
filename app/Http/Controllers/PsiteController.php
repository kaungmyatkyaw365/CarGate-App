<?php

namespace App\Http\Controllers;

use App\Models\Psite;
use Illuminate\Http\Request;

class PsiteController extends Controller
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
        $r = $request->item * $request->amount;
        Psite::create([
            'date' => $request->date,
            'name' => $request->name,
            'location' => $request->location,
            'item' => $request->item,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'tamount' => $r
        ]);
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
        //
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
        $r = $request->item * $request->amount;
        $p = Psite::where('id', $id)->first();
        $p->update([
            'date' => $request->date,
            'name' => $request->name,
            'location' => $request->location,
            'item' => $request->item,
            'amount' => $request->amount,
            'remark' => $request->remark,
            'tamount' => $r
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Psite::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
