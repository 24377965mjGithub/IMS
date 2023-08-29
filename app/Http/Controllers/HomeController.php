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
                // $month = Carbon::createFromFormat('Y-m-d H:i:s', $value['created_at'])->format('M d Y');
                $saleDates = [
                    'date' => $value['created_at'],
                    'formatted_created_at' => Carbon::createFromFormat('Y-m-d H:i:s', $value['created_at'])->format('M d Y')
                ];

                // foreach ($saleMonths as $key2 => $value2) {
                //     if (!in_array($saleDates['date'], $saleMonths)) {
                //         array_push($saleMonths, $saleDates);
                //     }
                // }

                if (!in_array($saleDates['date'], $saleMonths)) {
                    array_push($saleMonths, $saleDates);
                }
                // $month = Carbon::createFromFormat('Y-m-d H:i:s', $value['created_at'])->format('M d Y');

            };

            // return $saleMonths;
            $audits = DB::table('audits')->orderBy('id', 'desc')->get();
            $qoute = Inspiring::quote();
            return view('dashboard', [
                'audits'  => $audits, 'qoute' => $qoute,
                'saleMonths' => $saleMonths
            ]);


        // return $saleMonths;
    }
}
