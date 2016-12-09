<?php 
namespace App\Http\Controllers;

use App\siswa;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SiswaController extends Controller
{
    //public function index()
    //{
    	//return view('siswa.insert');
    //}

    public function store(Request $request)
    {
    	$siswa = new siswa;
    	$siswa->nis = $request->nis;
    	$siswa->nama = $request->nama;
    	$siswa->jkl = $request->jkl;
    	$siswa->agama = $request->agama;
    	$siswa->kelas = $request->kelas;
    	$siswa->save();
    	return redirect('show');
    }

    public function show()
    {
    	$siswa = siswa::paginate(10);
    	return view('siswa.show', ['siswax' => $siswa]);
    }    
    public function deletesiswa($nis)
    {
    	DB::table('siswa')->where('nis',$nis)->delete();
    	return back ();
    }

    public function editsiswa($nis)
    {
    	$siswa = DB::table('siswa')->where('nis',$nis)->first();

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

        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        $content['kelas'] = $kelas;
        $content['siswa'] = $siswa;

    	return View::make('siswa.edit')
                    ->with('content', $content);
    }

    public function updatesiswa(Request $request, $nis)
    {
    	
    	$siswa = ['nis' => $request->nis
    			,'nama' => $request->nama
    			,'jkl' => $request->jkl
    			,'agama' => $request->agama
    			,'kelas'=> $request->kelas];
    	DB::table('siswa')->where('nis',$request->nis)->update($siswa);
    	return redirect('show');        
    }
}
