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

<!-- pesan peringatan berhasil -->
@if(Session::has('info_message'))
    <div id="infoMessage" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><em> {!! session('info_message') !!}</em><a class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
@endif

@if(Session::has('info_rekap'))
    <div id="infoRekap" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><em> {!! session('info_rekap') !!}</em><a class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Rekap Absensi Per Semester</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
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
                    <select id="semesterku" class="form-control input-sm" name="semester" onchange="location = '?search_kelas={{$content['input_kelas']}}&semester='+this.value;">
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
                    <select class="form-control input-sm" onchange="location = this.value+'&semester={{$content['input_semester']}}';">
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
    @if(Session::has('info_rekap'))
    <div class="box-body">
        <table id="tablerekap" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablerekap_info">

            <thead>
                <tr>
                    {{--<th><center>No</center></th>--}}
                    <th class="nis"><center>NIS</center></th>
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
                    <td><center>{{$item->nis}}</center></td>
                    <td>{{$item->nama}}</td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->kelas->nama_kelas}}</center></td>
                    <td><center>{{$item->sakits}}</center></td>
                    <td><center>{{$item->izins}}</center></td>
                    <td><center>{{$item->alpas}}</center></td>
                    <td><center>{{$item->totals}}</center></td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

    <div class="box-foot">
        <div class="col-lg-2 pull-right">
            {{--<div class="input-group date" id="datetimePicker">--}}
                <input type="hidden" disabled id="datetimePicker" name="dapat" class="form-control tanggal input-sm sampai" value="{{$content['tgl_akhir']}}" placeholder="Tanggal Akhir">
                {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>--}}
        </div>
        <!-- <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">sampai </label> -->

        <div class="col-lg-2 pull-right">
            {{--<div class="input-group date" id="datetimePicker1">--}}
                <input type="hidden" disabled id="datetimePicker1" class="form-control tanggal input-sm dari" value="{{$content['tgl_awal']}}" placeholder="Tanggal Awal">
                {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>--}}
        </div>
        <!-- <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Dari :</label> -->
    </div>
    @endif

        <input id="kelasku" type="text" name="kelas" value="{{$content['input_kelas']}}">     
</div>
@endsection

@section('modals')
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

<!-- Modal Form Ubah Profil-->
<div class="modal fade" id="ModalUbahProfil" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Profil</h4>
            </div>
            <form class="form-horizontal" method="post" action="updateprofil" id="UbahProfil">          
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" class="form-control">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">NIP/NIK</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nip" class="form-control" placeholder="NIP/NIK">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Nama</label>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control" placeholder="Nama">
                        </div>  
                    </div>
                    <label class="control-label col-sm-4">Username</label>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                            <!-- <input type="text" name="username" class="form-control" placeholder="Username" readonly data-bv-excluded="true"> -->
                        </div>  
                    </div>
                    @if (Auth::user()->role == 'guru piket')
                        <label class="control-label col-sm-4">Jadwal Piket</label>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <select class="form-control" name="jadwal">
                                    <option value="">-Jadwal Piket-</option>
                                    @foreach($content['jadwal'] as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-Jenis Kelamin-</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Agama-</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>                                                  
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Telepon</label>
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
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>      
    </div>
</div>
<!-- Modal Form Ubah Profil-->
@endsection

@section('scripts-tambahan')
<!-- Hide/Show Datatable Rekap Absensi -->
<script type="text/javascript">
    $(document).ready(function (){
        validate();
        $('#kelasku').change(validate);
    });

    function validate(){
        if ($('#kelasku').val()   !=   '') {
            $('#tablerekap').parents('div.dataTables_wrapper').first().show();
             // var div = document.getElementById("infoMessage");
            document.getElementById("infoMessage").style.display = "none";
        }
        else {
            $('#tablerekap').parents('div.dataTables_wrapper').first().hide();
             // var div = document.getElementById("infoMessage");
            document.getElementById("infoRekap").style.display = "none";
        }
    }        
</script>
<!-- Hide/Show Datatable Rekap Absensi -->
@endsection