@extends('layouts.app')

@section('htmlheader_title')
    Data User
@endsection

@section('contentheader_title')
    Data User
@endsection

@section('contentheader_description')
    Olah Data User
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <!-- <h3 class="box-title">Data Guru</h3> -->
        <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#ModalTambahGuru"> <i class="fa fa-plus"></i> Tambah Guru</a>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="tableuser" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tableuser_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th><center>No</center></th>
                    <th><center>NIP</center></th>
                    <th><center>Nama Guru</center></th>
                    <th class="none">Username</th>
                    <th><center>Role</center></th>
                    <th><center>Jenis Kelamin</center></th>
                    <th><center>Agama</center></th>
                    <th class="none">Telepon</th>
                    <th><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['gurupkt'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{$item->nip}}</center></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><center>{{$item->role}}</center></td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->agama}}</center></td>
                    <td>{{$item->tlp}}</td>  
                    <td>
                        <center>                                    
                            {{-- <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->id}}"><span class="fa fa-edit"></span> Ubah</a> --}}
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalGuru(this)" 
                            data-id="{{$item->id}}"
                            data-nip="{{$item->nip}}"
                            data-nama="{{$item->name}}"
                            data-username="{{$item->email}}"                            
                            data-role="{{$item->role}}"
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-tlp="{{$item->tlp}}">
                            <!-- data-password="{{$item->password}}" -->
                            
                            <span class="fa fa-edit"></span></a>
                            <a onclick="return confirm('Are you sure?')" href="deleteguru&{{$item->id}}" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>
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
<!-- Modal Form Tambah Data Guru-->
<div class="modal fade" id="ModalTambahGuru" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Guru</h4>
            </div>
            <form class="form-horizontal" method="post" action="storeguru" id="TambahGuru">          
                <div class="modal-body">
                    <label class="control-label col-sm-3">NIP/NIK</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nip" class="form-control" placeholder="NIP/NIK">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Username</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Password</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Role</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="role">
                                <option value="">-- Role --</option>
                                @foreach($content['role'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
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
                    <label class="control-label col-sm-3">Agama</label>
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
                    <label class="control-label col-sm-3">Telepon</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tlp" class="form-control" placeholder="Telepon">
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
<!-- Modal Form Tambah Data Guru -->

<!-- Modal Form Ubah Data Guru-->
<div class="modal fade" id="ModalUbahGuru" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Guru</h4>
            </div>
            <form class="form-horizontal" method="post" action="updateguru" id="UbahGuru">          
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">NIP/NIK</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nip" class="form-control" placeholder="NIP/NIK">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Username</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <!-- <input type="text" name="username" class="form-control" placeholder="Username" readonly data-bv-excluded="true"> -->
                        </div>  
                    </div>
                    <label class="control-label col-sm-3">Password</label>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <input type="password" name="password" class="form-control" placeholder="****************">
                        </div>
                        <span class="help-inline col-sm-5"> <i class="fa fa-info-circle"></i> Biarkan jika tidak diubah </span>  
                    </div>
                    <label class="control-label col-sm-3">Role</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="role">
                                <option value="">-- Role --</option>
                                @foreach($content['role'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-3">Jenis Kelamin</label>
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
                    <label class="control-label col-sm-3">Agama</label>
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
                    <label class="control-label col-sm-3">Telepon</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" name="tlp" class="form-control" placeholder="Telepon">
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
<!-- Modal Form Ubah Data Guru -->
@endsection