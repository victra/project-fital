<?php 
namespace App\Http\Controllers;
use Model\Siswa;
use Model\Absensi;
use Model\Kelas;
use Model\Semester;
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
        \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');

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
            // \Session::flash('info_rekap','Rekap Absensi Per Minggu digunakan untuk memantau siswa yang sering berhalangan hadir dalam satu minggu');
        } else {
            $dari_tanggal = "";
            $sampai_tanggal = "";
            \Session::flash('info_rekap','Masukkan tanggal mulai rekap.');
        }

        $kelas = Kelas::get();

        $content['absensis'] = $siswa;
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
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

        $input_semester = '';
        if (Input::has('semester')) {
            $semesters = Input::get('semester');
            $input_semester = Input::get('semester');
        } else {
            $semesters = "";
        }

        $semester = Semester::get();

        $tgl_awal = DB::table('semester')->where('id', Input::get('semester'))->value('tgl_awal');
        $tgl_akhir = DB::table('semester')->where('id', Input::get('semester'))->value('tgl_akhir');

        // $semester = array(
        //     'Semester 1' => 'Semester 1',
        //     'Semester 2' => 'Semester 2',
        // );
       
        $content['absensis'] = $siswa->get();
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        $content['semester'] = $semester;
        $content['sem'] = $semesters;
        $content['tgl_awal'] = $tgl_awal;
        $content['tgl_akhir'] = $tgl_akhir;
        $content['input_semester'] = $input_semester;
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
