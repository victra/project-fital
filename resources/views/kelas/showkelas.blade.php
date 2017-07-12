@extends('layouts.app')

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
                    <th class="no"><center>No</center></th>
                    <th><center>Nama Kelas</center></th>
                    <th class="jurusan"><center>Kompetensi Keahlian</center></th>
                    <!-- <th class="thn_ajaran"><center>Tahun Ajaran</center></th> -->
                    <th class="walikelas"><center>Wali Kelas</center></th>
                    <th class="laki"><center>L</center></th>
                    <th class="perempuan"><center>P</center></th>
                    <th class="total"><center>Total</center></th>
                    <th class="no-export"><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['kelasku'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td>{{$item->nama_kelas}}</td>                    
                    <td>{{$item->jurusan}}</td>
                    <!-- <td><center>{{$item->thn_ajaran}}</center></td> -->
                    <td>{{$item->waliKelas->name}}</td> 
                    <td><center>{{$item->jumlahlaki}}</center></td>
                    <td><center>{{$item->jumlahperempuan}}</center></td>
                    <td><center>{{$item->jumlah}}</center></td>
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->id}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalKelas(this)" 
                            data-id="{{$item->id}}"
                            data-nama_kelas="{{$item->nama_kelas}}"
                            data-jurusan="{{$item->jurusan}}"
                            data-thn_ajaran="{{$item->thn_ajaran}}"
                            data-wali_kelas="{{$item->wali_kelas_id}}">
                            <span class="fa fa-edit"></span></a>
                            <!-- <a onclick="return confirm('Are you sure?')" href='deletekelas&{{$item->id}}' class="btn btn-danger btn-xs" title="Hapus" ><span class="fa fa-trash"></span></a> -->
                            <a data-href="deletekelas&{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>
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
                        <div class="col-sm-5">
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
                        <div class="col-sm-5">
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
<script type="text/javascript">
    $(function(){$("#tablekelas").dataTable({scrollY:400,scrollCollapse:!0,bPaginate:!0,bLengthChange:!0,bFilter:!0,bSort:!0,bInfo:!0,responsive:!0,bAutoWidth:!1,aoColumns:[{sWidth:"5%"},{sWidth:"15%"},{sWidth:"20%"},{sWidth:"30%"},{sWidth:"5%"},{sWidth:"5%"},{sWidth:"8%"},{sWidth:"8%"}],aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Kelas",sUrl:"",sZeroRecords:"Data tidak ditemukan"},aoColumnDefs:[{bSearchable:!1,aTargets:["no","jurusan","thn_ajaran","walikelas","laki","perempuan","total"]},{bSortable:!1,aTargets:["thn_ajaran","walikelas","no-export"]}]});var a=$("#tablekelas").DataTable();$(".dataTables_filter input").unbind().bind("keyup",function(){var e="\\b"+this.value.toLowerCase()+"\\b";a.rows().search(e,!0,!1).draw()})});
</script>

<!-- <script type="text/javascript" src="js/kelas.js"></script> -->
<script type="text/javascript" src="js/modal.js"></script>

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