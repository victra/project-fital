@extends('layouts.app')

@section('htmlheader_title')
    Rekap Absensi (Semester)
@endsection

@section('contentheader_title')
    Rekap Absensi Siswa
@endsection

@section('contentheader_description')
    Rekap perSemester
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Rekap Absensi Per Semester</h3>            
            <div style="margin-right:0px; margin-top:30px" class="form-group pull-right">
                <!-- Tombol Rekap -->
                <!-- <div class="pull-right">
                <a class="pull-right btn btn-success btn-sm">Rekap</a>
                </div> -->

                <!-- Pilih Semester -->
                <!-- array manual -->
                <!-- <form style="margin-right:20px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" name="semester">
                        <option value="">-Pilih Semester-</option>
                        @foreach($content['semester'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Semester :</label> -->
                <!-- array dari tabel semester -->
                <form style="margin-right:20px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" name="semester" onchange="location = '?search_kelas={{$content['input_kelas']}}&semester='+this.value;">
                        <option value="">-Pilih Semester-</option>
                        @foreach($content['semester'] as $value)
                        <?php $selected = $content['input_semester']==$value['id'] ? 'selected' : '' ?>
                            <option {{$selected}} value="{{$value['id']}}">{{$value['semester']}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Semester :</label>

                <!-- Pilih Kelas -->
                <form style="margin-right:50px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value+'&semester={{$content['sem']}}';">
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

    <div class="box-body table-responsive">
        <table id="tablerekapsemester" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablerekapsemester_info">

            <thead>
                <tr>
                    {{--<th><center>No</center></th>--}}
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="kelas"><center>Kelas</center></th>
                    <th class="sakit"><center>Sakit</center></th>
                    <th class="izin"><center>Izin</center></th>
                    <th class="alpa"><center>Alpa</center></th>
                    <th class="total"><center>Total</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['absensis'] as $item)
                <tr>
                    {{--<td><center>{{$no++}}</center></td>--}}
                    <td>{{$item->nis}}</td>
                    <td>{{$item->nama}}</td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->kelas->nama_kelas}}</center></td>
                    <td><center>{{$item->sakits}}</center></td>
                    <td><center>{{$item->izins}}</center></td>
                    <td><center>{{$item->alpas}}</center></td>
                    <td><center>{{$item->sakits + $item->izins + $item->alpas}}</center></td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

    <div class="box-foot">
                <div class="col-lg-2 pull-right">
                    {{--<div class="input-group date" id="datetimePicker">--}}
                        <input type="text" disabled id="datetimePicker" name="dapat" class="form-control tanggal input-sm sampai" value="{{$content['tgl_akhir']}}" placeholder="Tanggal Akhir">
                        {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>--}}
                </div>
                <!-- <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">sampai </label> -->

                <div class="col-lg-2 pull-right">
                    {{--<div class="input-group date" id="datetimePicker1">--}}
                        <input type="text" disabled id="datetimePicker1" class="form-control tanggal input-sm dari" value="{{$content['tgl_awal']}}" placeholder="Tanggal Awal">
                        {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>--}}
                </div>
                <!-- <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Dari :</label> -->
    </div>
</div>
@endsection