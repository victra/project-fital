@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Absensi Siswa
@endsection

@section('contentheader_title')
    Absensi Siswa
@endsection

@section('contentheader_description')
    Olah Data Absensi Siswa
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

@if(Session::has('info_message'))
    <div id="infoMessage" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><em> {!! session('info_message') !!}</em><a class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
@endif

@if(Session::has('info_absensi'))
    <div id="infoAbsensi" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><em> {!! session('info_absensi') !!}</em><a class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Absensi Siswa</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <div class="col-lg-2 pull-right">
                    <div class="input-group date" id="datetimePicker">
                        <input id="kelas" type="text" name="tanggalku" class="form-control tanggal input-sm" onchange="location = '?search_kelas={{$content['input_kelas']}}&tanggal='+this.value;" value="{{$content['tanggal']}}">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Tanggal :</label>
                <form style="margin-right:30px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value+'&tanggal={{$content['tanggal']}}';">
                        <option value="?search_kelas=">Pilih Kelas</option>
                        @foreach($content['kelas'] as $value)
                            <?php $selected = $content['input_kelas']==$value['id'] ? 'selected' : '' ?>
                            <option {{$selected}} value="?search_kelas={{$value['id']}}">{{$value['nama_kelas']}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Kelas :</label>
                </div>
    </div><!-- /.box-header -->
    @if(Session::has('info_absensi'))
    <form class="form-horizontal" method="post" action="store">
    <div class="box-body">
        <table id="tableabsensi" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tableabsensi_info">
            <thead>
                <tr>
                    <th class="no"><center>No</center></th>
                    <th class="nis"><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="agama"><center>Agama</center></th>
                    <!-- <th><center>Kelas</center></th> -->
                    <th class="status"><center>Status</center></th>
                    <th class="keterangan"><center>Keterangan</center></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($content['siswasi'] as $item)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td><center>{{$item->nis}}</center></td>
                        <td>{{$item->nama}}</td>
                        <td><center>{{$item->jkl}}</center></td>
                        <td><center>{{$item->agama}}</center></td>
                        <!-- <td><center>{{$item->kelas->nama_kelas}}</center></td>   -->
                        @if(!isset($item['absensi_non_permanent']))
                            <td>
                                <center>
                                    <select style="width:78px;" class="form-control input-sm" name="absensi[{{$item->id}}][status]">
                                        <option value="">-</option>
                                        <option value="H">Hadir</option>
                                        <option value="I">Izin</option>
                                        <option value="S">Sakit</option>
                                        <option value="A">Alpa</option>
                                    </select>                        
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div class="form-group">
                                        <textarea style="width:222px" maxlength="100" name="absensi[{{$item->id}}][description]" class="form-control"></textarea>
                                    </div>
                                </center>
                            </td>                    
                        @else
                            <td>
                                <center>
                                    <select style="width:78px;" class="form-control input-sm" name="absensi[{{$item->id}}][status]">
                                        @foreach($content['status'] as $key => $value)
                                            <?php $selected = $key==$item['absensi_non_permanent']['status'] ? 'selected' : '' ?>
                                            <option {{$selected}} value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>                        
                                </center>
                            </td>
                            <td>
                                <center>
                                    <div class="form-group">
                                        <textarea style="width:222px" maxlength="100" name="absensi[{{$item->id}}][description]" class="form-control">{{$item['absensi_non_permanent']['description']}}</textarea>
                                    </div>
                                </center>
                            </td>                   
                        @endif
                    </tr>
                @endforeach
            </tbody>                       
        </table>                
                
    <!-- </div> -->


    <!-- <div class="box-footer"> -->
        <input id="kelasku" type="hidden" name="kelas" value="{{$content['input_kelas']}}">
        <input type="hidden" name="tanggal" value="{{$content['tanggal']}}">
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <button id="simpan" type="submit" name="simpan" class="btn btn-info pull-right">Simpan Absensi</button>
        <!-- tombol hapus dengan if atau tidak -->
        {{--@if(isset($item['absensi_non_permanent']))--}}
        <button id="hapus" data-href='deleteabsensi/{{$content['tanggal']}}/{{$content['input_kelas']}}' data-toggle="modal" data-target="#confirm-delete" type="button" style="margin-right:15px"; name="hapus" class="btn btn-danger pull-right">Hapus Absensi</button>
        {{--@endif--}}
        <!-- <a href="deleteabsensi/{{$content['tanggal']}}/{{$content['input_kelas']}}" style="margin-right:15px"; class="btn btn-danger pull-right" title="Hapus"> Hapus Absensi</a> -->
    </div>
    </form>
    @endif 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
    function masuk(){console.log("asdasd")}$(document).ready(function(){$("#datetimePicker, #datetimePicker1").datepicker({format:"yyyy-mm-dd",autoclose:!0})});
</script>

<script type="text/javascript">
    $(function(){$("#datetimePicker").datepicker({format:"yyyy-mm-dd",autoclose:!0}),$("#tanggal").on("change",function(){var a=$(this).val();document.getElementById("caritanggal").value=a})});
</script>

<!-- Datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function(){$("#tableabsensi").dataTable({scrollY:350,scrollCollapse:!0,bPaginate:!1,bLengthChange:!1,bFilter:!0,bSort:!0,bInfo:!0,responsive:!0,bAutoWidth:!1,aoColumns:[{sWidth:"5%"},{sWidth:"5%"},{sWidth:"30%"},{sWidth:"15%"},{sWidth:"10%"},{sWidth:"10%"},{sWidth:"25%"}],aLengthMenu:[[-1],["Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Jumlah Siswa : _TOTAL_ siswa",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Siswa",sUrl:"",sZeroRecords:"Data tidak ditemukan"},aoColumnDefs:[{bSearchable:!1,aTargets:["no","nis","jkl","agama","status","keterangan"]},{bSortable:!1,aTargets:["agama","status","keterangan"]}]});var a=$("#tableabsensi").DataTable();$(".dataTables_filter input").unbind().bind("keyup",function(){var s="\\b"+this.value.toLowerCase()+"\\b";a.rows().search(s,!0,!1).draw()})});
</script>

<!-- <script type="text/javascript" src="js/modal.js"></script> -->

<!-- Enable/Disable Tombol Absensi -->
<script type="text/javascript">
    $(function(){
    var rowCount = $('#tableabsensi tbody tr').length;
    if(rowCount < 1){
        $('#simpan, #hapus').attr('disabled','disabled');
    } else {
        $('#simpan, #hapus').removeAttr('disabled');
    }
});
</script>
<!-- Enable/Disable Tombol Absensi -->

<!-- Hide/Show Tombol Absensi -->
<script type="text/javascript">
    function validate(){$("#kelasku").val()>0?($("#simpan, #hapus").show(),$("#tableabsensi").parents("div.dataTables_wrapper").first().show(),document.getElementById("infoMessage").style.display="none"):($("#simpan, #hapus").hide(),$("#tableabsensi").parents("div.dataTables_wrapper").first().hide(),document.getElementById("infoAbsensi").style.display="none")}$(document).ready(function(){validate(),$("#kelasku").change(validate)});      
</script>
<!-- Hide/Show Tombol Absensi -->
@endsection