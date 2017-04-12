<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use Model\Absensi;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function highchart()
    {
        $sakit = Absensi::select(DB::raw("COUNT(status) as count"))
            ->where('status','S')
            ->orderBy("created_at")
            ->groupBy(DB::raw("month(date)"))
            ->get()->toArray();
            // dd($sakit);
        $sakit = array_column($sakit, 'count');
        
        $izin = Absensi::select(DB::raw("COUNT(status) as count"))
            ->where('status','I')
            ->orderBy("created_at")
            ->groupBy(DB::raw("month(date)"))
            ->get()->toArray();
        $izin = array_column($izin, 'count');

        $alpa = Absensi::select(DB::raw("COUNT(status) as count"))
            ->where('status','A')
            ->orderBy("created_at")
            ->groupBy(DB::raw("month(date)"))
            ->get()->toArray();
        $alpa = array_column($alpa, 'count');

        return view('home')
            ->with('sakit',json_encode($sakit,JSON_NUMERIC_CHECK))
            ->with('izin',json_encode($izin,JSON_NUMERIC_CHECK))
            ->with('alpa',json_encode($alpa,JSON_NUMERIC_CHECK));
    }
}