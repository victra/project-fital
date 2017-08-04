@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />   
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Data Guru Piket
@endsection

@section('contentheader_title')
    Data Guru Piket
@endsection

@section('contentheader_description')
    Olah Data Guru Piket
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Guru Piket</h3>
        <!-- <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#ModalTambahGuru"> <i class="fa fa-plus"></i> Tambah User</a> -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablegurupiket" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablegurupiket_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>Hari</center></th>
                    <th><center>NIP/NIK</center></th>
                    <th><center>Nama Guru Piket</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Agama</center></th>
                    <th><center>Telepon</center></th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
                              
        </table>                
                
    </div><!-- /.box-body -->
</div>
@endsection

@section('modals')
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade modal-danger" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
            </div>
            <div class="modal-body">
                Apa anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-ok">Hapus</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->

<!-- Modal Form Ubah Data Guru Piket -->
<div class="modal fade" id="ModalUbahPiket" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Guru Piket</h4>
            </div>
            <form class="form-horizontal" method="post" action="updateguru" id="UbahPiket">          
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
                    <div>
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
                    </div>
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-Jenis Kelamin-</option>
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Agama-</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
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
<!-- Modal Form Ubah Data Guru Piket -->

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
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Agama-</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
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
<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var t=$("#tablegurupiket").DataTable({scrollY:400,scrollCollapse:!0,processing:!0,serverSide:!0,ajax:"{{ route('user.datapiket') }}",fnCreatedRow:function(a,e,s){var r=s+1+t.page.info().start;$("td",a).eq(0).html(r)},columns:[{data:null,sWidth:"5%",orderable:!1,searchable:!1,className:"text-center"},{data:"jadwal",name:"jadwal",sWidth:"7%",orderable:!1,searchable:!1,className:"text-center"},{data:"nip",name:"nip",sWidth:"19%",searchable:!1,className:"text-center"},{data:"name",name:"name",sWidth:"25%"},{data:"jkl",name:"jkl",sWidth:"13%",orderable:!1,searchable:!1,className:"text-center"},{data:"agama",name:"agama",sWidth:"9%",orderable:!1,searchable:!1,className:"text-center"},{data:"tlp",name:"tlp",sWidth:"13%",orderable:!1,searchable:!1,className:"text-center"},{data:"action",name:"action",sWidth:"9%",orderable:!1,searchable:!1,className:"text-center"}],order:[[2,"asc"]],responsive:!0,bAutoWidth:!1,aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Guru Piket",sUrl:"",sZeroRecords:"Data tidak ditemukan"}});t.on("order.dt search.dt",function(){t.column(0,{search:"applied",order:"applied"}).nodes().each(function(a,e){a.innerHTML=e+1})}).draw();
</script>

<!-- VALIDASI FORM UBAH GURU PIKET -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalUbahPiket").modal("hide");$("#UbahPiket").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nip:{validators:{notEmpty:{message:"NIP harus diisi"},stringLength:{max:25,message:"NIP maksimal 25 karakter"},remote:{url:"{{ URL::to('/checkNIPUbah') }}",data:function(a){return{nis:a.getFieldElements("nip").val(),id:a.getFieldElements("id").val()}},message:"NIP sudah ada"}}},nama:{validators:{notEmpty:{message:"Nama harus diisi"},stringLength:{max:50,message:"Nama maksimal 50 karakter"}}},jadwal:{validators:{notEmpty:{message:"Jadwal harus diisi"}}},jkl:{enabled:!1,validators:{notEmpty:{message:"Jenis kelamin harus diisi"}}},agama:{enabled:!1,validators:{notEmpty:{message:"Agama harus diisi"}}},tlp:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}}}}).on("keyup",'[name="jkl"]',function(){var a=""==$(this).val();$("#UbahPiket").bootstrapValidator("enableFieldValidators","jkl",!a),1==$(this).val().length&&$("#UbahPiket").bootstrapValidator("validateField","jkl")}).on("keyup",'[name="agama"]',function(){var a=""==$(this).val();$("#UbahPiket").bootstrapValidator("enableFieldValidators","agama",!a),1==$(this).val().length&&$("#UbahPiket").bootstrapValidator("validateField","agama")}).on("keyup",'[name="tlp"]',function(){var a=""==$(this).val();$("#UbahPiket").bootstrapValidator("enableFieldValidators","tlp",!a),1==$(this).val().length&&$("#UbahPiket").bootstrapValidator("validateField","tlp")})});
</script>
<!-- VALIDASI FORM UBAH GURU PIKET -->
@endsection