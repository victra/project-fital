<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    //public function index()
    //{
        //return view('siswa.insert');
    //}

//guru disini berarti user

    public function checkPassword() {
        // if (Hash::check($request->current_password, Auth::user()->password)){
        $password = DB::table('users')->where('id', '=' ,'Auth::user()->id')->value('password');
         // dd($password);
        // $user = new User;
        //             $user->where('id', '=' ,Auth::user()->id)
        //             ->update(['password' => Hash::make($request->new_password)]);
        // $test = Hash::make('password');
        // dd($test);
        // $data = User::find($id);
        if (Hash::check( Input::get('current_password') , Auth::user()->password) ){

        // if ($password == Hash::check(Input::get('current_password'))){
        // if (Hash::check(Input::get('current')) == $password) {
                
            $isAvailable = TRUE;
          
            echo json_encode(
                    array(
                        'valid' => $isAvailable
                    ));
            
        } else {
            $isAvailable = FALSE;
          
            echo json_encode(
                    array(
                        'valid' => $isAvailable
                    ));
        }
    
    }

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

    public function checkNIPAvailabilityUbah() {

        $users = DB::table('users')->where('id', Input::get('id'))->value('nip');
        // dd($users);

        if ($users == Input::get('nip')){
                
            $isAvailable = TRUE;
          
            echo json_encode(
                    array(
                        'valid' => $isAvailable
                    ));
            
        } else {
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

    public function checkUsernameAvailabilityUbah() {

        $users = DB::table('users')->where('id', Input::get('id'))->value('email');
        // dd($users);

        if ($users == Input::get('username')){
                
            $isAvailable = TRUE;
          
            echo json_encode(
                    array(
                        'valid' => $isAvailable
                    ));
            
        } else {
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
    
    }

    public function storeguru(Request $request)
    {
        if (Auth::user()->role == 'administrator') {
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
            $guru->jadwal = $request->jadwal;
            $guru->save();
            \Session::flash('flash_message','Data user berhasil disimpan.');
            return redirect('user');
            // return back ();
        }
        \Session::flash('flash_message','Data user berhasil disimpan.');
        return redirect('home');
    }

    public function showguru()
    {
        if (Auth::user()->role == 'administrator') {
            $guru = User::orderby('created_at', 'DESC');

            $role = array(
                'administrator' => 'Administrator',
                'guru' => 'Guru',
                'guru piket' => 'Guru Piket',
                // 'karyawan' => 'Karyawan',
                'tamu' => 'Tamu',
                // 'wali kelas' => 'Wali Kelas',
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

            $jadwal = array(
                'Senin' => 'Senin',
                'Selasa' => 'Selasa',
                'Rabu' => 'Rabu',
                'Kamis' => 'Kamis',
                'Jumat' => 'Jumat',
                'Sabtu' => 'Sabtu',
            );
           
            $content['gurupkt'] = $guru->get();
            $content['role'] = $role;
            $content['jenis_kelamin'] = $jenis_kelamin;
            $content['agama'] = $agama;
            $content['jadwal'] = $jadwal;

            return View::make('guru.showguru')
                        ->with('content', $content);
        }
        else{
            return view('errors.404');
        }
    }

    public function data()
    {
        $data = DB::table('users')
            ->select(['id', 'nip', 'name', 'email', 'role' , 'jkl' , 'agama' , 'tlp' , 'jadwal']);

        return Datatables::of($data)
            ->addColumn('action', function ($guru) {
                if (Auth::user()->id != $guru->id) {
                return '<a class="btn btn-success btn-xs" title="Ubah" onclick="showModalGuru(this)" 
                            data-id="'.$guru->id.'"
                            data-nip="'.$guru->nip.'"
                            data-nama="'.$guru->name.'"
                            data-username="'.$guru->email.'"
                            data-role="'.$guru->role.'"
                            data-jenis-kelamin="'.$guru->jkl.'"
                            data-agama="'.$guru->agama.'"
                            data-tlp="'.$guru->tlp.'"
                            data-jadwal="'.$guru->jadwal.'">
                            <span class="fa fa-edit"></span></a>,
                        <a data-href="deletesiswa&'.$guru->id.'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>';
                    }
                else {
                return '<a class="btn btn-success btn-xs" title="Ubah" onclick="showModalGuru(this)" 
                            data-id="'.$guru->id.'"
                            data-nip="'.$guru->nip.'"
                            data-nama="'.$guru->name.'"
                            data-username="'.$guru->email.'"
                            data-role="'.$guru->role.'"
                            data-jenis-kelamin="'.$guru->jkl.'"
                            data-agama="'.$guru->agama.'"
                            data-tlp="'.$guru->tlp.'"
                            data-jadwal="'.$guru->jadwal.'">
                            <span class="fa fa-edit"></span></a>';
                    }
            })
            ->make(true);
    }
    
    public function deleteguru($id)
    {
        DB::table('users')->where('id',$id)->delete();
        \Session::flash('flash_message','Data user berhasil dihapus.');
        return back ();
    }
    
    public function updateguru(Request $request, $id)
    {
        // if ($request->has('password')) {
        // // update dengan password 
        //  $guru = ['nip' => $request->nip
        //         ,'name' => $request->nama
        //         ,'email' => $request->username
        //         // ,'password' => Hash::make($request->password)
        //         ,'role' => $request->role
        //         ,'jkl' => $request->jkl
        //         ,'agama' => $request->agama
        //         ,'tlp'=> $request->tlp];
        //     DB::table('users')->where('nip',$request->nip)->update($guru);     
        // }else{
        //     $guru = ['nip' => $request->nip
        //         ,'name' => $request->nama
        //         ,'email' => $request->username
        //         ,'password' => Hash::make($request->password)
        //         ,'role' => $request->role
        //         ,'jkl' => $request->jkl
        //         ,'agama' => $request->agama
        //         ,'tlp'=> $request->tlp];
        //     DB::table('users')->where('nip',$request->nip)->update($guru);  
        // }
        // Auth()->user()->update($request->only(['email', 'name']));

        // return back()->withSuccess('update.');

        if ($request['password'] == ''){
            $guru = ['id' => $request->id
                ,'nip' => $request->nip
                ,'name' => $request->nama
                ,'email' => $request->username
                // ,'password' => Hash::make($request->password)
                ,'role' => $request->role
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp' => $request->tlp
                ,'jadwal' => $request->jadwal];
            DB::table('users')->where('id',$request->id)->update($guru);
         
        }else{
            $guru = ['id' => $request->id
                ,'nip' => $request->nip
                ,'name' => $request->nama
                ,'email' => $request->username
                ,'password' => Hash::make($request->password)
                ,'role' => $request->role
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp' => $request->tlp
                ,'jadwal' => $request->jadwal];
            DB::table('users')->where('id',$request->id)->update($guru);      
        
        } 
        \Session::flash('flash_message','Data user berhasil diubah.');
        return redirect('user');
        // return back ();      
    }

    public function updateprofil(Request $request, $id)
    {        
        $guru = ['id' => $request->id
                ,'nip' => $request->nip
                ,'name' => $request->nama
                ,'email' => $request->username
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp'=> $request->tlp
                ,'jadwal'=> $request->jadwal];

        DB::table('users')->where('id', $request->id)->update($guru);

        \Session::flash('flash_message','Data profil berhasil diubah.');
        return back ();      
    }

    public function tampilubahpassword(Request $request)
    {

        return View::make('guru.ubahpasswordguru');
    }

    public function ubahpassworduser(Request $request){
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required|same:new_password|min:6',
        ];

        $messages = [
            'current_password.required' => 'Password harus diisi',
            'new_password.required' => 'Password harus diisi',
            // 'new_password.confirmed' => 'Password tidak sama',
            'new_password.min' => 'Password minimal 6 karakter',
            'same:password' => 'Password tidak sama',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()){
            return redirect('ubahpassword')->withErrors($validator);
        } else {
            if (Hash::check($request->current_password, Auth::user()->password)){
                $user = new User;
                $user->where('id', '=' ,Auth::user()->id)
                ->update(['password' => Hash::make($request->new_password)]);
                // return redirect('user')->with('status','Password ya ya');
                \Session::flash('flash_message','Password berhasil diubah.');
                return back ();
            }else{
                
                return redirect('ubahpassword')->with('message','Password yang anda masukkan salah');
            }
        }
    }

    public function ubahpasswordpakaimodal(Request $request){        
        $user = new User;
        $user->where('id', '=' ,Auth::user()->id)
        ->update(['password' => Hash::make($request->new_password)]);
        // return redirect('user')->with('status','Password ya ya');
        \Session::flash('flash_message','Password berhasil diubah.');
        return back ();           
    }

    public function showjadwalpiket()
    {
       
        $guru = User::orderby('created_at', 'DESC')->where('role', 'guru piket');

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

        $jadwal = array(
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu',
        );
       
        $content['gurupkt'] = $guru->get();
        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        $content['jadwal'] = $jadwal;

        if (Auth::user()->role == 'administrator') {
            return View::make('guru.jadwalpiket')
                        ->with('content', $content);
        } else {
            return View::make('guest.guestjadwalpiket')
                        ->with('content', $content);
        }
        
    }

    public function updatepiket(Request $request, $id)
    {
        if ($request['password'] == ''){
            $guru = ['id' => $request->id
                ,'nip' => $request->nip
                ,'name' => $request->nama
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp' => $request->tlp
                ,'jadwal' => $request->jadwal];
            DB::table('users')->where('id',$request->id)->update($guru);
         
        }else{
            $guru = ['id' => $request->id
                ,'nip' => $request->nip
                ,'name' => $request->nama
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp' => $request->tlp
                ,'jadwal' => $request->jadwal];
            DB::table('users')->where('id',$request->id)->update($guru);      
        
        } 
        \Session::flash('flash_message','Data guru piket berhasil diubah.');
        // return redirect('jadwalpiket');
        return back ();      
    }

    public function deletepiket($id)
    {
        DB::table('users')->where('id',$id)->delete();
        \Session::flash('flash_message','Data guru piket berhasil dihapus.');
        return back ();
    }
}