<?php

use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CarrefundController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HistoryoutController;
use App\Http\Controllers\HistoryoutaddController;
use App\Http\Controllers\HistoryoutremoveController;
use App\Http\Controllers\KengtungController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NovouncherController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOutController;
use App\Http\Controllers\PsiteController;
use App\Http\Controllers\SaryinController;
use App\Http\Controllers\TksiteController;
use App\Http\Controllers\TogetpaidedController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CarsiteController;
use App\Http\Controllers\ProductsiteController;
use App\Http\Controllers\MonthsaryinController;
use App\Http\Controllers\CarhtutController;
use App\Models\Additional;
use App\Models\Historyout;
use App\Models\Carsite;
use App\Models\Carrefund;
use App\Models\Novouncher;
use App\Models\Togetpaided;
use App\Models\Psite;
use App\Models\Tksite;
use App\Models\Carhtut;
use App\Models\Monthsaryin;
use App\Models\City;
use App\Models\Productsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nette\Utils\Json;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('saryin', [SaryinController::class, 'index'])->name('saryin');
Route::post('saryin', [SaryinController::class, 'create'])->name('saryin');
Route::put('saryin', [SaryinController::class, 'update'])->name('saryin');
Route::delete('saryin', [SaryinController::class, 'destory'])->name('saryin');
Route::get('details', [KengtungController::class, 'index'])->name('details');
Route::post('adadd', [AdditionalController::class, 'store']);
Route::post('novadd', [NovouncherController::class, 'store']);
Route::delete('addes/{id}', function ($id) {
    Additional::where('id', $id)->first()->delete();
    return redirect()->back();
});
Route::put('addes/{id}', function (Request $request, $id) {
    Additional::where('id', $id)->first()->update($request->all());
    return redirect()->back();
});
Route::resource('driver', DriverController::class);
Route::resource('tksite', TksiteController::class);
Route::resource('psite', PsiteController::class);
Route::resource('novouncher', NovouncherController::class);
Route::resource('carrefund', CarrefundController::class);
Route::resource('additional', AdditionalController::class);
Route::resource('togetpaided', TogetpaidedController::class);
Route::resource('type', TypeController::class);
Route::resource('address', AddressController::class);
Route::resource('product', ProductController::class);
Route::resource('productout', ProductOutController::class);
Route::resource('historyout', HistoryoutController::class);
Route::resource('historyoutadd', HistoryoutaddController::class);
Route::resource('historyoutremove', HistoryoutremoveController::class);
Route::resource('monthsaryin', MonthsaryinController::class);
Route::resource('city', CityController::class);
Route::resource('carhtut', CarhtutController::class);

Route::resource('carsite', CarsiteController::class);
Route::get('carsiteview/{id}', function ( $id)
{   $carsite = Carsite::where('monthsaryin_id', $id)->get();
    return view('carsite',[
        'carsite' => $carsite,
        'carsitetotal' => $carsite->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('carsiteview');

Route::resource('productsite', ProductsiteController::class);
Route::get('productsiteview/{id}', function ( $id)
{   $productsite = Productsite::where('monthsaryin_id', $id)->get();
    return view('productsite',[
        'productsite' => $productsite,
        'productsitetotal' => $productsite->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('productsiteview');

Route::get('additionalview/{id}', function ( $id)
{   $additional = Additional::where('monthsaryin_id', $id)->get();
    return view('additional',[
        'additional' => $additional,
        'additionaltotal' => $additional->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('additionalview');

// 33333333333333333333
Route::get('carrefundview/{id}', function ( $id)
{   $carrefund = Carrefund::where('monthsaryin_id', $id)->get();
    return view('carrefund',[
        'carrefund' => $carrefund,
        'carrefundtotal' => $carrefund->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('carrefundview');
Route::get('novouncherview/{id}', function ( $id)
{   $novouncher = Novouncher::where('monthsaryin_id', $id)->get();
    return view('novouncher',[
        'novouncher' => $novouncher,
        'novounchertotal' => $novouncher->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('novouncherview');
Route::get('togetpaidedview/{id}', function ( $id)
{   $togetpaided = Togetpaided::where('monthsaryin_id', $id)->get();
    return view('togetpaided',[
        'togetpaided' => $togetpaided,
        'togetpaidedtotal' => $togetpaided->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('togetpaidedview');
Route::get('psiteview/{id}', function ( $id)
{   $psite = Psite::where('monthsaryin_id', $id)->get();
    return view('psite',[
        'psite' => $psite,
        'psitetotal' => $psite->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('psiteview');
Route::get('tksiteview/{id}', function ( $id)
{   $tksite = Tksite::where('monthsaryin_id', $id)->get();
    return view('tksite',[
        'tksite' => $tksite,
        'tksitetotal' => $tksite->sum('amount'),
        'monthsaryinid' => $id
    ]);
}
)->name('tksiteview');


Route::get('carhtutid/{id}', function($id){
        $carhtuts = Carhtut::where('monthsaryin_id',$id)->get();
        $carhtuttotal = Carhtut::where('monthsaryin_id',$id)->sum('amount');
        $d = Monthsaryin::where('id',$id)->first();
        $city = City::where('id',$d->city_id)->first();

        return view('carhtut',[
            'carhtuts' => $carhtuts,
            'carhtuttotal' => $carhtuttotal,
            'city' => $city,
            'monthsaryin' => $d
        ]);
})->name('carhtutshows');