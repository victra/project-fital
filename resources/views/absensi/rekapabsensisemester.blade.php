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
                <div class="pull-right">
                <a class="pull-right btn btn-success btn-sm">Rekap</a>
                </div>
                <!-- Pilih Bulan -->
                <form style="margin-right:20px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" name="semester">
                        <option value="">-Pilih Semester-</option>
                        @foreach($content['semester'] as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Semester :</label>

                <!-- Pilih Kelas -->
                <form style="margin-right:50px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value;">
                        <option value="">-Pilih Kelas-</option>
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
        <table id="example2" class="table table-hover table-bordered table-striped dataTable" aria-describedby="example2_info">

            <thead>
                <tr>
                    {{--<th><center>No</center></th>--}}
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Kelas</center></th>
                    <th><center>Sakit</center></th>
                    <th><center>Izin</center></th>
                    <th><center>Absen</center></th>
                    <th><center>Total</center></th>
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
                    <td><center></center></td>
                    <td><center></center></td>
                    <td><center></center></td>
                    <td><center></center></td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

</div>
@endsection