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
        $kelas->kd = $request->kd;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->jurusan = $request->jurusan;
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

        $jurusan = array(
            'Akutansi' => 'Akutansi',
            'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak',
            'Farmasi' => 'Farmasi',
        );

        $walikelas = User::get();

        // $wali_kelas = array(
        //     '1' => 'Adin',
        //     '2' => 'Budi',
        //     '3' => 'Vei',
        // );
        // $kelas = array(
        //     'X AK 1' => 'X AK 1',
        //     'X AK 2' => 'X AK 2',
        //     'X AK 3' => 'X AK 3',
        //     'X FARMASI' => 'X FARMASI',
        //     'X RPL 1' => 'X RPL 1',
        //     'X RPL 2' => 'X RPL 2',
        //     'XI AK 1' => 'XI AK 1',
        //     'XI AK 2' => 'XI AK 2',
        //     'XI FARMASI' => 'XI FARMASI',
        //     'XI RPL 1' => 'XI RPL 1',
        //     'XI RPL 2' => 'XI RPL 2',
        //     'XII AK 1' => 'XII AK 1',
        //     'XII AK 2' => 'XII AK 2',
        //     'XII FARMASI' => 'XII FARMASI',
        //     'XII RPL 1' => 'XII RPL 1',
        //     'XII RPL 2' => 'XII RPL 2',
        // );
       
        $content['kelasku'] = $kelas->get();
        $content['jurusan'] = $jurusan;
        $content['walikelas'] = $walikelas;
        return View::make('kelas.showkelas')
                    ->with('content', $content);
    }
    
    public function deletekelas($kd)
    {
        DB::table('kelas')->where('kd',$kd)->delete();
        \Session::flash('flash_message','Data kelas berhasil dihapus.');
        return back ();
    }

    public function updatekelas(Request $request, $kd)
    {
        
        $kelas = ['kd' => $request->kd
                ,'nama_kelas' => $request->nama_kelas
                ,'jurusan' => $request->jurusan
                ,'wali_kelas_id' => $request->wali_kelas];
        DB::table('kelas')->where('kd',$request->kd)->update($kelas);
        //return redirect('show');
        \Session::flash('flash_message','Data kelas berhasil diubah.');
        return back ();        
    }
}