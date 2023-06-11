<?php

namespace App\Http\Controllers;

use App\Models\Historyout;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index()
    {
        $topay = Historyout::where('balance', '<', 0)->sum('balance') * -1;
        $toget = Historyout::where('balance', '>', 0)->sum('balance');
        $thismonthincome = Historyout::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->sum('percent');
        $postmonthincome = Historyout::whereYear('created_at', date('Y', strtotime('-1 month')))->whereMonth('created_at', date('m', strtotime('-1 month')))->sum('percent');
        $thismonthpinlon = Historyout::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->sum('pinlonpercent');
        $postmonthpinlon = Historyout::whereYear('created_at', date('Y', strtotime('-1 month')))->whereMonth('created_at', date('m', strtotime('-1 month')))->sum('pinlonpercent');
        $thismonthloilem = Historyout::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->sum('loilempercent');
        $postmonthloilem = Historyout::whereYear('created_at', date('Y', strtotime('-1 month')))->whereMonth('created_at', date('m', strtotime('-1 month')))->sum('loilempercent');
        $thismonthwork = Historyout::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->sum('workCost');
        $postmonthwork = Historyout::whereYear('created_at', date('Y', strtotime('-1 month')))->whereMonth('created_at', date('m', strtotime('-1 month')))->sum('workCost');
        $months = [date('F')];
        $incomepercents = [$thismonthincome];
        $incomework = [$thismonthwork];
        for ($i = 1; $i <= 8; $i++) {
            $months[] = date('F', strtotime("-$i month"));
            $incomepercents[] = Historyout::whereYear('created_at', date('Y', strtotime("-$i month")))->whereMonth('created_at', date('m', strtotime("-$i month")))->sum('percent');
            $incomework[] = Historyout::whereYear('created_at', date('Y', strtotime("-$i month")))->whereMonth('created_at', date('m', strtotime("-$i month")))->sum('workCost');
        }
        $todeleteproducts = Product::where('updated_at', '<', Carbon::now()->subDays(365))->get();
        foreach ($todeleteproducts as $d) {
            $d->delete();
        }
        $todeletehistoryout = Historyout::where('updated_at', '<', Carbon::now()->subDays(365))->get();
        foreach ($todeletehistoryout as $d) {
            $d->delete();
        }
        return view('index', [
            'topay' => $topay,
            'toget' => $toget,
            'thismonthincome' => $thismonthincome,
            'postmonthincome' => $postmonthincome,
            'thismonthpinlon' => $thismonthpinlon,
            'postmonthpinlon' => $postmonthpinlon,
            'thismonthloilem' => $thismonthloilem,
            'postmonthloilem' => $postmonthloilem,
            'postmonthwork' => $postmonthwork,
            'thismonthwork' => $thismonthwork,
            'months' => $months,
            'incomepercent' => $incomepercents,
            'incomework' => $incomework

        ]);
    }
}
