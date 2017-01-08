<?php namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class GuruController extends Controller
{
    //public function index()
    //{
        //return view('siswa.insert');
    //}
    
    public function storeguru(Request $request)
    {
        $guru = new Guru;
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->username = $request->username;
        $guru->password = Hash::make($request->password);
        $guru->role = $request->role;
        $guru->jkl = $request->jkl;
        $guru->agama = $request->agama;
        $guru->tlp = $request->tlp;
        $guru->save();
        return redirect('guru_piket');
    }
    public function showguru()
    {
        $guru = Guru::orderby('created_at', 'DESC');

        //$input_kelas = '';
        //if(Input::has('search_kelas')){
           // $siswa = $siswa->where('kelas', Input::get('search_kelas'));
           // $input_kelas = Input::get('search_kelas');
        //}
        $role = array(
            'Admin' => 'Admin',
            'Guru Piket' => 'Guru Piket',
        );
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
       
        $content['gurupkt'] = $guru->get();
        $content['role'] = $role;
        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        //$content['input_kelas'] = $input_kelas;
        return View::make('guru.showguru')
                    ->with('content', $content);
    }
    
    public function deleteguru($nip)
    {
        DB::table('guru')->where('nip',$nip)->delete();
        return back ();
    }

    
    public function updateguru(Request $request, $nip)
    {
        
        $guru = ['nip' => $request->nip
                ,'nama' => $request->nama
                ,'username' => $request->username
                ,'password' => $request->password
                ,'role' => $request->role
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp'=> $request->tlp];
        DB::table('guru')->where('nip',$request->nip)->update($guru);
        return redirect('guru_piket');        
    }
}