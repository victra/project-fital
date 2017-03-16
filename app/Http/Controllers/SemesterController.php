<?php 
namespace App\Http\Controllers;
use Model\Semester;
use App\User;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class SemesterController extends Controller
{
    public function showsemester()
    {
        $semester = Semester::orderby('id', 'ASC');
       
        $content['semesters'] = $semester->get();
        return View::make('semester.showsemester')
                    ->with('content', $content);
    }

    public function updatesemester(Request $request, $id)
    {        
        $semester = ['id' => $request->id
                ,'semester' => $request->nama_semester
                ,'tgl_awal' => $request->tgl_awal
                ,'tgl_akhir' => $request->tgl_akhir];
        DB::table('semester')->where('id',$request->id)->update($semester);
        //return redirect('show');
        \Session::flash('flash_message','Data semester berhasil diubah.');
        return back ();        
    }
}