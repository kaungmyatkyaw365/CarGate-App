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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->date) {
            $date = Carbon::createFromFormat('Y-m-d', $request->date);
        };
        $products = Product::orderBy('created_at', 'desc');
        if ($search = $request->name) {
            $products->where('customer', 'like', "%$search%");
        };
        if ($request->date) {
            $products->whereDate('created_at', $date);
        };
        if ($request->driver_id) {
            $products->where('driver_id', '=', $request->driver_id)->orWhere('outdriver_id', '=', $request->driver_id);
        };
        if ($request->address_id) {
            $products->where('address_id', '=', $request->address_id);
        };
        $products = $products->paginate(30);
        $products->appends($request->all()); // add this line to append query params

        $todeleteproducts = Product::where('updated_at', '<', Carbon::now()->subDays(365))->get();
        foreach ($todeleteproducts as $d) {
            $d->delete();
        }
        $todeletehistoryout = Historyout::where('updated_at', '<', Carbon::now()->subDays(365))->get();
        foreach ($todeletehistoryout as $d) {
            if ($d->balance == 0){
                $d->delete();
            }
        }
        return view('product', [
            'drivers' => Driver::all(),
            'types' => Type::all(),
            'addresses' => Address::all(),
            'products' => $products
        ]);
    }

    /**s
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
        $data = $request->all();
        if($request->created_at == null) {
            date_default_timezone_set('Asia/Yangon');
            $data['created_at'] =  date('Y-m-d\TH:i:s.u\Z',time());

        }
        
        Product::create($data);
        $product = Product::latest()->first();
        return redirect()->back()->with(array('driver_id' => $request->driver_id, 'address_id' => $product->address->id));
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
        Product::where('id', $id)->update([
            'customer' => $request->customer,
            'driver_id' => $request->driver_id,
            'phone' => $request->phone,
            'quantity' => $request->quantity,
            'type_id' => $request->type_id,
            'carfare' => $request->carfare,
            'is_paided' => $request->is_paided,
            'invested' =>    $request->invested,
            'address_id' => $request->address_id,
            'created_at' => $request->created_at,
            'remark' => $request->remark,
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
        Product::where('id', $id)->first()->delete();
        return redirect()->back();
    }
}
