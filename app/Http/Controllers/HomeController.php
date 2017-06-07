<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use Model\Siswa;
use Model\Absensi;
use Model\Kelas;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
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

    public function beranda()
    {
        $kelas = Kelas::orderby('nama_kelas', 'ASC')->get();

        $jadwal = array(
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu',
        );

        // total siswa
        for ($i=0; $i < count($kelas); $i++) { 
            $kelas[$i]['jumlah'] = Siswa::where('kelas_id', $kelas[$i]['id'])->get()->count();
        }

        // dd($kelas->toArray());

        if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
            for ($i=0; $i < count($kelas); $i++) { 
                $kelas[$i]['absensikelas'] = Absensi::where('kelas_id', $kelas[$i]['id'])->where('date', $tanggal)->where('status','!=','H')->get();
            }
        } else {
            $tanggal = date("Y-m-d");
            for ($i=0; $i < count($kelas); $i++) { 
                $kelas[$i]['absensikelas'] = Absensi::where('kelas_id', $kelas[$i]['id'])->where('date', $tanggal)->where('status','!=','H')->get();
            }
        }

        // dd($kelas->toArray());

        $content['kelass'] = $kelas;
        $content['tanggal'] = $tanggal;
        $content['jadwal'] = $jadwal;

        return View::make('home')
                    ->with('content', $content);
    }
}