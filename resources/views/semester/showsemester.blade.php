@extends('layouts.app')

@section('htmlheader_title')
    Data Semester
@endsection

@section('contentheader_title')
    Data Semester
@endsection

@section('contentheader_description')
    Olah Data Semester
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Semester</h3>            
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablesemester" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablesemester_info">

            <thead>
                <tr>
                    <th class="no"><center>No</center></th>
                    <th><center>Nama Semester</center></th>
                    <th><center>Tanggal Awal</center></th>
                    <th><center>Tanggal Akhir</center></th>
                    <th class="no-export"><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['semesters'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{$item->semester}}</center></td>                    
                    <td><center>{{$item->tgl_awal}}</center></td>
                    <td><center>{{$item->tgl_akhir}}</center></td> 
                    <td>
                        <center>                                    
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalSemester(this)" 
                            data-id="{{$item->id}}"
                            data-nama-semester="{{$item->semester}}"
                            data-tgl-awal="{{$item->tgl_awal}}"
                            data-tgl-akhir="{{$item->tgl_akhir}}">
                            <span class="fa fa-edit"></span></a>
                    </td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->
</div>
@endsection

@section('modals')
<!-- Modal Form Ubah Data Semester-->
<div class="modal fade" id="ModalUbahSemester" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Semester</h4>
            </div>
            <form class="form-horizontal" method="post" action="storekelas" id="UbahSemester">          
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Semester</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" readonly="" name="nama_semester" class="form-control" placeholder="Nama Semester">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Tanggal Awal</label>
                    <div class="form-group">
                        <div class="col-sm-4" >
                            <input id="datetimePicker" type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal">
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Tanggal Akhir</label>
                    <div class="form-group">
                        <div class="col-sm-4" >
                            <input id="datetimePicker1" type="text" name="tgl_akhir" class="form-control" placeholder="Tanggal Akhir">
                        </div>
                    </div>

                    <!-- <label class="control-label col-sm-4">Tanggal Awal</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tgl_awal" class="form-control" placeholder="Tanggal Awal">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Tanggal Akhir</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tgl_akhir" class="form-control" placeholder="Tanggal Akhir">
                        </div>  
                    </div> -->                        
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Ubah Data Kelas -->

<!-- Modal Ubah Password -->
<div class="modal fade" id="ModalUbahPassword" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form class="form-horizontal" method="post" action="ubahpasswordpakaimodal" id="UbahPassword">
                <div class="modal-body">
                    <label class="control-label col-sm-4">Password Lama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="current_password" class="form-control" placeholder="Password Lama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Password Baru</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="new_password" class="form-control" placeholder="Password Baru">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Password Konfirmasi</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Konfirmasi">
                        </div>  
                    </div>                                      
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" value="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Ubah Password -->
@endsection