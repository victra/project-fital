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
    @if (Auth::user()->role == 'administrator' or 'guru piket')
        <!-- <h3 class="box-title">Data Siswa</h3> -->
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#ModalTambahSiswa"> <i class="fa fa-plus"></i> Tambah Siswa</a>
        @endif
            <form style="margin-right:125px; margin-top:0px" class="pull-right">
                <select class="form-control input-sm" onchange="location = this.value;">
                    <option value="?search_kelas=">Semua Kelas</option>
                        @foreach($content['kelas'] as $value)
                        <?php $selected = $content['input_kelas']==$value['id'] ? 'selected' : '' ?>
                    <option {{$selected}} value="?search_kelas={{$value['id']}}">{{$value['nama_kelas']}}</option>
                        @endforeach
                </select>
            </form>
        <label style="margin-right:10px; margin-top:5px" class="control-label pull-right">Kelas :</label>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="tablesiswa" class="table table-hover table-bordered table-striped dataTable" aria-describedby="example2_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Agama</center></th>
                    <th><center>Kelas</center></th>
                    <th class="none">Alamat</th>
                    <th class="none">Nama Ayah/Ibu</th>
                    <th class="none">Telepon Ayah/Ibu</th>
                    <th class="no-expor"><center>Action</center></th>
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
                    <td><center>{{$item->kelas->nama_kelas}}</center></td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->nama_ortu}}</td>
                    <td>{{$item->tlp_ortu}}</td>  
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->nis}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalSiswa(this)" 
                            data-nis="{{$item->nis}}"
                            data-nama="{{$item->nama}}"
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-kelas="{{$item->kelas_id}}"
                            data-alamat="{{$item->alamat}}"
                            data-nama-ortu="{{$item->nama_ortu}}"
                            data-tlp-ortu="{{$item->tlp_ortu}}">
                            <span class="fa fa-edit"></span></a>
                            <a onclick="return confirm('Are you sure?')" href='delete&{{$item->nis}}' class="btn btn-danger btn-xs" title="Hapus" ><span class="fa fa-trash"></span></a>
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
<div class="modal fade" id="ModalTambahSiswa" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Siswa</h4>
            </div>
            <form class="form-horizontal" method="post" action="storesiswa" id="TambahSiswa">          
                <div class="modal-body">
                    <label class="control-label col-sm-4">NIS</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="nis" class="form-control" placeholder="NIS">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-- Jenis Kelamin --</option>
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <select class="form-control" name="agama">
                                <option value="">-- Agama --</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                        <select class="form-control" name="kelas">
                                <option value="">-- Kelas --</option>
                                @foreach($content['kelas'] as $value)
                                    <option value="{{$value['id']}}">{{$value['nama_kelas']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <label class="control-label col-sm-4">Alamat</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <textarea name="alamat" class="form-control" placeholder="Alamat Siswa"></textarea>
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Ayah/Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama_ortu" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Telepon Ayah/Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="tlp" class="form-control" placeholder="Telepon Ayah/Ibu">
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
<div class="modal fade" id="ModalUbahSiswa" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Siswa</h4>
            </div>
            <form class="form-horizontal" method="post" action="storesiswa" id="UbahSiswa">          
                <div class="modal-body">
                    <label class="control-label col-sm-4">NIS</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="nis" class="form-control" placeholder="NIS" disabled="disabled">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-- Jenis Kelamin --</option>
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <select class="form-control" name="agama">
                                <option value="">-- Agama --</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                        <select class="form-control" name="kelas">
                                <option value="">-- Kelas --</option>
                                @foreach($content['kelas'] as $value)
                                    <option value="{{$value['id']}}">{{$value['nama_kelas']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <label class="control-label col-sm-4">Alamat</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <textarea name="alamat" class="form-control" placeholder="Alamat Siswa"></textarea>
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Ayah/Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="namaortu" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Telepon Ayah/Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="tlportu" class="form-control" placeholder="Telepon Ayah/Ibu">
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