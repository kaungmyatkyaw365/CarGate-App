<?php

namespace App\Http\Controllers;
use App\Models\Historyout;
use App\Models\Product;
use App\Models\Type;
use App\Models\Driver;
use Carbon\Carbon;


use Illuminate\Http\Request;

class HistoryoutaddController extends Controller
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
        $h = Historyout::where('id', $id)->first();
        $products = Product::where('inGate', true)->get();
        return view('historyoutadd', [
            'types' => Type::all(),
            'drivers' => Driver::all(),
            'driver' => $h->driver,
            'products' => $products,
            'data'=> $h
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
        if($request->ids){
        Product::whereIn('id', $request->ids)->update(['inGate' => false, 'outdriver_id' =>  $request->driver_id, 'outtime' => Carbon::now('Asia/Yangon')]);
        $h = Historyout::where('id', $id)->first();
        $h->product()->syncWithoutDetaching($request->ids);
        $paided = Product::whereIn('id', $request->ids)->where('is_paided', true)->sum('carfare');
        $carfare = Product::whereIn('id', $request->ids)->sum('carfare');
        $insur = Product::whereIn('id', $request->ids)->where('type_id', 1)->sum('quantity') * 300;
        $insurance = $h->insurance + $insur;
        $totalcarfare = $h->totalCarfare + $carfare;
        $percent = $totalcarfare/10;
        $invested = Product::whereIn('id', $request->ids)->sum('invested');
        $totalcost = $h->totalCost + $invested + $percent + $insur - $h->percent - $paided;
        $balance = $totalcost - $h->payment;
        $totalinvested = $invested + $h->totalInvested;
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
