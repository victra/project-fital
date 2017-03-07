@extends('layouts.app')

@section('htmlheader_title')
    Absensi Siswa
@endsection

@section('contentheader_title')
    Absensi Siswa
@endsection

@section('contentheader_description')
    Olah Data Absensi Siswa
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Absensi Siswa</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <div class="col-lg-2 pull-right">
                    <div class="input-group date" id="datetimePicker">
                        <input id="kelas" type="text" name="tanggalku" class="form-control tanggal input-sm" onchange="location = '?search_kelas={{$content['input_kelas']}}&tanggal='+this.value;" value="{{$content['tanggal']}}">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Tanggal :</label>
                <form style="margin-right:30px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value+'&tanggal={{$content['tanggal']}}';">
                        <option value="?search_kelas=">Pilih Kelas</option>
                        @foreach($content['kelas'] as $value)
                        <?php $selected = $content['input_kelas']==$value['id'] ? 'selected' : '' ?>
                    <option {{$selected}} value="?search_kelas={{$value['id']}}">{{$value['nama_kelas']}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Kelas :</label>
                </div>
    </div><!-- /.box-header -->
    <form class="form-horizontal" method="post" action="store">
    <div class="box-body">
        <table id="tableabsensi" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tableabsensi_info">
            <thead>
                <tr>
                    <th class="no"><center>No</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="agama"><center>Agama</center></th>
                    <!-- <th><center>Kelas</center></th> -->
                    <th class="status"><center>Status</center></th>
                    <th class="keterangan"><center>Keterangan</center></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($content['siswasi'] as $item)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td><center>{{$item->nis}}</center></td>
                        <td>{{$item->nama}}</td>
                        <td><center>{{$item->jkl}}</center></td>
                        <td><center>{{$item->agama}}</center></td>
                        <!-- <td><center>{{$item->kelas->nama_kelas}}</center></td>   -->
                        @if(!isset($item['absensi_non_permanent']))
                            <td>
                                <center>
                                    <select style="width:100px;" class="form-control input-sm" name="absensi[{{$item->id}}][status]">
                                        <option value="">-</option>
                                        <option value="H">Hadir</option>
                                        <option value="I">Izin</option>
                                        <option value="S">Sakit</option>
                                        <option value="A">Alpa</option>
                                    </select>                        
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div class="form-group">
                                        <textarea style="width:230px" name="absensi[{{$item->id}}][description]" class="form-control"></textarea>
                                    </div>
                                </center>
                            </td>                    
                        @else
                            <td>
                                <center>
                                    <select style="width:100px;" class="form-control input-sm" name="absensi[{{$item->id}}][status]">
                                        @foreach($content['status'] as $key => $value)
                                            <?php $selected = $key==$item['absensi_non_permanent']['status'] ? 'selected' : '' ?>
                                            <option {{$selected}} value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>                        
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div class="form-group">
                                        <textarea style="width:230px" name="absensi[{{$item->id}}][description]" class="form-control">{{$item['absensi_non_permanent']['description']}}</textarea>
                                    </div>
                                </center>
                            </td>                   
                        @endif
                    </tr>
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

    <div class="box-footer">
        <input id="kelasku" type="hidden" name="kelas" value="{{$content['input_kelas']}}">
        <input type="hidden" name="tanggal" value="{{$content['tanggal']}}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <button id="simpan" type="submit" name="simpan" class="btn btn-info pull-right">Simpan Absensi</button>
        <button id="hapus" data-href='deleteabsensi/{{$content['tanggal']}}/{{$content['input_kelas']}}' data-toggle="modal" data-target="#confirm-delete" type="button" style="margin-right:15px"; name="hapus" class="btn btn-danger pull-right">Hapus Absensi</button>
        <!-- <a href="deleteabsensi/{{$content['tanggal']}}/{{$content['input_kelas']}}" style="margin-right:15px"; class="btn btn-danger pull-right" title="Hapus"> Hapus Absensi</a> -->
    </div>
    </form> 
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
@endsection