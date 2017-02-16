@extends('layouts.app')

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
        <!-- <h3 class="box-title">Data Siswa</h3> -->
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Kelas" data-toggle="modal" data-target="#ModalTambahKelas"> <i class="fa fa-plus"></i> Tambah Kelas</a>            
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="example2" class="table table-hover table-bordered table-striped dataTable" aria-describedby="example2_info">

            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>Kode Kelas</center></th>
                    <th><center>Nama Kelas</center></th>
                    <th><center>Jurusan</center></th>
                    <th><center>Wali Kelas</center></th>
                    <th class="no-export"><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['kelasku'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{$item->kd}}</center></td>
                    <td><center>{{$item->nama_kelas}}</center></td>
                    <td>{{$item->jurusan}}</td>
                    <td><center>{{$item->waliKelas->name}}</center></td> 
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->kd}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalKelas(this)" 
                            data-kd="{{$item->kd}}"
                            data-nama_kelas="{{$item->nama_kelas}}"
                            data-jurusan="{{$item->jurusan}}"
                            data-wali_kelas="{{$item->wali_kelas_id}}"
                            <span class="fa fa-edit"></span> Ubah</a>
                            <a onclick="return confirm('Are you sure?')" href='delete&{{$item->kd}}' class="btn btn-danger btn-xs" title="Hapus" ><span class="fa fa-trash"></span> Hapus</a>
                            <!-- <button id="ico" href='delete&{{$item->nis}}' class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span> Hapus</button> -->
                        </center>
                    </td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->
</div>
@endsection

@section('modals')
<!-- Modal Form Tambah Data Siswa-->
<div class="modal fade" id="ModalTambahKelas" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Kelas</h4>
            </div>
            <form class="form-horizontal" method="post" action="storekelas" id="TambahKelas">          
                <div class="modal-body">
                    <label class="control-label col-sm-3">Kode Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="kd" class="form-control" placeholder="Kode Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Nama Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Jurusan</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <select class="form-control" name="jurusan">
                                <option value="">-- Jurusan --</option>
                                @foreach($content['jurusan'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    <label class="control-label col-sm-3">Wali Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <select class="form-control" name="wali_kelas">
                                <option value="">-- Wali Kelas --</option>
                                @foreach($content['walikelas'] as $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                  
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" value="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Tambah Data Siswa -->

<!-- Modal Form Ubah Data Siswa-->
<div class="modal fade" id="ModalUbahKelas" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Kelas</h4>
            </div>
            <form class="form-horizontal" method="post" action="updatekelas" id="UbahKelas">          
                <div class="modal-body">
                    <label class="control-label col-sm-3">Kode Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="kd" class="form-control" placeholder="Kode Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Nama Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" disabled="disabled">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Jurusan</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <select class="form-control" name="jurusan">
                                <option value="">-- Jurusan --</option>
                                @foreach($content['jurusan'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-3">Wali Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <select class="form-control" name="wali_kelas">
                                <option value="">-- Wali Kelas --</option>
                                @foreach($content['walikelas'] as $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                                    
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Ubah Data Siswa -->
@endsection