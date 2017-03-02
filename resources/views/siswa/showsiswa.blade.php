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

    <div class="box-body">
        <table id="tablesiswa" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablesiswa_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th class="no"><center>No</center></th>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="agama"><center>Agama</center></th>
                    <th class="kelas"><center>Kelas</center></th>
                    <th class="none">Telepon Siswa</th>
                    <th class="none">Alamat Siswa</th>
                    <th class="none">Nama Ayah</th>
                    <th class="none">Nama Ibu</th>
                    <th class="none">Telepon Orang Tua</th>
                    <th class="none">Alamat Orang Tua</th>
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
                    <td>{{$item->tlp_siswa}}</td>
                    <td>{{$item->alamat_siswa}}</td>
                    <td>{{$item->nama_ayah}}</td> 
                    <td>{{$item->nama_ibu}}</td>
                    <td>{{$item->tlp_ortu}}</td>
                    <td>{{$item->alamat_ortu}}</td> 
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->id}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-info btn-xs" title="Info" onclick="showModalInfoSiswa(this)" 
                            data-id="{{$item->id}}"
                            data-nis="{{$item->nis}}"
                            data-nama="{{$item->nama}}"
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-kelas="{{$item->kelas->nama_kelas}}"
                            data-tlp-siswa="{{$item->tlp_siswa}}"
                            data-alamat-siswa="{{$item->alamat_siswa}}"
                            data-nama-ayah="{{$item->nama_ayah}}"
                            data-nama-ibu="{{$item->nama_ibu}}"
                            data-tlp-ortu="{{$item->tlp_ortu}}"
                            data-alamat-ortu="{{$item->alamat_ortu}}">
                            <span class="fa fa-eye"></span></a>
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalSiswa(this)" 
                            data-id="{{$item->id}}"
                            data-nis="{{$item->nis}}"
                            data-nama="{{$item->nama}}"
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-kelas="{{$item->kelas_id}}"
                            data-tlp-siswa="{{$item->tlp_siswa}}"
                            data-alamat-siswa="{{$item->alamat_siswa}}"
                            data-nama-ayah="{{$item->nama_ayah}}"
                            data-nama-ibu="{{$item->nama_ibu}}"
                            data-tlp-ortu="{{$item->tlp_ortu}}"
                            data-alamat-ortu="{{$item->alamat_ortu}}">
                            <span class="fa fa-edit"></span></a>
                            <!-- <a onclick="return confirm('Are you sure?')" href='deletesiswa&{{$item->id}}' class="btn btn-danger btn-xs" title="Hapus" ><span class="fa fa-trash"></span></a> -->
                            <a data-href="deletesiswa&{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>
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
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade modal-danger" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
            </div>
            <div class="modal-body">
                Apa anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-ok">Hapus</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Konfirmasi Hapus -->


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
                            <input type="text" id="nis" name="nis" class="form-control" placeholder="NIS">
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
                        <div class="col-sm-5">
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
                        <div class="col-sm-4">
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
                    <label class="control-label col-sm-4">Telepon Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon Siswa">
                        </div>  
                    </div> 
                    <label class="control-label col-sm-4">Alamat Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <textarea name="alamat_siswa" class="form-control" placeholder="Alamat Siswa"></textarea>
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Ayah</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Telepon Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tlp_ortu" class="form-control" placeholder="Telepon Ayah/Ibu">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Alamat Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <textarea name="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua"></textarea>
                        </div>  
                    </div>                 
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" value="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
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
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
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
                        <div class="col-sm-5">
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
                        <div class="col-sm-4">
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
                    <label class="control-label col-sm-4">Telepon Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon Siswa">
                        </div>  
                    </div> 
                    <label class="control-label col-sm-4">Alamat Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <textarea name="alamat_siswa" class="form-control" placeholder="Alamat Siswa"></textarea>
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Ayah</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Telepon Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tlp_ortu" class="form-control" placeholder="Telepon Ayah/Ibu">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Alamat Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <textarea name="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua"></textarea>
                        </div>  
                    </div>                   
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Ubah Data Siswa -->

<!-- Modal Form Info Data Siswa-->
<div class="modal fade" id="ModalInfoSiswa" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Info Detail Siswa</h4>
            </div>
            <form class="form-horizontal" method="" action="" id="InfoSiswa">         
                <div class="modal-body">                   
                    <label class="col-sm-4">NIS</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="nis">: </label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="nama">: </label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="jkl"></label>
                        </div>
                    </div>
                    <label class="col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="agama"></label>
                        </div>
                    </div>
                    <label class="col-sm-4">Kelas</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="kelas"></label>
                        </div>
                    </div>
                    <label class="col-sm-4">Telepon Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="tlp_siswa"></label>
                        </div>  
                    </div> 
                    <label class="col-sm-4">Alamat Siswa</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="alamat_siswa"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Nama Ayah</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="nama_ayah"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Nama Ibu</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="nama_ibu"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Telepon Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="tlp_ortu"></label>
                        </div>  
                    </div>
                    <label class="col-sm-4">Alamat Orang Tua</label>
                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="alamat_ortu"></label>
                        </div>  
                    </div>                   
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <!-- <input type="hidden" name="_token" value="{{{ csrf_token() }}}" /> -->
                            <!-- <button type="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button> -->
                            <button type="button" style="margin-right:-150px" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Info Data Siswa -->

<!-- Modal Ubah Password -->
<div class="modal fade" id="ModalUbahPassword" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Password</h4>
            </div>
            <form class="form-horizontal" method="post" action="ubahpasswordpakaimodal" id="UbahPassword">
                <div class="modal-body">
                    <label class="control-label col-sm-4">Password Lama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="current_password" class="form-control" placeholder="Password Lama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Password Baru</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="new_password" class="form-control" placeholder="Password Baru">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Password Konfirmasi</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Password Konfirmasi">
                        </div>  
                    </div>                                      
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <div class="col-xs-5 col-xs-offset-3">
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                            <button type="submit" value="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Ubah Password -->
@endsection