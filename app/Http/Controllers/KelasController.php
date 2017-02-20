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

class KelasController extends Controller
{
    public function index()
    {
        return view('siswa.insert');
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
        $kelas = Kelas::orderby('created_at', 'DESC');
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
       
        $content['kelasku'] = $kelas->get();
        $content['jurusan'] = $jurusan;
        $content['walikelas'] = $walikelas;
        return View::make('kelas.showkelas')
                    ->with('content', $content);
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