@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Data Kelas
@endsection

@section('contentheader_title')
    Data Kelas
@endsection

@section('contentheader_description')
    Olah Data Kelas
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Kelas</h3>
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Kelas" data-toggle="modal" data-target="#ModalTambahKelas"> <i class="fa fa-plus"></i> Tambah Kelas</a>            
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablekelas" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablekelas_info">

            <thead>
                <tr>
                    <th class="ket"><center>No</center></th>
                    <th><center>Nama Kelas</center></th>
                    <th><center>Kompetensi Keahlian</center></th>
                    <th><center>Wali Kelas</center></th>
                    <th><center>L</center></th>
                    <th><center>P</center></th>
                    <th><center>Total</center></th>
                    <th class="ket"><center>Action</center></th>
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

<!-- Modal Form Tambah Data Kelas-->
<div class="modal fade" id="ModalTambahKelas" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Kelas</h4>
            </div>
            <form class="form-horizontal" method="post" action="storekelas" id="TambahKelas">          
                <div class="modal-body">
                    <label class="control-label col-sm-4">Nama Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Kompetensi Keahlian</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control" name="jurusan">
                                <option value="">-Kompetensi Keahlian-</option>
                                @foreach($content['jurusan'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <label class="control-label col-sm-4">Tahun Ajaran</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="thn_ajaran" class="form-control" placeholder="20xx/20xx">
                        </div>  
                    </div>   -->                  
                    <label class="control-label col-sm-4">Wali Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control" name="wali_kelas">
                                <option value="">-- Wali Kelas --</option>
                                @foreach($content['walikelas'] as $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
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
<!-- Modal Form Tambah Data Kelas -->

<!-- Modal Form Ubah Data Kelas-->
<div class="modal fade" id="ModalUbahKelas" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Kelas</h4>
            </div>
            <form class="form-horizontal" method="post" action="storekelas" id="UbahKelas">          
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Jurusan</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control" name="jurusan">
                                <option value="">-- Jurusan --</option>
                                @foreach($content['jurusan'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- <label class="control-label col-sm-4">Tahun Ajaran</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="thn_ajaran" class="form-control" placeholder="20xx/20xx">
                        </div>  
                    </div> -->
                    <label class="control-label col-sm-4">Wali Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control" name="wali_kelas">
                                <option value="">-- Wali Kelas --</option>
                                @foreach($content['walikelasubah'] as $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
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
<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){var a=$("#tablekelas").DataTable({scrollY:400,scrollCollapse:!0,processing:!0,serverSide:!0,ajax:"{{ route('kelas.data') }}",fnCreatedRow:function(e,t,s){var l=s+1+a.page.info().start;$("td",e).eq(0).html(l)},columns:[{data:null,sWidth:"5%",orderable:!1,searchable:!1,className:"text-center"},{data:"nama_kelas",name:"kelas.nama_kelas",sWidth:"15%"},{data:"jurusan",name:"kelas.jurusan",sWidth:"20%",searchable:!1,className:"text-center"},{data:"name",name:"users.name",sWidth:"30%",searchable:!1},{data:"totall",name:"totall",sWidth:"5%",orderable:!1,searchable:!1,className:"text-center"},{data:"totalp",name:"totalp",sWidth:"5%",orderable:!1,searchable:!1,className:"text-center"},{data:"total",name:"total",sWidth:"8%",orderable:!1,searchable:!1,className:"text-center"},{data:"action",name:"action",sWidth:"8%",orderable:!1,searchable:!1,className:"text-center"}],responsive:!0,bAutoWidth:!1,aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Kelas",sUrl:"",sZeroRecords:"Data tidak ditemukan"},dom:"<'row'<'col-md-5'l><'col-md-2'B><'col-md-5'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",buttons:[{extend:"excelHtml5",text:"Export Excel",title:"Document",exportOptions:{columns:":not(.ket)",modifier:{page:"current"}},customize:function(a){a.xl.worksheets["sheet1.xml"]}}]});a.on("order.dt search.dt",function(){a.column(0,{search:"applied",order:"applied"}).nodes().each(function(a,e){a.innerHTML=e+1})}).draw()});
</script>

<!-- Export Excel -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<!-- <script type="text/javascript" src="js/kelas.js"></script> -->
<!-- <script type="text/javascript" src="js/modal.js"></script> -->

<!-- VALIDASI FORM TAMBAH KELAS -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalTambahKelas").modal("hide");$("#TambahKelas").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nama_kelas:{validators:{notEmpty:{message:"Nama kelas harus diisi"},remote:{url:"{{ URL::to('/checkKelas') }}",data:function(a){return{nama_kelas:a.getFieldElements("nama_kelas").val()}},message:"Nama kelas sudah ada"}}},jurusan:{validators:{notEmpty:{message:"Jurusan harus diisi"}}},thn_ajaran:{validators:{notEmpty:{message:"Tahun ajaran harus diisi"},stringLength:{min:9,message:"Tahun ajaran minimal 9 karakter"}}},wali_kelas:{validators:{notEmpty:{message:"Wali kelas harus diisi"}}}}})});
</script>
<!-- VALIDASI FORM TAMBAH KELAS -->

<!-- VALIDASI FORM UBAH KELAS -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalUbahKelas").modal("hide");$("#UbahKelas").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nama_kelas:{validators:{notEmpty:{message:"Nama kelas harus diisi"},remote:{url:"{{ URL::to('/checkKelasUbah') }}",data:function(a){return{nama_kelas:a.getFieldElements("nama_kelas").val(),id:a.getFieldElements("id").val()}},message:"Nama kelas sudah ada"}}},jurusan:{validators:{notEmpty:{message:"Jurusan harus diisi"}}},thn_ajaran:{validators:{notEmpty:{message:"Tahun ajaran harus diisi"},stringLength:{min:9,message:"Tahun ajaran minimal 9 karakter"}}},wali_kelas:{validators:{notEmpty:{message:"Wali kelas harus diisi"}}}}})});
</script>
<!-- VALIDASI FORM UBAH KELAS -->
@endsection