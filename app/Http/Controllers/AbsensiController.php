<?php 
namespace App\Http\Controllers;
use App\Models\Siswa;
use App\Models\Absensi;
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
        $siswas = Siswa::orderby('nis', 'ASC');

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $siswas = $siswas->where('kelas', Input::get('search_kelas'))->get();
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

        $status = array(
            '' => '-',
            'I' => 'Izin',
            'S' => 'Sakit',
            'A' => 'Alpa',
        );

        if ($tanggal && Input::has('search_kelas')) {
            for ($i=0; $i < count($siswas) ; $i++) { 
                $siswas[$i]['absensi'] = Absensi::where('siswa_id', $siswas[$i]['id'])->where('date', $tanggal)->first();
            }
        }

        $content['siswas'] = $siswas;
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
            $absensi->check_by = Auth::user()->id;//Orang yang melakukan absensi
            $absensi->siswa_id = $siswa_id;
            $absensi->kelas = Input::get('kelas');
            $absensi->status = $item['status'];
            $absensi->description = $item['description'];
            $absensi->date = Input::get('tanggal');

            if(!$absensi->save()) {
                throw new \ValidationException($absensi->errors());
            }
        }
        \Session::flash('flash_message','Data absensi berhasil disimpan.');
        return back ();
    }

    //rekap absensi per bulan
    public function rekapabsensiminggu()
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
       
        $content['siswas'] = $siswa->get();
        $content['kelas'] = $kelas;
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
        $content['absensis'] = $absensi->get();
        
        return View::make('absensi.cariabsensi')
                    ->with('content', $content);
        // return View('absensi.cariabsensi');
    }
}
