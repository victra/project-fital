@extends('layouts.app')

@section('htmlheader_title')
    Data Kelas
@endsection

@section('contentheader_title')
    Data Kelas
@endsection

@section('contentheader_description')
    Olah Data Kelas
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <!-- <h3 class="box-title">Data Kelas</h3> -->
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Kelas" data-toggle="modal" data-target="#ModalTambahKelas"> <i class="fa fa-plus"></i> Tambah Kelas</a>            
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="tablekelas" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablekelas_info">

            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>Nama Kelas</center></th>
                    <th><center>Kompetensi Keahlian</center></th>
                    <th><center>Tahun Ajaran</center></th>
                    <th><center>Wali Kelas</center></th>
                    <th class="no-export"><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['kelasku'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{$item->nama_kelas}}</center></td>                    
                    <td>{{$item->jurusan}}</td>
                    <td><center>{{$item->thn_ajaran}}</center></td>
                    <td><center>{{$item->waliKelas->name}}</center></td> 
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->id}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalKelas(this)" 
                            data-id="{{$item->id}}"
                            data-nama_kelas="{{$item->nama_kelas}}"
                            data-jurusan="{{$item->jurusan}}"
                            data-thn_ajaran="{{$item->thn_ajaran}}"
                            data-wali_kelas="{{$item->wali_kelas_id}}">
                            <span class="fa fa-edit"></span></a>
                            <!-- <a onclick="return confirm('Are you sure?')" href='deletekelas&{{$item->id}}' class="btn btn-danger btn-xs" title="Hapus" ><span class="fa fa-trash"></span></a> -->
                            <a data-href="deletekelas&{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>
                    </td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->
</div>
@endsection

@section('modals')
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi Hapus Data
            </div>
            <div class="modal-body">
                Apa anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <a class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form Tambah Data Kelas-->
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
                    <label class="control-label col-sm-4">Nama Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" id="nama_kelas" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Kompetensi Keahlian</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control" name="jurusan">
                                <option value="">-Kompetensi Keahlian-</option>
                                @foreach($content['jurusan'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Tahun Ajaran</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="thn_ajaran" class="form-control" placeholder="20xx/20xx">
                        </div>  
                    </div>                    
                    <label class="control-label col-sm-4">Wali Kelas</label>
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
<!-- Modal Form Tambah Data Kelas -->

<!-- Modal Form Ubah Data Kelas-->
<div class="modal fade" id="ModalUbahKelas" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Kelas</h4>
            </div>
            <form class="form-horizontal" method="post" action="storekelas" id="UbahKelas">          
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Jurusan</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <select class="form-control" name="jurusan">
                                <option value="">-- Jurusan --</option>
                                @foreach($content['jurusan'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Tahun Ajaran</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="thn_ajaran" class="form-control" placeholder="20xx/20xx">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Wali Kelas</label>
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
<!-- Modal Form Ubah Data Kelas -->
@endsection