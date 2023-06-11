<?php

namespace App\Http\Controllers;

use App\Models\Historyout;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Driver;
use PDF;

class HistoryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->status) {
            if ($request->status == 'toget') {
                return view('historyout', [
                    'histories' => Historyout::where('balance', '>', 0)->orderBy('created_at', 'desc')->with('product')->with('driver')->get()->groupBy( function ($data){ return 
            $data->created_at->format('d-m-Y');}),
            'drivers' => Driver::all(),
                    'status' => 'toget'
                ]);
            }
            if ($request->status == 'topay') {
                return view('historyout', [
                    'histories' => Historyout::where('balance', '<', 0)->orderBy('created_at', 'desc')->with('product')->with('driver')->get()->groupBy( function ($data){ return 
            $data->created_at->format('d-m-Y');}),
                'drivers' => Driver::all(),
                    'status' => 'topay'
                ]);
            }
            if ($request->status == 'paided') {
                return view('historyout', [
                    'histories' => Historyout::where('balance', '=', 0)->orderBy('created_at', 'desc')->with('product')->with('driver')->get()->groupBy( function ($data){ return 
                    $data->created_at->format('d-m-Y');}),
                    'drivers' => Driver::all(),
                    'status' => 'paided'
                ]);
            }
        }
        return view('historyout', [
            'histories' => Historyout::orderBy('created_at', 'desc')->with('product')->with('driver')->get()->groupBy( function ($data){ return 
            $data->created_at->format('d-m-Y');}),
            'types' => Type::all(),
            'drivers' => Driver::all(),
            'status' => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_historyout = Historyout::create([
            'totalCarfare' => $request->totalCarfare,
            'totalInvested' => $request->totalInvested,
            'percent' => $request->percent,
            'workCost' => $request->workCost,
            'totalCost' => $request->totalCost,
            'payment' => $request->payment,
            'balance' => $request->balance,
            'driver_id' => $request->driver_id,
            'insurance' => $request->insurance,
            'drivername' => $request->drivername,
        ]);
        Historyout::find($created_historyout->id)->product()->sync($request->productsIds);
        return redirect(route('historyout.show',$created_historyout->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $d = Historyout::where('id', $id)->first();
        $productsIds = [];
        foreach ($d->product as $da) {
            array_push($productsIds, $da->id);
        }
        $paided = Product::whereIn('id', $productsIds)->where('is_paided', true)->sum('carfare');
        return view('view', [
            'data' => $d,
            'driver' => $d->driver,
            'products' => Product::whereIn('id', $productsIds)->get(),
            'drivers' => Driver::all(),
            'types' => Type::all(),
            'productsIds' => $productsIds,
            'paided' => $paided
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
        $h = Historyout::where('id', $id)->first();
        $h->update([
            'percent' => $request->percent,
            'workCost' => $request->workCost,
            'totalCost' => $request->totalCost,
            'payment' => $request->payment,
            'balance' => $request->balance,
            'insurance' => $request->insurance,
            'pinlonpercent' => $request->pinlonpercent,
            'loilempercent' => $request->loilempercent,
        ]);
    return redirect(route('historyout.show',$h->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Historyout::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
