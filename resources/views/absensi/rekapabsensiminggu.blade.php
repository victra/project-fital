@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Rekap Absensi Siswa
@endsection

@section('contentheader_description')
    Rekap perBulan
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <!-- Tombol Rekap -->
                <div class="col-lg-2 pull-right">
                <a class="pull-right btn btn-success btn-sm">Rekap</a>
                </div>
                <!-- Rekap Mingguan -->
                <div class="col-lg-2 pull-right">
                    <div class="input-group date" id="datetimePicker">
                        <input type="text" name="tanggal_mulai" class="form-control tanggal input-sm">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">sampai Tanggal :</label>

                <div class="col-lg-2 pull-right">
                    <div class="input-group date" id="datetimePicker">
                        <input type="text" name="tanggal_akhir" class="form-control tanggal input-sm">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Dari Tanggal :</label>

                <!-- Pilih Bulan -->
                {{--<form style="margin-right:150px; margin-top:0px" class="pull-right">
                    <select class="form-control" name="bulan">
                        <option value="">-Pilih Bulan-</option>
                        @foreach($content['bulan'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Bulan :</label>--}}

                <!-- Pilih Kelas -->
                <form style="margin-right:30px; margin-top:0px" class="pull-right">
                    <select class="form-control" name="kelas">
                        <option value="">-Pilih Kelas-</option>
                        @foreach($content['kelas'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
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
                    <th><center>Sakit</center></th>
                    <th><center>Izin</center></th>
                    <th><center>Absen</center></th>
                    <th><center>Total</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td></td>
                    <td></td>
                    <td><center></center></td>
                    <td><center></center></td>
                    <td><center></center></td>
                    <td><center></center></td>
                    <td><center></center></td>                    
                </tr>                                    
                
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

</div>
@endsection