<?php 
namespace App\Http\Controllers;
use Model\Siswa;
use Model\Kelas;
use App\User;
use Illuminate\Http\Request;
use Datatables;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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

    public function checkNISAvailabilityUbah() {

        $nis = DB::table('siswa')->where('id', Input::get('id'))->value('nis');

        if ($nis == Input::get('nis')){
                
            $isAvailable = TRUE;
          
            echo json_encode(
                    array(
                        'valid' => $isAvailable
                    ));
            
        } else {
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
    
    }

    public function storesiswa(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jkl = $request->jkl;
        $siswa->agama = $request->agama;
        $siswa->kelas_id = $request->kelas;
        $siswa->tlp_siswa = $request->tlp_siswa;
        $siswa->alamat_siswa = $request->alamat_siswa;
        $siswa->nama_ayah = $request->nama_ayah;
        $siswa->nama_ibu = $request->nama_ibu;
        $siswa->tlp_ortu = $request->tlp_ortu;
        $siswa->alamat_ortu = $request->alamat_ortu;
        $siswa->save();
        //return redirect('show');
        \Session::flash('flash_message','Data siswa berhasil disimpan.');
        return back ();
    }
    
    public function showsiswa()
    {
        $siswa = Siswa::orderby('created_at', 'DESC');
        // dd($siswa->get()->toArray());

        // relasi manual
        // $siswa = Siswa::orderby('created_at', 'DESC')->get();
        // foreach ($siswa as $value) {
        //     $value['kelas_pakek_cara_manual'] = Kelas::where('id', $value['kelas_id'])->first()->toArray();
        // }
        // dd($siswa->toArray());

        $input_kelas = '';
        if(Input::has('search_kelas')){
            $siswa = $siswa->where('kelas_id', Input::get('search_kelas'));
            $input_kelas = Input::get('search_kelas');
        }

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

        $jadwal = array(
            'Senin' => 'Senin',
            'Selasa' => 'Selasa',
            'Rabu' => 'Rabu',
            'Kamis' => 'Kamis',
            'Jumat' => 'Jumat',
            'Sabtu' => 'Sabtu',
        );

        $kelas = Kelas::orderby('nama_kelas', 'ASC')->get();
       
        $content['siswas'] = $siswa->get();
        $content['jenis_kelamin'] = $jenis_kelamin;
        $content['agama'] = $agama;
        $content['kelas'] = $kelas;
        $content['input_kelas'] = $input_kelas;
        $content['jadwal'] = $jadwal;

        return View::make('siswa.showsiswa')
                    ->with('content', $content);
    }

    public function data()
    {
        $data = DB::table('siswa')
            ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
            ->select(['siswa.id', 'siswa.nis', 'siswa.nama', 'siswa.jkl', 'siswa.agama' , 'kelas.nama_kelas' , 'siswa.tlp_siswa' , 'siswa.alamat_siswa' , 'siswa.nama_ayah' , 'siswa.nama_ibu' , 'siswa.tlp_ortu' , 'siswa.alamat_ortu' , 'siswa.kelas_id']);

        return Datatables::of($data)
            ->addColumn('action', function ($siswa) {
                if (Auth::user()->role == 'guru piket' or Auth::user()->role == 'administrator') {
                return '<a class="btn btn-info btn-xs" title="Info" onclick="showModalInfoSiswa(this)" 
                            data-id="'.$siswa->id.'"
                            data-nis="'.$siswa->nis.'"
                            data-nama="'.$siswa->nama.'"
                            data-jenis-kelamin="'.$siswa->jkl.'"
                            data-agama="'.$siswa->agama.'"
                            data-kelas="'.$siswa->nama_kelas.'"
                            data-tlp-siswa="'.$siswa->tlp_siswa.'"
                            data-alamat-siswa="'.$siswa->alamat_siswa.'"
                            data-nama-ayah="'.$siswa->nama_ayah.'"
                            data-nama-ibu="'.$siswa->nama_ibu.'"
                            data-tlp-ortu="'.$siswa->tlp_ortu.'"
                            data-alamat-ortu="'.$siswa->alamat_ortu.'">
                            <span class="fa fa-eye"></span></a>,
                        <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalSiswa(this)" 
                            data-id="'.$siswa->id.'"
                            data-nis="'.$siswa->nis.'"
                            data-nama="'.$siswa->nama.'"
                            data-jenis-kelamin="'.$siswa->jkl.'"
                            data-agama="'.$siswa->agama.'"
                            data-kelas="'.$siswa->kelas_id.'"
                            data-tlp-siswa="'.$siswa->tlp_siswa.'"
                            data-alamat-siswa="'.$siswa->alamat_siswa.'"
                            data-nama-ayah="'.$siswa->nama_ayah.'"
                            data-nama-ibu="'.$siswa->nama_ibu.'"
                            data-tlp-ortu="'.$siswa->tlp_ortu.'"
                            data-alamat-ortu="'.$siswa->alamat_ortu.'">
                            <span class="fa fa-edit"></span></a>,
                        <a data-href="deletesiswa&'.$siswa->id.'" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>';
                    }
                else {
                return '<a class="btn btn-info btn-xs" title="Info" onclick="showModalInfoSiswa(this)" 
                            data-id="'.$siswa->id.'"
                            data-nis="'.$siswa->nis.'"
                            data-nama="'.$siswa->nama.'"
                            data-jenis-kelamin="'.$siswa->jkl.'"
                            data-agama="'.$siswa->agama.'"
                            data-kelas="'.$siswa->nama_kelas.'"
                            data-tlp-siswa="'.$siswa->tlp_siswa.'"
                            data-alamat-siswa="'.$siswa->alamat_siswa.'"
                            data-nama-ayah="'.$siswa->nama_ayah.'"
                            data-nama-ibu="'.$siswa->nama_ibu.'"
                            data-tlp-ortu="'.$siswa->tlp_ortu.'"
                            data-alamat-ortu="'.$siswa->alamat_ortu.'">
                            <span class="fa fa-eye"></span></a>';
                    }
            })
            ->make(true);
    }
    
    public function deletesiswa($id)
    {
        DB::table('siswa')->where('id',$id)->delete();
        \Session::flash('flash_message','Data siswa berhasil dihapus.');
        return back ();
    }

    public function updatesiswa(Request $request, $id)
    {       
        $siswa = ['id' => $request->id
                ,'nis' => $request->nis
                ,'nama' => $request->nama
                ,'jkl' => $request->jkl
                ,'agama' => $request->agama
                ,'kelas_id' => $request->kelas
                ,'tlp_siswa' => $request->tlp_siswa
                ,'alamat_siswa' => $request->alamat_siswa
                ,'nama_ayah' => $request->nama_ayah
                ,'nama_ibu' => $request->nama_ibu
                ,'tlp_ortu' => $request->tlp_ortu
                ,'alamat_ortu' => $request->alamat_ortu];
                
        $absensi = ['kelas_id' => $request->kelas];

        DB::table('siswa')->where('id',$request->id)->update($siswa);
        DB::table('absensi')->where('siswa_id',$request->id)->update($absensi);
        
        //return redirect('show');
        \Session::flash('flash_message','Data siswa berhasil diubah.');
        return back ();        
    }
}