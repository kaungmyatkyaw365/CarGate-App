<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Driver;
use App\Models\Type;
use App\Models\History;
use App\Models\Historyout;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::where('inGate', true)->get();
        if ($search = $request->name) {
            Product::where('inGate', true)->where('customer', 'like', "%$search%")->get();
        };
        return view('productout', [
            
            'types' => Type::all(),
            'addresses' => Address::all(),
            'products' => $products,
            'drivers' => Driver::all()
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
        if($request->ids){
        Product::whereIn('id', $request->ids)->update(['inGate' => false, 'outdriver_id' =>  $request->driver_id, 'outtime' => Carbon::now('Asia/Yangon')]);
        $driver = Driver::where('id', $request->driver_id)->first();
        if ($driver->id == 1) {
            return redirect()->back();
        }
        $paided = Product::whereIn('id', $request->ids)->where('is_paided', true)->sum('carfare');
        $insurance = Product::whereIn('id', $request->ids)->where('type_id', 1)->sum('quantity') * 300;

        return view('reciept', [
            
            'drivers' => Driver::all(),
            'types' => Type::all(),
            'addresses' => Address::all(),
            'driver' => $driver,
            'products' => Product::whereIn('id', $request->ids)->get(),
            'productsIds' => $request->ids,
            'paided' => $paided,
            'insurance' => $insurance
        ]);
        }
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
        $d = Historyout::where('id', $id)->first();
        $d->update([
            'driver_id' => $request->driver_id,
            'created_at' => $request->created_at,
        ]);
        
        $productsIds = [];
        foreach ($d->product as $da) {
            array_push($productsIds, $da->id);
        }
        Product::whereIn('id', $productsIds)->update(['outdriver_id' =>  $request->driver_id, 'outtime' =>$request->created_at]);
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
