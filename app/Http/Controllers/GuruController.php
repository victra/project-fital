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

    // public function checkUsernameAvailability() {

    // $user = DB::table('users')->where('email', Input::get('username'))->count();

    // if($user > 0) {
    //     $isAvailable = FALSE;
    // } else {
    //     $isAvailable = TRUE;
    // }

    // echo json_encode(
    //         array(
    //             'valid' => $isAvailable
    //         ));
    // }

    public function checkUsernameAvailability() {

    $users = DB::table('users')->where('nip', Input::get('nip'))->get();
    // dd($users);
    if ($users->email == Input::get('username')){
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
            // 'Hindu' => 'Hindu',
            // 'Budha' => 'Budha',
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
            $guru = ['nip' => $request->nip
                ,'name' => $request->nama
                ,'email' => $request->username
                // ,'password' => Hash::make($request->password)
                ,'role' => $request->role
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp'=> $request->tlp];
            DB::table('users')->where('nip',$request->nip)->update($guru);
         
        }else{
            $guru = ['nip' => $request->nip
                ,'name' => $request->nama
                ,'email' => $request->username
                ,'password' => Hash::make($request->password)
                ,'role' => $request->role
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'tlp'=> $request->tlp];
            DB::table('users')->where('nip',$request->nip)->update($guru);      
        
        } 
        return redirect('guru_piket');      
    }

    public function tampilubahpassword(Request $request)
    {

        return View::make('guru.ubahpasswordguru');
    }

    public function ubahpassword(Request $request)
    {
        $user = Auth::user();

        $current_password = $request->input('current_password');

        $new_password = $request->input('new_password');

        if (Hash::check($current_password, $user->password)) {

            $user->fill([

                    // This should be $request->password, not `$request->newPassword`

                    'new_password' => Hash::make($request->newPassword)

                ])->save();

        } else {
            return ('Please enter the correct password');
        }

        return back();
    }

    // public function admin_credential_rules(array $data)
    // {
    //   $messages = [
    //     'current-password.required' => 'Please enter current password',
    //     'password.required' => 'Please enter password',
    //   ];

    //   $validator = Validator::make($data, [
    //     'current-password' => 'required',
    //     'password' => 'required|same:password',
    //     'password_confirmation' => 'required|same:password',     
    //   ], $messages);

    //   return $validator;
    // }

    // public function postCredentials(Request $request)
    // {
    //   if(Auth::Check())
    //   {
    //     $request_data = $request->All();
    //     $validator = $this->admin_credential_rules($request_data);
    //     if($validator->fails())
    //     {
    //       return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
    //     }
    //     else
    //     {  
    //       $current_password = Auth::User()->password;           
    //       if(Hash::check($request_data['current_password'], $current_password))
    //       {           
    //         $user_id = Auth::User()->id;                       
    //         $obj_user = User::find($user_id);
    //         $obj_user->password = Hash::make($request_data['password']);;
    //         $obj_user->save(); 
    //         return "ok";
    //       }
    //       else
    //       {           
    //         $error = array('current_password' => 'Please enter correct current password');
    //         return response()->json(array('error' => $error), 400);   
    //       }
    //     }        
    //   }
    //   else
    //   {
    //     return redirect()->to('/');
    //   }
    //   return back();    
    // }

    public function ubahpasswordku(Request $request) {

        $user = Auth::user();

        $password = $this->$request->only([
            'current_password', 'new_password', 'password_confirmation'
        ]);

        $validator = Validator::make($password, [
            'current_password' => 'required|current_password_match',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        if ( $validator->fails() )
            return back()
                ->withErrors($validator)
                ->withInput();


        $updated = $user->update([ 'password' => Hash::make($password['new_password']) ]);

        if($updated)
            return back()->with('success', 1);

        return back()->with('success', 0);
    }
}