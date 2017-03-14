<?php 
namespace App\Http\Controllers;
use Model\Siswa;
use Model\Absensi;
use Model\Kelas;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function showabsensi()
    {
       
        \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');
        

        // $siswas = Siswa::orderby('nis', 'ASC');
        // dd($siswas->get()->toArray());

        // relasi manual
        $siswas = Siswa::orderby('nis', 'ASC')->get();
        // foreach ($siswas as $value) {
        //     $value['kelas_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
        // }
        // dd($siswa->toArray());

        // append array absensi ke array siswa
        // $absensisiswa = Siswa::with('absensi');
            // dd($absensisiswa->get()->toArray());

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $siswas = Siswa::orderby('nis', 'ASC')->where('kelas_id', Input::get('search_kelas'))->get();
            $input_kelas = Input::get('search_kelas');
            \Session::flash('info_absensi','Isi kolom "Status" untuk siswa yang berhalangan hadir saja.');
        }

        if (Input::has('tanggal')) {
            $tanggal = Input::get('tanggal');
        } else {
            $tanggal = date("Y-m-d");
        }

        $jenis_kelamin = array(
            'Laki-Laki' => 'Laki-Laki',
            'Perempuan' => 'Perempuan',
        );

        $agama = array(
            'Islam' => 'Islam',
            'Katolik' => 'Katolik',
            'Kristen' => 'Kristen',
            'Hindu' => 'Hindu',
            'Budha' => 'Budha',
        );

        $kelas = Kelas::get();

        $status = array(
            '' => '-',
            'H' => 'Hadir',
            'I' => 'Izin',
            'S' => 'Sakit',
            'A' => 'Alpa',
        );

        //cara manual
        // if ($tanggal && Input::has('search_kelas') && $siswas) {
        //     for ($i=0; $i < count($siswas) ; $i++) { 
        //         $siswas[$i]['absensi_manual'] = Absensi::where('siswa_id', $siswas[$i]['id'])->where('date', $tanggal)->first();
        //     }
        // }

        //cara relation
        if ($tanggal && Input::has('search_kelas')) {
            //kenapa pakek ada addAppends? soalnya relasi ini cuma di panggil di absensi controller kalo mau di permanen maka dipanggilnya disini,
            //model siswa
            //protected $appends = array(
            //    'kelas',
            //);
            foreach ($siswas as $siswa) {
                $siswa->addAppends('absensi_non_permanent');
            }
        }

        // dd($siswas->toArray());
        $content['siswasi'] = $siswas;
        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        $content['status'] = $status;
        $content['tanggal'] = $tanggal;

        return View::make('absensi.showabsensi')
                    ->with('content', $content);
    }

    public function storeabsensi()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        foreach (Input::get('absensi') as $siswa_id=>$item) {
            $check_absensi = Absensi::where('siswa_id', $siswa_id)->where('date', Input::get('tanggal'))->where('kelas_id', Input::get('kelas'))->first();
            if ($check_absensi) {
                $absensi = $check_absensi;
            } else {
                $absensi = new Absensi;
            }
            $absensi->check_by_id = Auth::user()->id;//Orang yang melakukan absensi
            $absensi->siswa_id = $siswa_id;
            $absensi->kelas_id = Input::get('kelas');
            $absensi->status = $item['status'] ? $item['status'] : 'H';
            $absensi->description = $item['description'];
            $absensi->date = Input::get('tanggal');

            if(!$absensi->save()) {
                throw new \ValidationException($absensi->errors());
            }
        }
        \Session::flash('flash_message','Data absensi berhasil disimpan.');
        return back ();
    }

    public function deleteabsensi($date, $kelas_id)
    {
        DB::table('absensi')->where('date', $date)->where('kelas_id', $kelas_id)->delete();
        \Session::flash('flash_message','Data absensi berhasil dihapus.');
        return back ();   
    }

    //rekap absensi per minggu
    public function rekapabsensiminggu()
    {
        $siswa = Siswa::orderby('nis', 'ASC')->get();

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $siswa = Siswa::orderby('nis', 'ASC')->where('kelas_id', Input::get('search_kelas'))->get();
            $input_kelas = Input::get('search_kelas');
        }

        if (Input::has('dari_tanggal')) {
            $dari_tanggal = Input::get('dari_tanggal');
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        } else {
            $dari_tanggal = date("Y-m-d");
            $daystosum = '6';
            $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
        }

        $kelas = Kelas::get();

        // if (Input::has('search_kelas')) {
        //     foreach ($siswa as $siswai) {
        //         $siswai->addAppends('absensi_non_permanent');
        //     }
        // }

        // if (Input::has('search_kelas')) {
        //     //kenapa pakek ada addAppends? soalnya relasi ini cuma di panggil di absensi controller kalo mau di permanen maka dipanggilnya disini,
        //     //model siswa
        //     //protected $appends = array(
        //     //    'kelas',
        //     //);
        //     foreach ($siswa as $siswas) {
        //         $siswas->addAppends('absensi_rekap');
        //     }
        // }

        // dd($siswa->toArray());

        // $date = Input::get('tanggal');
        // $kelas_id = Input::get('kelas');
        
        // $query = "SELECT siswa.nis, siswa.nama, siswa.jkl,

        //         -- Jumlah Sakit
        //         (SELECT COUNT(absensi.status)
        //         FROM absensi
        //         WHERE absensi.status = 'S'
        //         AND absensi.date = '$date'
        //         AND absensi.siswa_id = siswa.id
        //         AND absensi.siswa_id IN (SELECT siswa.id
        //                           FROM siswa
        //                           WHERE siswa.kelas_id = '$kelas_id'
        //                           ORDER BY siswa.nis ASC)
        //         GROUP BY siswa.nis
        //         ORDER BY siswa.nis ASC) AS Sakit,

        //         -- Jumlah Izin
        //         (SELECT COUNT(absensi.status)
        //         FROM absensi
        //         WHERE absensi.status = 'I'
        //         AND absensi.date = '$date'
        //         AND absensi.siswa_id = siswa.id
        //         AND absensi.siswa_id IN (SELECT siswa.id
        //                           FROM siswa
        //                           WHERE siswa.kelas_id = '$kelas_id'
        //                           ORDER BY siswa.nis ASC)
        //         GROUP BY siswa.nis
        //         ORDER BY siswa.nis ASC) AS Ijin,

        //         -- Jumlah Alpa
        //         (SELECT COUNT(absensi.status)
        //         FROM absensi
        //         WHERE absensi.status = 'A'
        //         AND absensi.date = '$date'
        //         AND absensi.siswa_id = siswa.id
        //         AND absensi.siswa_id IN (SELECT siswa.id
        //                           FROM siswa
        //                           WHERE siswa.kelas_id = '$kelas_id'
        //                           ORDER BY siswa.nis ASC)
        //         GROUP BY siswa.nis
        //         ORDER BY siswa.nis ASC) AS Alpa

        //     FROM siswa
        //     WHERE siswa.id_kelas = '$id_kelas'
        //     GROUP BY siswa.nis
        //     ORDER BY siswa.nis ASC;";

        // SELECT COUNT(*) FROM absensi WHERE status = 'I' AND date >= '2017-03-04' AND date <= '2017-03-07'
        $sakit = DB::table('absensi')
                    ->where('status','I')
                    ->where('kelas_id',Input::get('search_kelas'))
                    ->where('date','>=','2017-03-04')
                    ->where('date','<=','2017-03-07')->get();
        $izin = DB::table('absensi')
                    ->where('status','I')
                    ->where('kelas_id',Input::get('search_kelas'))
                    ->where('date','>=','2017-03-04')
                    ->where('date','<=','2017-03-07')->get();
        $alpa = DB::table('absensi')
                    ->where('status','I')
                    ->where('kelas_id',Input::get('search_kelas'))
                    ->where('date','>=','2017-03-04')
                    ->where('date','<=','2017-03-07')->get();
        // dd($sakit);
       
        $content['absensis'] = $siswa;
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        $content['sakit'] = $sakit;
        $content['izin'] = $izin;
        $content['alpa'] = $alpa;
        $content['dari_tanggal'] = $dari_tanggal;
        $content['sampai_tanggal'] = $sampai_tanggal;

        return View::make('absensi.rekapabsensiminggu')
                    ->with('content', $content);
    }

    //rekap absensi per semester
    public function rekapabsensisemester()
    {
        $siswa = Siswa::orderby('nis', 'ASC');

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $siswa = $siswa->where('kelas_id', Input::get('search_kelas'));
            $input_kelas = Input::get('search_kelas');
        }

        $kelas = Kelas::get();

        $semester = array(
            'Semester 1' => 'Semester 1',
            'Semester 2' => 'Semester 2',
        );
       
        $content['absensis'] = $siswa->get();
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        $content['semester'] = $semester;
        return View::make('absensi.rekapabsensisemester')
                    ->with('content', $content);
    }

    public function cariabsensi()
    {
        

        // relasi manual
        // $absensi = Absensi::orderby('created_at', 'DESC')->get();
        // foreach ($absensi as $value) {
        //     $value['check_by_manual'] = User::where('id', $value['check_by_id'])->first()->toArray();
        //     $value['siswa_manual'] = Siswa::where('id', $value['siswa_id'])->first()->toArray();
        //     $value['kelas_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
        // }
        // dd($absensi->toArray());

        $absensi = Absensi::orderby('created_at', 'DESC');

        $content['absensis'] = $absensi->where('status','!=', 'H')->get();
        
        return View::make('absensi.cariabsensi')
                    ->with('content', $content);
    }

    public function cek()
    {
        $x = Input::get('tanggal');
        dd($x);        
    }
}
