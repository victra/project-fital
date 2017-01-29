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
                        <input type="text" name="tanggal" class="form-control tanggal input-sm" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Tanggal :</label>
                <form style="margin-right:30px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value;">
                        <option value="?search_kelas=">Pilih Kelas</option>
                        <option value="?search_kelas=semua_kelas">Semua Kelas</option>
                            @foreach($content['kelas'] as $value)
                            <?php $selected = $content['input_kelas']==$value ? 'selected' : '' ?>
                        <option {{$selected}} value="?search_kelas={{$value}}">{{$value}}</option>
                            @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Kelas :</label>
                </div>
    </div><!-- /.box-header -->

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
                    <td>
                        <center>
                            <select style="width:100px;" class="form-control input-sm" name="absensi">
                                <option value="H">Hadir</option>
                                <option value="I">Izin</option>
                                <option value="S">Sakit</option>
                                <option value="A">Alpa</option>
                            </select>                        
                        </center>
                    </td>                    
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

    <div class="box-footer">
        <button type="submit" name="simpan" class="btn btn-info pull-right">Simpan</button>
        <button style="margin-right:20px; name="hapus" class="btn btn-danger pull-right">Hapus</button>
    </div>
</div>
@endsection