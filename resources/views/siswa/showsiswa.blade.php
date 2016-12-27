@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Data Siswa
@endsection

@section('contentheader_description')
    Olah Data Siswa
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Siswa</h3>
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#myModal1"> <i class="fa fa-plus"></i> Tambah Siswa</a>
            <form style="margin-right:130px; margin-top:0px" class="pull-right">
                <select class="form-control" onchange="location = this.value;">
                    <option value="?search_kelas=">Semua Kelas</option>
                        @foreach($content['kelas'] as $value)
                        <?php $selected = $content['input_kelas']==$value ? 'selected' : '' ?>
                    <option {{$selected}} value="?search_kelas={{$value}}">{{$value}}</option>
                        @endforeach
                </select>
            </form>
        <label style="margin-right:10px; margin-top:5px" class="control-label pull-right">Kelas :</label>
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
                    <th><center>Action</center></th>
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
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->nis}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModal(this)" 
                            data-nis="{{$item->nis}}"
                            data-nama="{{$item->nama}}"
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-kelas="{{$item->kelas}}">
                            <span class="fa fa-edit"></span> Ubah</a>
                            <a class="btn btn-danger btn-xs" title="Hapus" href="delete&{{$item->nis}}"><span class="fa fa-trash"></span> Hapus</a>
                        </center>
                    </td>
                </tr>                                    
                @endforeach
            </tbody>

            <!--<tfoot>
                <tr>
                    <th><center>No</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Agama</center></th>
                    <th><center>Kelas</center></th>
                    <th><center>Action</center></th>
                </tr>
            </tfoot>-->                        
        </table>                
                
    </div><!-- /.box-body -->
</div>
@endsection

@section('modals')
<!-- Modal Form Tambah Data Siswa-->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Siswa</h4>
            </div>
            <form class="form-horizontal" method="post" action="store">          
                <div class="modal-body">
                    <div class="form-group">
                    <label class="control-label col-sm-3">NIS</label>
                        <div class="col-sm-2">
                            <input type="text" name="nis" class="form-control" placeholder="NIS">
                        </div>  
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-Pilih Jenis Kelamin-</option>
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Agama</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Pilih Agama-</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Kelas</label>
                        <div class="col-sm-3">
                        <select class="form-control" name="kelas">
                                <option value="">-Pilih Kelas-</option>
                                @foreach($content['kelas'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
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
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Tambah Data Siswa -->

<!-- Modal Form Ubah Data Siswa-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Siswa</h4>
            </div>
            <form class="form-horizontal" method="post" action="store">          
                <div class="modal-body">
                    <div class="form-group">
                    <label class="control-label col-sm-3">NIS</label>
                        <div class="col-sm-2">
                            <input type="text" name="nis" class="form-control" placeholder="NIS" disabled="disabled">
                        </div>  
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-Pilih Jenis Kelamin-</option>
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Agama</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Pilih Agama-</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-3">Kelas</label>
                        <div class="col-sm-3">
                        <select class="form-control" name="kelas">
                                <option value="">-Pilih Kelas-</option>
                                @foreach($content['kelas'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
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
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Ubah Data Siswa -->
@endsection