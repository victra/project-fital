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
        // $siswas = Siswa::orderby('nis', 'ASC');
        // dd($siswas->get()->toArray());

        // relasi manual
        $siswas = Siswa::orderby('created_at', 'DESC')->get();
        foreach ($siswas as $value) {
            $value['kelas_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
        }
        // dd($siswa->toArray());

        // append array absensi ke array siswa
        $absensisiswa = Siswa::with('absensi');
            dd($absensisiswa->get()->toArray());

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $absensisiswa = $absensisiswa->where('kelas_id', Input::get('search_kelas'))->get();
            $input_kelas = Input::get('search_kelas');
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

        if ($tanggal && Input::has('search_kelas')) {
            for ($i=0; $i < count($absensisiswa) ; $i++) { 
                $absensisiswa[$i]['absensi'] = Absensi::where('siswa_id', $absensisiswa[$i]['id'])->where('date', $tanggal)->first();
            }
        }

        $content['siswasi'] = $absensisiswa;
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
            $check_absensi = Absensi::where('siswa_id', $siswa_id)->where('date', Input::get('tanggal'))->where('kelas', Input::get('kelas'))->first();
            if ($check_absensi) {
                $absensi = $check_absensi;
            } else {
                $absensi = new Absensi;
            }
            $absensi->check_by_id = Auth::user()->id;//Orang yang melakukan absensi
            $absensi->siswa_id = $siswa_id;
            $absensi->kelas = Input::get('kelas');
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

    public function deleteabsensi()
    {
        
    }

    //rekap absensi per bulan
    public function rekapabsensiminggu()
    {
        $absensi = Absensi::orderby('created_at', 'DESC');

        $sakit = DB::table('absensi')->where('status', 'S')->count();
        $izin = DB::table('absensi')->where('status', 'I')->count();
        $alpa = DB::table('absensi')->where('status', 'A')->count();
        
        // $kelas = array(
        //     'X AK 1' => 'X AK 1',
        //     'X AK 2' => 'X AK 2',
        //     'X AK 3' => 'X AK 3',
        //     'X FARMASI' => 'X FARMASI',
        //     'X RPL 1' => 'X RPL 1',
        //     'X RPL 2' => 'X RPL 2',
        //     'XI AK 1' => 'XI AK 1',
        //     'XI AK 2' => 'XI AK 2',
        //     'XI FARMASI' => 'XI FARMASI',
        //     'XI RPL 1' => 'XI RPL 1',
        //     'XI RPL 2' => 'XI RPL 2',
        //     'XII AK 1' => 'XII AK 1',
        //     'XII AK 2' => 'XII AK 2',
        //     'XII FARMASI' => 'XII FARMASI',
        //     'XII RPL 1' => 'XII RPL 1',
        //     'XII RPL 2' => 'XII RPL 2',
        // );

        // $bulan = array(
        //     'Januari' => 'Januari',
        //     'Februari' => 'Februari',
        //     'Maret' => 'Maret',
        //     'April' => 'April',
        //     'Mei' => 'Mei',
        //     'Juni' => 'Juni',
        //     'Juli' => 'Juli',
        //     'Agustus' => 'Agustus',
        //     'September' => 'September',
        //     'Oktober' => 'Oktober',
        //     'November' => 'November',
        //     'Desember' => 'Desember',
        // );
       
        $content['absensis'] = $absensi->get();
        $content['sakit'] = $sakit;
        $content['izin'] = $izin;
        $content['alpa'] = $alpa;
        // $content['kelas'] = $kelas;
        // $content['bulan'] = $bulan;
        return View::make('absensi.rekapabsensiminggu')
                    ->with('content', $content);

        // return View('absensi.rekapabsensibulan');
    }

    //rekap absensi per semester
    public function rekapabsensisemester()
    {
        $siswa = Siswa::orderby('created_at', 'DESC');

        $kelas = array(
            'X AK 1' => 'X AK 1',
            'X AK 2' => 'X AK 2',
            'X AK 3' => 'X AK 3',
            'X FARMASI' => 'X FARMASI',
            'X RPL 1' => 'X RPL 1',
            'X RPL 2' => 'X RPL 2',
            'XI AK 1' => 'XI AK 1',
            'XI AK 2' => 'XI AK 2',
            'XI FARMASI' => 'XI FARMASI',
            'XI RPL 1' => 'XI RPL 1',
            'XI RPL 2' => 'XI RPL 2',
            'XII AK 1' => 'XII AK 1',
            'XII AK 2' => 'XII AK 2',
            'XII FARMASI' => 'XII FARMASI',
            'XII RPL 1' => 'XII RPL 1',
            'XII RPL 2' => 'XII RPL 2',
        );

        $semester = array(
            'Semester 1' => 'Semester 1',
            'Semester 2' => 'Semester 2',
        );
       
        $content['siswas'] = $siswa->get();
        $content['kelas'] = $kelas;
        $content['semester'] = $semester;
        return View::make('absensi.rekapabsensisemester')
                    ->with('content', $content);

        // return View('absensi.rekapabsensisemester');
    }

    public function cariabsensi()
    {
        $absensi = Absensi::orderby('created_at', 'DESC');
        // dd($absensi->get()->toArray());

        // relasi manual
        // $absensi = Absensi::orderby('created_at', 'DESC')->get();
        // foreach ($absensi as $value) {
        //     $value['check_by_manual'] = User::where('id', $value['check_by_id'])->first()->toArray();
        //     $value['siswa_manual'] = Siswa::where('id', $value['siswa_id'])->first()->toArray();
        //     $value['kelas_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
        // }
        // dd($absensi->toArray());

        $content['absensis'] = $absensi->where('status','!=', 'H')->get();
        
        return View::make('absensi.cariabsensi')
                    ->with('content', $content);
        // return View('absensi.cariabsensi');
    }
}
