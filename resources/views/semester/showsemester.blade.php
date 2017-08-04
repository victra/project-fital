@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />   
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet" type="text/css" />
@endsection

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
                    <th class="semester"><center>Nama Semester</center></th>
                    <th class="tgl_awal"><center>Tanggal Awal</center></th>
                    <th class="tgl_akhir"><center>Tanggal Akhir</center></th>
                    <th class="action"><center>Action</center></th>
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
<!-- Modal Form Ubah Data Semester -->
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
                    <label class="control-label col-sm-5">Nama Semester</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" readonly="" name="nama_semester" class="form-control" placeholder="Nama Semester">
                        </div>  
                    </div>
                    <label class="control-label col-sm-5">Tanggal Awal</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <div class="input-group date" id="datetimePicker2">
                                <input type="text" name="tgl_awal" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>
                    <label class="control-label col-sm-5">Tanggal Akhir</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <div class="input-group date" id="datetimePicker3">
                                <input type="text" name="tgl_akhir" class="form-control" placeholder="YYYY-MM-DD">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>                       
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
<!-- Modal Form Ubah Data Semester -->

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

<!-- Modal Form Ubah Profil-->
<div class="modal fade" id="ModalUbahProfil" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Profil</h4>
            </div>
            <form class="form-horizontal" method="post" action="updateprofil" id="UbahProfil">          
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">NIP/NIK</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nip" class="form-control" placeholder="NIP/NIK">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Username</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <!-- <input type="text" name="username" class="form-control" placeholder="Username" readonly data-bv-excluded="true"> -->
                        </div>  
                    </div>
                    @if (Auth::user()->role == 'guru piket')
                        <label class="control-label col-sm-4">Jadwal Piket</label>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <select class="form-control" name="jadwal">
                                    <option value="">-Jadwal Piket-</option>
                                    @foreach($content['jadwal'] as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-Jenis Kelamin-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Agama-</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>                                                  
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Telepon</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tlp" class="form-control" placeholder="Telepon">
                        </div>  
                    </div>                  
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
<!-- Modal Form Ubah Profil-->
@endsection

@section('scripts-tambahan')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $("#tablesemester").dataTable({bPaginate:!1,bLengthChange:!0,bFilter:!1,bSort:!0,bInfo:!1,responsive:!0,bAutoWidth:!1,aoColumns:[{sWidth:"5%"},{sWidth:"40%"},{sWidth:"25%"},{sWidth:"25%"},{sWidth:"5%"}],aoColumnDefs:[{bSortable:!1,aTargets:["no","tgl_awal","tgl_akhir","action"]}],order:[[1,"asc"]]});
</script>

<!-- VALIDASI FORM UBAH SEMESTER -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalUbahSemester").modal("hide"),$("#UbahSemester").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{tgl_awal:{trigger:"change keyup",validators:{notEmpty:{message:"Tanggal awal harus diisi"},date:{format:"YYYY-MM-DD",message:"Tanggal awal tidak valid"}}},tgl_akhir:{trigger:"change keyup",validators:{notEmpty:{message:"Tanggal akhir harus diisi"},date:{format:"YYYY-MM-DD",message:"Tanggal akhir tidak valid"}}}}})});
</script>
<!-- VALIDASI FORM UBAH SEMESTER -->
@endsection