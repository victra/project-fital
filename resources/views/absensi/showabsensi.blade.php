@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Absensi Siswa
@endsection

@section('contentheader_description')
    Olah Data Absensi Siswa
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Absensi</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <div class="col-lg-2 pull-right">
                    <div class="input-group date" id="datetimePicker">
                        <input type="text" name="tanggal" class="form-control tanggal input-sm" onchange="location = '?search_kelas={{$content['input_kelas']}}&tanggal='+this.value;" value="{{$content['tanggal']}}">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Tanggal :</label>
                <form style="margin-right:30px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value+'&tanggal={{$content['tanggal']}}';">
                        <option value="?search_kelas=">Pilih Kelas</option>
                        @foreach($content['kelas'] as $key => $value)
                            <?php $selected = $content['input_kelas']==$key ? 'selected' : '' ?>
                            <option {{$selected}} value="?search_kelas={{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Kelas :</label>
                </div>
    </div><!-- /.box-header -->
    <form class="form-horizontal" method="post" action="store">
    <div class="box-body table-responsive">
        <table id="example2" class="table table-hover table-bordered table-striped dataTable" aria-describedby="example2_info">
            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Agama</center></th>
                    <th><center>Kelas</center></th>
                    <th><center>Status</center></th>
                    <th><center>Keterangan</center></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($content['siswas'] as $item)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td><center>{{$item->nis}}</center></td>
                        <td>{{$item->nama}}</td>
                        <td><center>{{$item->jkl}}</center></td>
                        <td><center>{{$item->agama}}</center></td>
                        <td><center>{{$item->kelas}}</center></td>  
                        @if(!isset($item['absensi']))
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
                                        <textarea name="absensi[{{$item->id}}][description]" class="form-control"></textarea>
                                    </div>
                                </center>
                            </td>                    
                        @else
                            <td>
                                <center>
                                    <select style="width:100px;" class="form-control input-sm" name="absensi[{{$item->id}}][status]">
                                        @foreach($content['status'] as $key => $value)
                                            <?php $selected = $key==$item['absensi']['status'] ? 'selected' : '' ?>
                                            <option {{$selected}} value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>                        
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div class="form-group">
                                        <textarea name="absensi[{{$item->id}}][description]" class="form-control">{{$item['absensi']['description']}}</textarea>
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
        <input type="hidden" name="kelas" value="{{$content['input_kelas']}}">
        <input type="hidden" name="tanggal" value="{{$content['tanggal']}}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <button type="submit" name="simpan" class="btn btn-info pull-right">Simpan Absensi</button>
    </div>
    </form> 
</div>
@endsection