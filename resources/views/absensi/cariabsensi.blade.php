@extends('layouts.app')

@section('htmlheader_title')
    Cari Absensi
@endsection

@section('contentheader_title')
    Cari Data Absensi
@endsection

@section('contentheader_description')
    Cari Absensi Siswa
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <input id="caritanggal" type="text"/>
                <!-- <div class="col-sm-4 pull-right">
                    <input id="myInput" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">
                </div>  
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Cari Berdasarkan Nama:</label> -->   
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-left">Cari Tanggal :</label>
                <div class="col-sm-2">
                    <div class="input-group date" id="datetimePicker">
                        <input id="tanggal" type="text" name="tanggal" class="form-control tanggal input-sm">
                        <!-- <input type="text" name="tanggal" class="form-control tanggal input-sm"> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <!-- <button onclick="window.location.href = '?tanggal=' " type="button" style="margin-right:5px"; name="lihat" class="btn btn-info pull-left fa fa-search btn-sm" title="Lihat"></button> -->
                <button onclick="myFunction()" type="button" style="margin-right:15px; margin-top:4px"; name="reset" class="btn btn-danger pull-left fa fa-close btn-xs" title="Reset Tanggal"></button>
            </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablecariabsensi" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablecariabsensi_info">

            <thead>
                <tr>
                    <!-- <th class="no"><center>No</center></th> -->
                    <th class="tanggal">Tanggal</th>
                    <th class="nis">NIS</th>
                    <th>Nama Siswa</th>
                    <th class="jkl">Jenis Kelamin</th>
                    <th class="kelas">Kelas</th>
                    <th class="status">Status</th>
                    <th class="keterangan">Keterangan</th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['absensis'] as $item)
                <tr>
                    <!-- <td><center>{{$no++}}</center></td> -->
                    <td>{{$item->date}}</td>
                    <td><center>{{$item->siswa->nis}}</center></td>
                    <td>{{$item->siswa->nama}}</td>
                    <td><center>{{$item->siswa->jkl}}</center></td>
                    <td>{{$item->siswa->kelas->nama_kelas}}</td> 
                    <td><center>{{$item->status}}</center></td>
                    <td>{{$item->description}}</td>                
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

</div>
@endsection

@section('modals')
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