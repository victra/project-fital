<?php 
namespace App\Http\Controllers;

use App\siswa;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
    	return view('siswa.insert');
    }

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
    public function delete($nis)
    {
    	DB::table('siswa')->where('nis',$nis)->delete();
    	return back ();
    }

    public function edita($nis)
    {
    	$siswa = DB::table('siswa')->where('nis',$nis)->first();
    	return view('siswa.edit', ['item' => $siswa]);        
    }

    public function updatea(Request $request, $nis)
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
