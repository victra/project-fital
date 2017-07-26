@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />   
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Data User
@endsection

@section('contentheader_title')
    Data User
@endsection

@section('contentheader_description')
    Olah Data User
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data User</h3>
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#ModalTambahGuru"> <i class="fa fa-plus"></i> Tambah User</a>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tableuser" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tableuser_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th class="no"><center>No</center></th>
                    <th class="nip"><center>NIP/NIK</center></th>
                    <th><center>Nama User</center></th>
                    <th class="none">Username</th>
                    <th class="role"><center>Role</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="agama"><center>Agama</center></th>
                    <th class="none">Telepon</th>
                    <th class="action"><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['gurupkt'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{$item->nip}}</center></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><center>{{$item->role}}</center></td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->agama}}</center></td>
                    <td>{{$item->tlp}}</td>  
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->id}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalGuru(this)" 
                            data-id="{{$item->id}}"
                            data-nip="{{$item->nip}}"
                            data-nama="{{$item->name}}"
                            data-username="{{$item->email}}"                            
                            data-role="{{$item->role}}"
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-tlp="{{$item->tlp}}"
                            data-jadwal="{{$item->jadwal}}">
                            <!-- data-password="{{$item->password}}" -->
                            
                            <span class="fa fa-edit"></span></a>
                            <!-- <a onclick="return confirm('Are you sure?')" href="deleteguru&{{$item->id}}" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a> -->
                            @if (Auth::user()->id != $item->id)
                            <a data-href="deleteguru&{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>
                            @endif
                        </center>
                    </td>
                </tr>                                    
                @endforeach
            </tbody>                               
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

<!-- Modal Form Tambah Data Guru-->
<div class="modal fade" id="ModalTambahGuru" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data User</h4>
            </div>
            <form class="form-horizontal" method="post" action="storeguru" id="TambahGuru">          
                <div class="modal-body">
                    <label class="control-label col-sm-4">NIP/NIK</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP/NIK">
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
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Password</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Role</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select id="role" class="form-control" name="role">
                                <option value="">-Role-</option>
                                @foreach($content['role'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="hidden_div" style="display: none;">
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
<!-- Modal Form Tambah Data Guru -->

<!-- Modal Form Ubah Data Guru-->
<div class="modal fade" id="ModalUbahGuru" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data User</h4>
            </div>
            <form class="form-horizontal" method="post" action="updateguru" id="UbahGuru">          
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
                    <label class="control-label col-sm-4">Password</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" placeholder="Biarkan jika tidak diubah.">
                        </div>
                        <!-- <span class="help-inline col-sm-4"> <i class="fa fa-info-circle"></i> Biarkan jika tidak diubah </span> -->  
                    </div>
                    <label class="control-label col-sm-4">Role</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select id="role_ubah" class="form-control" name="role">
                                <option value="">-Role-</option>
                                @foreach($content['role'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="hidden_div_ubah" style="display: none;">
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
<!-- Modal Form Ubah Data Guru -->

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
    $(function(){$("#tableuser").dataTable({scrollY:400,scrollCollapse:!0,bPaginate:!0,bLengthChange:!0,bFilter:!0,bSort:!0,bInfo:!0,responsive:!0,bAutoWidth:!1,aoColumns:[{sWidth:"5%"},{sWidth:"20%"},{sWidth:"30%"},{sWidth:"0%"},{sWidth:"12%"},{sWidth:"15%"},{sWidth:"10%"},{sWidth:"0%"},{sWidth:"8%"}],aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama User",sUrl:"",sZeroRecords:"Data tidak ditemukan"},aoColumnDefs:[{bSearchable:!1,aTargets:["no","nip","jkl","agama","role","none"]},{bSortable:!1,aTargets:["agama","action"]}]});var a=$("#tableuser").DataTable();$(".dataTables_filter input").unbind().bind("keyup",function(){var e="\\b"+this.value.toLowerCase()+"\\b";a.rows().search(e,!0,!1).draw()})});
</script>

<!-- <script type="text/javascript" src="js/guru.js"></script> -->
<!-- <script type="text/javascript" src="js/modal.js"></script> -->

<!-- VALIDASI FORM TAMBAH GURU -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalTambahGuru").modal("hide");$("#TambahGuru").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nip:{validators:{notEmpty:{message:"NIP harus diisi"},stringLength:{max:25,message:"NIP maksimal 25 karakter"},remote:{url:"{{ URL::to('/checkNIP') }}",data:function(a){return{nis:a.getFieldElements("nip").val()}},message:"NIP sudah ada"}}},nama:{validators:{notEmpty:{message:"Nama harus diisi"},stringLength:{max:50,message:"Nama maksimal 50 karakter"}}},username:{validators:{notEmpty:{message:"Username harus diisi"},stringLength:{min:5,message:"Username minimal 5 karakter"},regexp:{regexp:/^[a-zA-Z0-9_\.]+$/,message:"The username can only consist of alphabetical, number, dot and underscore"},remote:{url:"{{ URL::to('/checkUsername') }}",data:function(a){return{username:a.getFieldElements("username").val(),nama:a.getFieldElements("nama").val()}},message:"Username sudah ada"}}},password:{validators:{notEmpty:{message:"Password harus diisi"},stringLength:{min:5,message:"Password minimal 5 karakter"},different:{field:"username",message:"Username dan password tidak boleh sama"}}},role:{validators:{notEmpty:{message:"Role harus diisi"}}},jadwal:{validators:{notEmpty:{message:"Jadwal harus diisi"}}},jkl:{enabled:!1,validators:{notEmpty:{message:"Jenis kelamin harus diisi"}}},agama:{enabled:!1,validators:{notEmpty:{message:"Agama harus diisi"}}},tlp:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}}}}).on("keyup",'[name="jkl"]',function(){var a=""==$(this).val();$("#TambahGuru").bootstrapValidator("enableFieldValidators","jkl",!a),1==$(this).val().length&&$("#TambahGuru").bootstrapValidator("validateField","jkl")}).on("keyup",'[name="agama"]',function(){var a=""==$(this).val();$("#TambahGuru").bootstrapValidator("enableFieldValidators","agama",!a),1==$(this).val().length&&$("#TambahGuru").bootstrapValidator("validateField","agama")}).on("keyup",'[name="tlp"]',function(){var a=""==$(this).val();$("#TambahGuru").bootstrapValidator("enableFieldValidators","tlp",!a),1==$(this).val().length&&$("#TambahGuru").bootstrapValidator("validateField","tlp")})});
</script>
<!-- VALIDASI FORM TAMBAH GURU -->

<!-- VALIDASI FORM UBAH GURU -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalUbahGuru").modal("hide");$("#UbahGuru").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nip:{validators:{notEmpty:{message:"NIP harus diisi"},stringLength:{max:25,message:"NIP maksimal 25 karakter"},remote:{url:"{{ URL::to('/checkNIPUbah') }}",data:function(a){return{nis:a.getFieldElements("nip").val(),id:a.getFieldElements("id").val()}},message:"NIP sudah ada"}}},nama:{validators:{notEmpty:{message:"Nama harus diisi"},stringLength:{max:50,message:"Nama maksimal 50 karakter"}}},username:{validators:{notEmpty:{message:"Username harus diisi"},stringLength:{min:5,message:"Username minimal 5 karakter"},regexp:{regexp:/^[a-zA-Z0-9_\.]+$/,message:"Hanya boleh memakai huruf, nomor dan garis bawah"},remote:{url:"{{ URL::to('/checkUsernameUbah') }}",data:function(a){return{username:a.getFieldElements("username").val(),id:a.getFieldElements("id").val()}},message:"Username sudah ada"}}},password:{enabled:!1,validators:{stringLength:{min:5,message:"Password minimal 5 karakter"},different:{field:"username",message:"Username dan password tidak boleh sama"}}},role:{validators:{notEmpty:{message:"Role harus diisi"}}},jadwal:{validators:{notEmpty:{message:"Jadwal harus diisi"}}},jkl:{enabled:!1,validators:{notEmpty:{message:"Jenis kelamin harus diisi"}}},agama:{enabled:!1,validators:{notEmpty:{message:"Agama harus diisi"}}},tlp:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}}}}).on("keyup",'[name="password"]',function(){var a=""==$(this).val();$("#UbahGuru").bootstrapValidator("enableFieldValidators","password",!a),1==$(this).val().length&&$("#UbahGuru").bootstrapValidator("validateField","password")}).on("keyup",'[name="jkl"]',function(){var a=""==$(this).val();$("#UbahGuru").bootstrapValidator("enableFieldValidators","jkl",!a),1==$(this).val().length&&$("#UbahGuru").bootstrapValidator("validateField","jkl")}).on("keyup",'[name="agama"]',function(){var a=""==$(this).val();$("#UbahGuru").bootstrapValidator("enableFieldValidators","agama",!a),1==$(this).val().length&&$("#UbahGuru").bootstrapValidator("validateField","agama")}).on("keyup",'[name="tlp"]',function(){var a=""==$(this).val();$("#UbahGuru").bootstrapValidator("enableFieldValidators","tlp",!a),1==$(this).val().length&&$("#UbahGuru").bootstrapValidator("validateField","tlp")})});
</script>
<!-- VALIDASI FORM UBAH GURU -->

<!-- JADWAL PIKET -->
<script type="text/javascript">
  document.getElementById('role').addEventListener('change', function () {
      var style = this.value == 'guru piket' ? 'block' : 'none';
      document.getElementById('hidden_div').style.display = style;
  });
</script>

<script type="text/javascript">
  document.getElementById('role_ubah').addEventListener('change', function () {
      var style = this.value == 'guru piket' ? 'block' : 'none';
      document.getElementById('hidden_div_ubah').style.display = style;
  });
</script>
<!-- JADWAL PIKET -->
@endsection