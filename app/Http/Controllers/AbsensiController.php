<?php 
namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class AbsensiController extends Controller
{
    public function showabsensi()
    {
        $siswa = Siswa::orderby('nis', 'ASC');
        //rencana : awal buka menu absensi siswa, tidak ada data yang ditampilkan, harus pilih kelas dulu, kalo pilih Semua Kelas, akan ditampilkan semua kelas.
        $input_kelas = 'a';
        if(Input::has('search_kelas')){
            $siswa = $siswa->where('kelas', Input::get('search_kelas'))->get();
            $input_kelas = Input::get('search_kelas');
        }
        elseif (Input::has('value','search_kelas=semua_kelas')) {
            $siswa = siswa::all();
            $input_kelas = Input::get('search_kelas');
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
            '' => 'Semua Kelas',
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
       
        $content['siswas'] = $siswa;
        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        return View::make('absensi.showabsensi')
                    ->with('content', $content);
    }

    //store absensi
    public function storeabsensi()
    {

    }

    //delete absensi
    public function deleteabsensi()
    {

    }

    //cari absensi
    public function cariabsensi()
    {
        return View('absensi.cariabsensi');
    }

    //rekap absensi per bulan
    public function rekapabsensibulan()
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

        $bulan = array(
            'Januari' => 'Januari',
            'Februari' => 'Februari',
            'Maret' => 'Maret',
            'April' => 'April',
            'Mei' => 'Mei',
            'Juni' => 'Juni',
            'Juli' => 'Juli',
            'Agustus' => 'Agustus',
            'September' => 'September',
            'Oktober' => 'Oktober',
            'November' => 'November',
            'Desember' => 'Desember',
        );
       
        $content['siswas'] = $siswa->get();
        $content['kelas'] = $kelas;
        $content['bulan'] = $bulan;
        return View::make('absensi.rekapabsensibulan')
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
}

