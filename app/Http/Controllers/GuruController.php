<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    //public function index()
    //{
        //return view('siswa.insert');
    //}

//guru disini berarti user

    public function checkNIPAvailability() {

    $user = DB::table('users')->where('nip', Input::get('nip'))->count();

    if($user > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }

    echo json_encode(
            array(
                'valid' => $isAvailable
            ));
    }

    public function checkUsernameAvailability() {

    $user = DB::table('users')->where('email', Input::get('username'))->count();

    if($user > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }

    echo json_encode(
            array(
                'valid' => $isAvailable
            ));
    }

    public function storeguru(Request $request)
    {
        if (Auth::user()->role = 'administrator') {
            $guru = new User;
            $guru->nip = $request->nip;
            $guru->name = $request->nama;
            //email pada table user bisa diisi username
            $guru->email = $request->username;
            $guru->password = Hash::make($request->password);
            $guru->role = $request->role;
            $guru->jkl = $request->jkl;
            $guru->agama = $request->agama;
            $guru->tlp = $request->tlp;
            $guru->save();
            \Session::flash('flash_message','Data user berhasil disimpan.');
            return redirect('guru_piket');
        }
        \Session::flash('flash_message','Data user berhasil disimpan.');
        return redirect('home');
    }
    public function showguru()
    {
        $guru = User::orderby('created_at', 'DESC');

        //$input_kelas = '';
        //if(Input::has('search_kelas')){
           // $siswa = $siswa->where('kelas', Input::get('search_kelas'));
           // $input_kelas = Input::get('search_kelas');
        //}
        $role = array(
            'administrator' => 'Administrator',
            'guru piket' => 'Guru Piket',
        );
        $jenis_kelamin = array(
            'Laki-laki' => 'Laki-laki',
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
        DB::table('users')->where('nip',$nip)->delete();
        \Session::flash('flash_message','Data user berhasil dihapus.');
        return back ();
    }

    
    public function updateguru(Request $request, $nip)
    {
        
        $guru = ['nip' => $request->nip
                ,'name' => $request->nama
                ,'email' => $request->username
                ,'password' => Hash::make($request->password)
                ,'role' => $request->role
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp'=> $request->tlp];
        DB::table('users')->where('nip',$request->nip)->update($guru);
        \Session::flash('flash_message','Data user berhasil diubah.');
        return redirect('guru_piket');        
    }

    public function ubahpassword()
    {
        return View::make('guru.ubahpasswordguru');
    }
}