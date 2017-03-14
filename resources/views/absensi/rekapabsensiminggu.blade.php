@extends('layouts.app')

@section('htmlheader_title')
    Rekap Absensi (Minggu)
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
        <h3 class="box-title">Rekap Absensi Per Minggu</h3>            
            <div style="margin-right:0px; margin-top:30px" class="form-group pull-right">
                <!-- Tombol Rekap -->
                <div class="pull-right">
                <a class="btn btn-success btn-sm">Rekap</a>
                </div>
                <!-- Rekap Mingguan -->
                <div class="col-lg-2 pull-right">
                    {{--<div class="input-group date" id="datetimePicker">--}}
                        <input type="text" disabled id="datetimePicker" name="dapat" value="{{$content['sampai_tanggal']}}" class="form-control tanggal input-sm sampai" placeholder="Tanggal">
                        {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>--}}
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">sampai </label>

                <div class="col-lg-2 pull-right">
                    {{--<div class="input-group date" id="datetimePicker1">--}}
                        <input type="text" id="datetimePicker1" class="form-control tanggal input-sm dari" onchange="location = '?search_kelas={{$content['input_kelas']}}&dari_tanggal='+this.value;" value="{{$content['dari_tanggal']}}" placeholder="Tanggal">
                        {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>--}}
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Dari :</label>

                <!-- Pilih Kelas -->
                <form style="margin-right:50px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value+'&dari_tanggal={{$content['dari_tanggal']}}';">
                        <option value="?search_kelas=">-Pilih Kelas-</option>
                            @foreach($content['kelas'] as $value)
                            <?php $selected = $content['input_kelas']==$value['id'] ? 'selected' : '' ?>
                        <option {{$selected}} value="?search_kelas={{$value['id']}}">{{$value['nama_kelas']}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Kelas :</label>
            </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablerekapminggu" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablerekapminggu_info">

            <thead>
                <tr>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Kelas</center></th>
                    <th><center>Sakit</center></th>
                    <th><center>Izin</center></th>
                    <th><center>Alpa</center></th>
                    <th><center>Total</center></th>
                    <th><center>Info</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['absensis'] as $item)
                <tr>
                    <td>{{$item->nis}}</td>
                    <td>{{$item->nama}}</td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->kelas->nama_kelas}}</center></td>                    
                    <td><center>{{$item->sakit}}</center></td>
                    <td><center>{{$item->izin}}</center></td>
                    <td><center>{{$item->alpa}}</center></td>
                    <td><center></center></td>
                    <th><center></center></th>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>
    </div><!-- /.box-body -->

</div>
@endsection