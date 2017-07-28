<?php 
namespace App\Http\Controllers;
use Model\Siswa;
use Model\Absensi;
use Model\Kelas;
use Model\Semester;
use App\User;
use Illuminate\Http\Request;
use Datatables;
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
        if (Auth::user()->role == 'administrator' or Auth::user()->role == 'guru piket') {

            // \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');       
            
            $siswas = Siswa::orderby('nis', 'ASC')->get();
            // foreach ($siswas as $value) {
            //     $value['kelas_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
            // }
            // dd($siswa->toArray());

            // append array absensi ke array siswa
            // $absensisiswa = Siswa::with('absensi');
                // dd($absensisiswa->get()->toArray());

            $input_kelas = '';
            if(Input::has('search_kelas') && Input::get('search_kelas') != ''){
                $siswas = Siswa::orderby('nis', 'ASC')->where('kelas_id', Input::get('search_kelas'))->get();
                $input_kelas = Input::get('search_kelas');
                \Session::flash('info_absensi','Isi kolom "Status" untuk siswa yang berhalangan hadir saja | Jika tidak ada siswa yang berhalangan langsung klik tombol "Simpan Absensi".');
            } else {
                \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');
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

            $kelas = Kelas::orderby('nama_kelas', 'ASC')->get();

            $status = array(
                '' => '-',
                'H' => 'Hadir',
                'I' => 'Izin',
                'S' => 'Sakit',
                'A' => 'Alpa',
            );

            $jadwal = array(
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            );

            //cara manual
            // if ($tanggal && Input::has('search_kelas') && $siswas) {
            //     for ($i=0; $i < count($siswas) ; $i++) { 
            //         $siswas[$i]['absensi_manual'] = Absensi::where('siswa_id', $siswas[$i]['id'])->where('date', $tanggal)->first();
            //     }
            // }

            //cara relation
            if ($tanggal && Input::has('search_kelas')) {
                foreach ($siswas as $siswa) {
                    $siswa->addAppends('absensi_non_permanent');
                }
            }

            $content['siswasi'] = $siswas;
            $content['jenis_kelamin'] = $jenis_kelamin;
            $content['agama'] = $agama;
            $content['kelas'] = $kelas;
            $content['input_kelas'] = $input_kelas;
            $content['status'] = $status;
            $content['tanggal'] = $tanggal;
            $content['jadwal'] = $jadwal;

            return View::make('absensi.showabsensi')
                        ->with('content', $content);
        }
        else{
            return view('errors.404');
        }
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

    //rekap absensi per hari
    public function rekapabsensihari()
    {
        \Session::flash('info_message','Silahkan pilih atau ubah tanggal rekap.');
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

        return View::make('absensi.rekapabsensihari')
                    ->with('content', $content);
    }

    //rekap absensi per minggu
    public function rekapabsensiminggu()
    {
        if (Auth::user()->role != 'tamu') {
            // \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');

            $siswa = Siswa::orderby('nis', 'ASC')->get();

            $jadwal = array(
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            );

            $input_kelas = '';
            if(Input::has('search_kelas') && Input::get('search_kelas') != ''){
                $siswa = Siswa::orderby('nis', 'ASC')->where('kelas_id', Input::get('search_kelas'))->get();
                $input_kelas = Input::get('search_kelas');
                // \Session::flash('info_rekap','Silahkan masukkan tanggal mulai rekap atau pilih kelas yang lain.');

            } else if(Input::get('search_kelas') == ''){
                \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');                
            }

            $dari_tanggal = '';
            $sampai_tanggal = '';
            if (Input::has('dari_tanggal') && Input::get('dari_tanggal') != '') {
                $dari_tanggal = Input::get('dari_tanggal');
                $daystosum = '6';
                $sampai_tanggal = date('Y-m-d', strtotime($dari_tanggal.' + '.$daystosum.' days'));
                \Session::flash('info_rekap','Silahkan masukkan tanggal mulai rekap atau pilih kelas yang lain.');
                // \Session::flash('info_rekap','Rekap Absensi Per Minggu digunakan untuk memantau siswa yang sering berhalangan hadir dalam satu minggu');
            } else if (Input::get('search_kelas') != '' && Input::get('dari_tanggal') == ''){
                // $dari_tanggal = "";
                // $sampai_tanggal = "";
                \Session::flash('info_rekap','Silahkan masukkan tanggal mulai rekap atau pilih kelas yang lain.');
            }

            $kelas = Kelas::orderby('nama_kelas', 'ASC')->get();

            $content['absensis'] = $siswa;
            $content['kelas'] = $kelas;
            $content['input_kelas'] = $input_kelas;
            $content['dari_tanggal'] = $dari_tanggal;
            $content['sampai_tanggal'] = $sampai_tanggal;
            $content['jadwal'] = $jadwal;

            return View::make('absensi.rekapabsensiminggu')
                        ->with('content', $content);
        }
        else
        {
            return view('errors.404');
        }
    }

    //rekap absensi per bulan
    public function rekapabsensibulan()
    {
        if (Auth::user()->role != 'tamu') {
            // \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');

            $siswa = Siswa::orderby('nis', 'ASC');

            $jadwal = array(
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            );

            $input_kelas = '';
            if(Input::has('search_kelas') && Input::get('search_kelas') != ''){
                $siswa = $siswa->where('kelas_id', Input::get('search_kelas'));
                $input_kelas = Input::get('search_kelas');
            } else if(Input::get('search_kelas') == ''){
                \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');                
            }

            $kelas = Kelas::orderby('nama_kelas', 'ASC')->get();

            $input_bulan = '';
            if (Input::has('bulan') && Input::get('bulan') != '') {
                $input_bulan = Input::get('bulan');
                \Session::flash('info_rekap','Silahkan pilih bulan untuk rekap atau pilih kelas yang lain.');                
            } else if(Input::get('search_kelas') != '' && Input::get('bulan') == ''){
                $input_bulan = "";
                \Session::flash('info_rekap','Silahkan pilih bulan untuk rekap atau pilih kelas yang lain.');
            }

            $bulan = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            );

            $input_tahun = '';
            if(Input::has('tahun') && Input::get('tahun') != ''){
                $input_tahun = Input::get('tahun');
            } else if(Input::get('search_kelas') != '' && Input::get('bulan') != '' && Input::get('tahun') == ''){ 
                $input_tahun = '';
                // \Session::flash('info_rekap','Silahkan pilih tahun atau pilih bulan untuk rekap atau pilih kelas yang lain.');         
            }

            $tahun = array(
                '2016' => '2016',
                '2017' => '2017',
                '2018' => '2018',
                '2019' => '2019',
                '2020' => '2020',
            );
           
            $content['absensis'] = $siswa->get();
            $content['kelas'] = $kelas;
            $content['input_kelas'] = $input_kelas;
            $content['bulan'] = $bulan;
            $content['input_bulan'] = $input_bulan;
            $content['tahun'] = $tahun;
            $content['input_tahun'] = $input_tahun;
            $content['jadwal'] = $jadwal;

            return View::make('absensi.rekapabsensibulan')
                        ->with('content', $content);
        }
        else
        {
            return view('errors.404');
        }
    }

    //rekap absensi per semester
    public function rekapabsensisemester()
    {
        if (Auth::user()->role != 'tamu') {
            // \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');

            $siswa = Siswa::orderby('nis', 'ASC');

            $jadwal = array(
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            );

            $input_kelas = '';
            if(Input::has('search_kelas') && Input::get('search_kelas') != ''){
                $siswa = $siswa->where('kelas_id', Input::get('search_kelas'));
                $input_kelas = Input::get('search_kelas');
            } else if(Input::get('search_kelas') == ''){
                \Session::flash('info_message','Silahkan pilih kelas terlebih dahulu.');                
            }

            $kelas = Kelas::orderby('nama_kelas', 'ASC')->get();

            $input_semester = '';
            if (Input::has('semester') && Input::get('semester') != '') {
                $semesters = Input::get('semester');
                $input_semester = Input::get('semester');
                \Session::flash('info_rekap','Silahkan pilih semester untuk rekap atau pilih kelas yang lain.');
            } else if(Input::get('search_kelas') != '' && Input::get('semester') == '') {
                $input_semester = "";
                \Session::flash('info_rekap','Silahkan pilih semester untuk rekap atau pilih kelas yang lain.');
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
            // $content['sem'] = $semesters;
            $content['tgl_awal'] = $tgl_awal;
            $content['tgl_akhir'] = $tgl_akhir;
            $content['input_semester'] = $input_semester;
            $content['jadwal'] = $jadwal;

            return View::make('absensi.rekapabsensisemester')
                        ->with('content', $content);
        }
        else
        {
            return view('errors.404');
        }
    }

    public function cariabsensi()
    {
        $jadwal = array(
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu',
        );

        // relasi manual
        // $absensi = Absensi::orderby('created_at', 'DESC')->get();
        // foreach ($absensi as $value) {
        //     $value['check_by_manual'] = User::where('id', $value['check_by_id'])->first()->toArray();
        //     $value['siswa_manual'] = Siswa::where('id', $value['siswa_id'])->first()->toArray();
        //     $value['kelas_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
        // }
        // dd($absensi->toArray());

        $absensi = Absensi::orderby('created_at', 'ASC');

        $content['absensis'] = $absensi->where('status','!=', 'H')->get();
        $content['jadwal'] = $jadwal;
        
        return View::make('absensi.cariabsensi')
                    ->with('content', $content);
    }

    public function data()
    {
        $data = DB::table('absensi')->join('siswa', 'absensi.siswa_id', '=', 'siswa.id')->join('kelas', 'absensi.kelas_id', '=', 'kelas.id')
            ->select(['absensi.date', 'siswa.nis', 'siswa.nama', 'siswa.jkl', 'kelas.nama_kelas', 'absensi.status', 'absensi.description'])->where('status','!=', 'H');

        return Datatables::of($data)->make(true);
    }
}
