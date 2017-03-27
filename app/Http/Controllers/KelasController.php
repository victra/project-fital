<?php 
namespace App\Http\Controllers;
use Model\Siswa;
use Model\Kelas;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function index()
    {
        return view('siswa.insert');
    }
    
    public function checkKelasAvailability() {

    $kelas = DB::table('kelas')->where('nama_kelas', Input::get('nama_kelas'))->count();

    if($kelas > 0) {
        $isAvailable = FALSE;
    } else {
        $isAvailable = TRUE;
    }

    echo json_encode(
            array(
                'valid' => $isAvailable
            ));
    }

    public function checkKelasAvailabilityUbah() {

    $kelas = DB::table('kelas')->where('id', Input::get('id'))->value('nama_kelas');
    // dd($users);

        if ($kelas == Input::get('nama_kelas')){
                
            $isAvailable = TRUE;
          
            echo json_encode(
                    array(
                        'valid' => $isAvailable
                    ));
            
        } else {
            $kelas = DB::table('kelas')->where('nama_kelas', Input::get('nama_kelas'))->count();

            if($kelas > 0) {
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

    public function storekelas(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->thn_ajaran = $request->thn_ajaran;
        $kelas->wali_kelas_id = $request->wali_kelas;
        $kelas->save();
        //return redirect('show');
        \Session::flash('flash_message','Data kelas berhasil disimpan.');
        return back ();
    }
    public function showkelas()
    {
        $kelas = Kelas::orderby('created_at', 'DESC')->get();

        // jumlah siswa laki-laki
        for ($i=0; $i < count($kelas); $i++) { 
            $kelas[$i]['jumlahlaki'] = Siswa::where('kelas_id', $kelas[$i]['id'])->where('jkl','Laki-laki')->get()->count();
        }
        // jumlah siswa perempuan
        for ($i=0; $i < count($kelas); $i++) { 
            $kelas[$i]['jumlahperempuan'] = Siswa::where('kelas_id', $kelas[$i]['id'])->where('jkl','Perempuan')->get()->count();
        }
        // total siswa
        for ($i=0; $i < count($kelas); $i++) { 
            $kelas[$i]['jumlah'] = Siswa::where('kelas_id', $kelas[$i]['id'])->get()->count();
        }

        // dd($kelas->toArray());
        // dd($kelas->get()->toArray());

        // relasi manual
        // $kelas = Kelas::orderby('created_at', 'DESC')->get();
        // foreach ($kelas as $value) {
        //     $value['wali_kelas_manual'] = User::where('id', $value['wali_kelas_id'])->first()->toArray();
        // }
        // dd($kelas->toArray());

        $jurusan = array(
            'Akutansi' => 'Akutansi',
            'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak',
            'Farmasi' => 'Farmasi',
        );

        $walikelas = User::get();
       
        $content['kelasku'] = $kelas;
        $content['jurusan'] = $jurusan;
        $content['walikelas'] = $walikelas;
        
        if (Auth::user()->role == 'administrator' or Auth::user()->role == 'guru piket') {
            return View::make('kelas.showkelas')
                        ->with('content', $content);
        } else {
            return View::make('guest.guestkelas')
                        ->with('content', $content);
        }
    }
    
    public function deletekelas($id)
    {
        DB::table('kelas')->where('id',$id)->delete();
        \Session::flash('flash_message','Data kelas berhasil dihapus.');
        return back ();
    }

    public function updatekelas(Request $request, $id)
    {
        
        $kelas = ['id' => $request->id
                ,'nama_kelas' => $request->nama_kelas
                ,'jurusan' => $request->jurusan
                ,'thn_ajaran' => $request->thn_ajaran
                ,'wali_kelas_id' => $request->wali_kelas];
        DB::table('kelas')->where('id',$request->id)->update($kelas);
        //return redirect('show');
        \Session::flash('flash_message','Data kelas berhasil diubah.');
        return back ();        
    }
}