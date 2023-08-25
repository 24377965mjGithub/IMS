<?php

namespace App\Http\Controllers;

use App\Models\ProductOuts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = ProductOuts::all();
        $saleMonths = [];
        foreach ($sales as $key => $value) {
            $month = Carbon::createFromFormat('Y-m-d H:i:s', $value['created_at'])->format('M Y');
            if (!in_array($month, $saleMonths)) {
                array_push($saleMonths, $month);
            }
        };

        // return $saleMonths;
        $audits = DB::table('audits')->orderBy('id', 'desc')->get();
        $qoute = Inspiring::quote();
        return view('dashboard', [
            'audits'  => $audits, 'qoute' => $qoute,
            'saleMonths' => $saleMonths
        ]);
    }
}
