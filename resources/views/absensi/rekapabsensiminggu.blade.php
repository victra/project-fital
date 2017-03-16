@extends('layouts.app')

@section('htmlheader_title')
    Rekap Absensi (Minggu)
@endsection

@section('contentheader_title')
    Rekap Absensi Siswa
@endsection

@section('contentheader_description')
    Rekap perBulan
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
        <h3 class="box-title">Rekap Absensi Per Minggu</h3>            
            <div style="margin-right:0px; margin-top:30px" class="form-group pull-right">
                <!-- Tombol Rekap -->
                {{--<div class="pull-right">
                <a class="btn btn-success btn-sm">Rekap</a>
                </div>--}}
                <!-- Rekap Mingguan -->
                <div class="col-lg-2 pull-right">
                    {{--<div class="input-group date" id="datetimePicker">--}}
                        <input type="text" disabled id="datetimePicker" name="dapat" value="{{$content['sampai_tanggal']}}" class="form-control tanggal input-sm sampai" placeholder="Tanggal">
                        {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>--}}
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">sampai </label>

                <div class="col-lg-2 pull-right">
                    {{--<div class="input-group date" id="datetimePicker1">--}}
                        <input type="text" id="datetimePicker1" class="form-control tanggal input-sm dari" onchange="location = '?search_kelas={{$content['input_kelas']}}&dari_tanggal='+this.value;" value="{{$content['dari_tanggal']}}" placeholder="Tanggal">
                        {{--<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>--}}
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Dari :</label>

                <!-- Pilih Kelas -->
                <form style="margin-right:50px; margin-top:0px" class="pull-right">
                    <select id="kelasku" class="form-control input-sm" onchange="location = this.value+'&dari_tanggal={{$content['dari_tanggal']}}';">
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

    <div class="box-body">
        <table id="tablerekapminggu" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablerekapminggu_info">

            <thead>
                <tr>
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="kelas"><center>Kelas</center></th>
                    <th class="sakit"><center>Sakit</center></th>
                    <th class="izin"><center>Izin</center></th>
                    <th class="alpa"><center>Alpa</center></th>
                    <th class="total"><center>Total</center></th>
                    <th class="infoa"><center>Info</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['absensis'] as $item)
                <tr>
                    <!-- <td>{{$item->nis}}</td>
                    <td>{{$item->nama}}</td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->kelas->nama_kelas}}</center></td>                    
                    <td><center>{{$item->sakit}}</center></td>
                    <td><center>{{$item->izin}}</center></td>
                    <td><center>{{$item->alpa}}</center></td>
                    <td><center>{{$item->sakit + $item->izin + $item->alpa}}</center></td>
                    <td><center></center></td> -->

                    @if ($item->sakit + $item->izin + $item->alpa > 2)
                        <td bgcolor="red"><center>{{$item->nis}}</center></td>
                        <td bgcolor="red"><center>{{$item->nama}}</center></td>
                        <td bgcolor="red"><center>{{$item->jkl}}</center></td>
                        <td bgcolor="red"><center>{{$item->kelas->nama_kelas}}</center></td>
                        <td bgcolor="red"><center>{{$item->sakit}}</center></td>
                        <td bgcolor="red"><center>{{$item->izin}}</center></td>
                        <td bgcolor="red"><center>{{$item->alpa}}</center></td>
                        <td bgcolor="red"><center>{{$item->sakit + $item->izin + $item->alpa}}</center></td>
                        <td bgcolor="red"><center></center></td>
                    @else
                        <td><center>{{$item->nis}}</center></td>
                        <td><center>{{$item->nama}}</center></td>
                        <td><center>{{$item->jkl}}</center></td>
                        <td><center>{{$item->kelas->nama_kelas}}</center></td>
                        <td><center>{{$item->sakit}}</center></td>
                        <td><center>{{$item->izin}}</center></td>
                        <td><center>{{$item->alpa}}</center></td>
                        <td><center>{{$item->sakit + $item->izin + $item->alpa}}</center></td>
                        <td><center></center></td>
                    @endif
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>
    </div><!-- /.box-body -->

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
@endsection

@section('scripts-tambahan')
<!-- Hide/Show Datatable Rekap Absensi -->
<script type="text/javascript">
    $(document).ready(function (){
        validate();
        $('#kelasku').change(validate);
    });

    function validate(){
        if ($('#kelasku').val()   !=   "?search_kelas=" && $('#datetimePicker1').val()   !=   "" ) {
            $('#tablerekapminggu').parents('div.dataTables_wrapper').first().show();
             // var div = document.getElementById("infoMessage");
            document.getElementById("infoMessage").style.display = "none";
            document.getElementById("infoRekap").style.display = "none";

        }
        else if ($('#kelasku').val()   !=   "?search_kelas=") {
            $('#tablerekapminggu').parents('div.dataTables_wrapper').first().hide();
             // var div = document.getElementById("infoMessage");
            document.getElementById("infoMessage").style.display = "none";

        }
        else if ($('#datetimePicker1').val()   !=   "" ) {
            $('#tablerekapminggu').parents('div.dataTables_wrapper').first().hide();
             // var div = document.getElementById("infoMessage");
            document.getElementById("infoRekap").style.display = "none";

        }
        else {
            $('#tablerekapminggu').parents('div.dataTables_wrapper').first().hide();
            document.getElementById("infoRekap").style.display = "none";
            // document.getElementById('datetimePicker1').disabled = true;
        }
    }        
</script>
<!-- Hide/Show Datatable Rekap Absensi -->
@endsection