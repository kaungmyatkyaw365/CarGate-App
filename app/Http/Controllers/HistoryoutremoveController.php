<?php

namespace App\Http\Controllers;
use App\Models\Historyout;
use App\Models\Product;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HistoryoutremoveController extends Controller
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
        //
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
        if($request->id){
            $p = Product::where('id', $request->id)->first();
            $p->update(['inGate' => true, 'outdriver_id' => null , 'outtime' => null]);
            $h = Historyout::where('id', $id)->first();
            $h->product()->detach($request->id);
            $paided = 0;
            if($p->is_paided == true){
                $paided =$p->carfare;
            }
            $insur = 0;
            if ($p->type_id == 1){
                $insur =$p->quantity * 300;
            }
            $insurance = $h->insurance - $insur;
            $totalcarfare = $h->totalCarfare - $p->carfare;
            $percent = $totalcarfare/10;
            $totalcost = $h->totalCost - $p->invested + $percent - $h->percent -$insur + $paided;
            $balance = $totalcost - $h->payment;
            $totalinvested = $h->totalInvested - $p->invested;
            $h->update([
                'totalCarfare' => $totalcarfare,
                'totalCost' => $totalcost,
                'balance' => $balance,
                'totalInvested' => $totalinvested,
                'percent'=> $percent,
                'insurance'=> $insurance
            ]);
            return redirect(route('historyout.show',$h->id));
            }
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
        //
    }
}
