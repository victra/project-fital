<?php 
namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class SiswaController extends Controller
{
    //public function index()
    //{
        //return view('siswa.insert');
    //}
    public function checkNISAvailability() {

    $nis = DB::table('siswa')->where('nis', Input::get('nis'))->count();
        if($nis > 0) {
            $isAvailable = FALSE;
        } else {
            $isAvailable = TRUE;
        }

        echo json_encode(
            array(
                'valid' => $isAvailable
        ));
    }

    public function storesiswa(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jkl = $request->jkl;
        $siswa->agama = $request->agama;
        $siswa->kelas = $request->kelas;
        $siswa->save();
        //return redirect('show');
        return back ();
    }
    public function showsiswa()
    {
        $siswa = Siswa::orderby('created_at', 'DESC');

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $siswa = $siswa->where('kelas', Input::get('search_kelas'));
            $input_kelas = Input::get('search_kelas');
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
       
        $content['siswas'] = $siswa->get();
        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        return View::make('siswa.showsiswa')
                    ->with('content', $content);
    }
    
    public function deletesiswa($nis)
    {
        DB::table('siswa')->where('nis',$nis)->delete();
        return back ();
    }

    public function updatesiswa(Request $request, $nis)
    {
        
        $siswa = ['nis' => $request->nis
                ,'nama' => $request->nama
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'kelas'=> $request->kelas];
        DB::table('siswa')->where('nis',$request->nis)->update($siswa);
        //return redirect('show');
        return back ();        
    }
}