@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Cari Data Absensi
@endsection

@section('contentheader_description')
    Cari Absensi Siswa
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Cari Data Absensi Siswa</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <div class="col-sm-4 pull-right">
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">
                </div>  
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Cari :</label>   
            </div>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="example3" class="table table-hover table-bordered table-striped dataTable" aria-describedby="example2_info">

            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>Tanggal</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Kelas</center></th>
                    <th><center>Keterangan</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center></center></td>
                    <td></td>
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