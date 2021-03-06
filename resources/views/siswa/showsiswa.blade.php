@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Data Siswa
@endsection

@section('contentheader_title')
    Data Siswa
@endsection

@section('contentheader_description')
    Olah Data Siswa
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">        
        <h3 class="box-title">Data Siswa</h3>
        <input id="carikelas" type="hidden" />
        @if (Auth::user()->role == 'administrator' or Auth::user()->role == 'guru piket')
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#ModalTambahSiswa"> <i class="fa fa-plus"></i> Tambah Siswa</a>
        @endif
            <form style="margin-right:300px; margin-top:0px" class="pull-right">
                <select id="kelasq" class="form-control input-sm">
                    <option value="">Semua Kelas</option>
                        @foreach($content['kelas'] as $value)
                        <?php $selected = $content['input_kelas']==$value['id'] ? 'selected' : '' ?>
                    <option {{$selected}} value="{{$value['id']}}">{{$value['nama_kelas']}}</option>
                        @endforeach
                </select>
            </form>
        <label style="margin-right:10px; margin-top:5px" class="control-label pull-right">Kelas :</label>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablesiswa" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablesiswa_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th class="ket"><center>No</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Agama</center></th>
                    <th><center>Kelas</center></th>
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


<!-- Modal Form Tambah Data Siswa-->
<div class="modal fade" id="ModalTambahSiswa" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Siswa</h4>
            </div>

            <ul class="nav nav-tabs">
                <li class="active"><a href="#siswa-tab" data-toggle="tab">Siswa <i class="fa"></i></a></li>
                <li><a href="#ortu-tab" data-toggle="tab">Orang Tua Siswa <i class="fa"></i></a></li>
            </ul>

            <form class="form-horizontal" method="post" action="storesiswa" id="TambahSiswa">          
                <div class="modal-body">
                    <!-- Tab Siswa -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="siswa-tab">
                            <label class="control-label col-sm-4">NIS</label>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Nama</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Jenis Kelamin</label>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <select class="form-control" name="jkl">
                                        <option value="">-- Jenis Kelamin --</option>
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
                                        <option value="">-- Agama --</option>
                                        @foreach($content['agama'] as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="control-label col-sm-4">Kelas</label>
                            <div class="form-group">
                                <div class="col-sm-4">
                                <select class="form-control" name="kelas">
                                        <option value="">-- Kelas --</option>
                                        @foreach($content['kelas'] as $value)
                                            <option value="{{$value['id']}}">{{$value['nama_kelas']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="control-label col-sm-4">Telepon Siswa</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon Siswa">
                                </div>  
                            </div> 
                            <label class="control-label col-sm-4">Alamat Siswa</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <textarea name="alamat_siswa" class="form-control" placeholder="Alamat Siswa"></textarea>
                                </div>  
                            </div>
                        </div>
                        <!-- Tab Orang Tua -->
                        <div class="tab-pane" id="ortu-tab">
                            <label class="control-label col-sm-4">Nama Ayah</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Nama Ibu</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Telepon Orang Tua</label>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input type="text" name="tlp_ortu" class="form-control" placeholder="Telepon Ayah/Ibu">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Alamat Orang Tua</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <textarea name="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua"></textarea>
                                </div>  
                            </div> 
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
<!-- Modal Form Tambah Data Siswa -->

<!-- Modal Form Ubah Data Siswa-->
<div class="modal fade" id="ModalUbahSiswa" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Siswa</h4>
            </div>

            <ul class="nav nav-tabs">
                <li class="active"><a href="#sistab" data-toggle="tab">Siswa <i class="fa"></i></a></li>
                <li><a href="#ortab" data-toggle="tab">Orang Tua Siswa <i class="fa"></i></a></li>
            </ul>

            <form class="form-horizontal" method="post" action="storesiswa" id="UbahSiswa">          
                <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <input type="hidden" name="id" class="form-control">
                            </div>  
                        </div>
                    <!-- Tab Siswa -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="sistab">
                            <label class="control-label col-sm-4">NIS</label>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Nama</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Jenis Kelamin</label>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <select class="form-control" name="jkl">
                                        <option value="">-- Jenis Kelamin --</option>
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
                                        <option value="">-- Agama --</option>
                                        @foreach($content['agama'] as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="control-label col-sm-4">Kelas</label>
                            <div class="form-group">
                                <div class="col-sm-4">
                                <select class="form-control" name="kelas">
                                        <option value="">-- Kelas --</option>
                                        @foreach($content['kelas'] as $value)
                                            <option value="{{$value['id']}}">{{$value['nama_kelas']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label class="control-label col-sm-4">Telepon Siswa</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon Siswa">
                                </div>  
                            </div> 
                            <label class="control-label col-sm-4">Alamat Siswa</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <textarea name="alamat_siswa" class="form-control" placeholder="Alamat Siswa"></textarea>
                                </div>  
                            </div>
                        </div>
                        <!-- Tab Orang Tua -->
                        <div class="tab-pane" id="ortab">
                            <label class="control-label col-sm-4">Nama Ayah</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Nama Ibu</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Telepon Orang Tua</label>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <input type="text" name="tlp_ortu" class="form-control" placeholder="Telepon Ayah/Ibu">
                                </div>  
                            </div>
                            <label class="control-label col-sm-4">Alamat Orang Tua</label>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <textarea name="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua"></textarea>
                                </div>  
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
<!-- Modal Form Ubah Data Siswa-->

<!-- Modal Form Info Data Siswa-->
<div class="modal fade" id="ModalInfoSiswa" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Info Detail Siswa</h4>
            </div>
            <form class="form-horizontal" method="" action="" id="InfoSiswa">         
                <div class="modal-body">                   
                    <label class="col-sm-4">NIS</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="nis">: </label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="nama">: </label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="jkl"></label>
                        </div>
                    </div>
                    <label class="col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="agama"></label>
                        </div>
                    </div>
                    <label class="col-sm-4">Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="kelas"></label>
                        </div>
                    </div>
                    <label class="col-sm-4">Telepon Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="tlp_siswa"></label>
                        </div>  
                    </div> 
                    <label class="col-sm-4">Alamat Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="alamat_siswa"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Nama Ayah</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="nama_ayah"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Nama Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="nama_ibu"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Telepon Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="tlp_ortu"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Alamat Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label style="font-weight: normal;" for="alamat_ortu"></label>
                        </div>  
                    </div>                   
                </div>
                <!-- <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3"> -->
                            <!-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> -->
                            <!-- <button type="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button> -->
                            <!-- <button type="button" style="margin-right:-180px" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div> -->
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Info Data Siswa -->

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
    $(function(){$("#kelasq").on("change",function(){var e=$(this).val();document.getElementById("carikelas").value=e})});
</script>
<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){var a=$("#tablesiswa").DataTable({scrollY:400,scrollCollapse:!0,processing:!0,serverSide:!0,ajax:"{{ route('siswa.data') }}",fnCreatedRow:function(e,t,s){var n=s+1+a.page.info().start;$("td",e).eq(0).html(n)},columns:[{data:null,sWidth:"5%",orderable:!1,searchable:!1,className:"text-center"},{data:"nis",name:"siswa.nis",sWidth:"5%",searchable:!1,className:"text-center"},{data:"nama",name:"siswa.nama",sWidth:"35%"},{data:"jkl",name:"siswa.jkl",sWidth:"15%",orderable:!1,searchable:!1,className:"text-center"},{data:"agama",name:"siswa.agama",sWidth:"10%",orderable:!1,searchable:!1,className:"text-center"},{data:"nama_kelas",name:"siswa.kelas_id",sWidth:"15%",className:"text-center"},{data:"action",name:"action",sWidth:"15%",orderable:!1,searchable:!1,className:"text-center"}],order:[[1,"asc"]],responsive:!0,bAutoWidth:!1,aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Siswa",sUrl:"",sZeroRecords:"Data tidak ditemukan"},dom:"<'row'<'col-md-5'l><'col-md-2'B><'col-md-5'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",buttons:[{extend:"excelHtml5",text:"Export Excel",title:"Document",exportOptions:{columns:":not(.ket)",modifier:{page:"current"}},customize:function(a){a.xl.worksheets["sheet1.xml"]}}]});a.on("order.dt search.dt",function(){a.column(0,{search:"applied",order:"applied"}).nodes().each(function(a,e){a.innerHTML=e+1})}).draw()});
</script>

<!-- Export Excel -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<!-- <script type="text/javascript" src="js/siswa.js"></script>
<script type="text/javascript" src="js/infosiswa.js"></script> -->
<!-- <script type="text/javascript" src="js/modal.js"></script> -->

<script type="text/javascript">
    $(document).ready(function(){var a=$("#tablesiswa").DataTable();$("#kelasq").on("change",function(){var e=$(this).val(),r=$("#carikelas").val();regex="\\b"+e+"\\b",""!=r?a.columns(5).search(regex,!0,!1).draw():a.columns(5).search("",!0,!1).draw()})});
</script>

<!-- VALIDASI FORM TAMBAH SISWA -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalTambahSiswa").modal("hide");$("#TambahSiswa").bootstrapValidator({excluded:[":disabled"],feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nis:{validators:{notEmpty:{message:"NIS harus diisi"},stringLength:{max:10,message:"NIS maksimal 10 karakter"},remote:{url:"{{ URL::to('/checkNIS') }}",data:function(a){return{nis:a.getFieldElements("nis").val()}},message:"NIS sudah ada"}}},nama:{validators:{notEmpty:{message:"Nama harus diisi"},stringLength:{max:50,message:"Nama maksimal 50 karakter"}}},jkl:{enabled:!1,validators:{notEmpty:{message:"Jenis kelamin harus diisi"}}},agama:{enabled:!1,validators:{notEmpty:{message:"Agama harus diisi"}}},kelas:{validators:{notEmpty:{message:"Kelas harus diisi"}}},tlp_siswa:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}},alamat_siswa:{enabled:!1,validators:{stringLength:{max:70,message:"Alamat maksimal 70 karakter"}}},nama_ayah:{validators:{notEmpty:{message:"Nama Ayah harus diisi"},stringLength:{min:3,max:50,message:"Nama Ayah antara 3-50 karakter"}}},nama_ibu:{validators:{notEmpty:{message:"Nama Ibu harus diisi"},stringLength:{min:3,max:50,message:"Nama Ibu antara 3-50 karakter"}}},tlp_ortu:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}},alamat_ortu:{enabled:!1,validators:{stringLength:{max:70,message:"Alamat maksimal 70 karakter"}}}}}).on("status.field.bv",function(a,t){$(a.target);var e=t.bv,s=t.element.parents(".tab-pane"),i=s.attr("id");if(i){var l=$('a[href="#'+i+'"][data-toggle="tab"]').parent().find("i");if(t.status==e.STATUS_INVALID)l.removeClass("fa-check").addClass("fa-times");else if(t.status==e.STATUS_VALID){var r=e.isValidContainer(s);l.removeClass("fa-check fa-times").addClass(r?"fa-check":"fa-times")}else l.removeClass("fa-check fa-times")}}).on("keyup",'[name="jkl"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","jkl",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","jkl")}).on("keyup",'[name="agama"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","agama",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","agama")}).on("keyup",'[name="tlp_siswa"]',function(){var a=""==$(this).val();$("#TambahSiswa").bootstrapValidator("enableFieldValidators","tlp_siswa",!a),1==$(this).val().length&&$("#TambahSiswa").bootstrapValidator("validateField","tlp_siswa")}).on("keyup",'[name="alamat_siswa"]',function(){var a=""==$(this).val();$("#TambahSiswa").bootstrapValidator("enableFieldValidators","alamat_siswa",!a),1==$(this).val().length&&$("#TambahSiswa").bootstrapValidator("validateField","alamat_siswa")}).on("keyup",'[name="tlp_ortu"]',function(){var a=""==$(this).val();$("#TambahSiswa").bootstrapValidator("enableFieldValidators","tlp_ortu",!a),1==$(this).val().length&&$("#TambahSiswa").bootstrapValidator("validateField","tlp_ortu")}).on("keyup",'[name="alamat_ortu"]',function(){var a=""==$(this).val();$("#TambahSiswa").bootstrapValidator("enableFieldValidators","alamat_ortu",!a),1==$(this).val().length&&$("#TambahSiswa").bootstrapValidator("validateField","alamat_ortu")})});
</script>
<!-- VALIDASI FORM TAMBAH SISWA -->

<!-- VALIDASI FORM UBAH SISWA -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalUbahSiswa").modal("hide");$("#UbahSiswa").bootstrapValidator({excluded:[":disabled"],feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nis:{validators:{notEmpty:{message:"NIS harus diisi"},stringLength:{max:10,message:"NIS maksimal 10 karakter"},remote:{url:"{{ URL::to('/checkNISUbah') }}",data:function(a){return{nis:a.getFieldElements("nis").val(),id:a.getFieldElements("id").val()}},message:"NIS sudah ada"}}},nama:{validators:{notEmpty:{message:"Nama harus diisi"},stringLength:{max:50,message:"Nama maksimal 50 karakter"}}},jkl:{enabled:!1,validators:{notEmpty:{message:"Jenis kelamin harus diisi"}}},agama:{enabled:!1,validators:{notEmpty:{message:"Agama hraus diisi"}}},kelas:{validators:{notEmpty:{message:"Kelas harus diisi"}}},tlp_siswa:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}},alamat_siswa:{enabled:!1,validators:{stringLength:{max:70,message:"Alamat maksimal 70 karakter"}}},nama_ayah:{validators:{notEmpty:{message:"Nama Ayah harus diisi"},stringLength:{max:50,message:"Nama Ayah maksimal 50 karakter"}}},nama_ibu:{validators:{notEmpty:{message:"Nama Ibu harus diisi"},stringLength:{max:50,message:"Nama Ibu maksimal 50 karakter"}}},tlp_ortu:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}},alamat_ortu:{enabled:!1,validators:{stringLength:{max:70,message:"Alamat maksimal 70 karakter"}}}}}).on("status.field.bv",function(a,t){$(a.target);var e=t.bv,s=t.element.parents(".tab-pane"),i=s.attr("id");if(i){var l=$('a[href="#'+i+'"][data-toggle="tab"]').parent().find("i");if(t.status==e.STATUS_INVALID)l.removeClass("fa-check").addClass("fa-times");else if(t.status==e.STATUS_VALID){var r=e.isValidContainer(s);l.removeClass("fa-check fa-times").addClass(r?"fa-check":"fa-times")}else l.removeClass("fa-check fa-times")}}).on("keyup",'[name="jkl"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","jkl",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","jkl")}).on("keyup",'[name="agama"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","agama",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","agama")}).on("keyup",'[name="tlp_siswa"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","tlp_siswa",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","tlp_siswa")}).on("keyup",'[name="alamat_siswa"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","alamat_siswa",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","alamat_siswa")}).on("keyup",'[name="tlp_ortu"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","tlp_ortu",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","tlp_ortu")}).on("keyup",'[name="alamat_ortu"]',function(){var a=""==$(this).val();$("#UbahSiswa").bootstrapValidator("enableFieldValidators","alamat_ortu",!a),1==$(this).val().length&&$("#UbahSiswa").bootstrapValidator("validateField","alamat_ortu")})});
</script>
<!-- VALIDASI FORM UBAH SISWA -->

<!-- VALIDASI FORM INFO SISWA -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalInfoSiswa").modal("hide")});
</script>
<!-- VALIDASI FORM INFO SISWA -->
@endsection