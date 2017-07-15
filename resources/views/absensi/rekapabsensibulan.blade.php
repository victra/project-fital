@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />   
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/bootstrap.datepicker-fork/1.3.0/css/datepicker3.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Rekap Absensi (Bulan)
@endsection

@section('contentheader_title')
    Rekap Absensi Siswa
@endsection

@section('contentheader_description')
    Rekap perBulan
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

@if(Session::has('info_message'))
    <div id="infoMessage" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><em> {!! session('info_message') !!}</em><a class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
@endif

@if(Session::has('info_rekap'))
    <div id="infoRekap" class="alert alert-info"><span class="glyphicon glyphicon-info-sign"></span><em> {!! session('info_rekap') !!}</em><a class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Rekap Absensi Per Bulan</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <!-- Pilih Tahun -->
                <!-- <form style="margin-right:20px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" name="tahun" onchange="location = '?search_kelas={{$content['input_kelas']}}&bulan={{$content['input_bulan']}}&tahun='+this.value;">
                        <option value="">-Pilih Tahun-</option>
                        @foreach($content['tahun'] as $key => $value)
                        <?php $selected = $content['input_tahun']==$key ? 'selected' : '' ?>
                            <option {{$selected}} value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px" class="control-label pull-right">Tahun :</label> -->

                <!-- Pilih Bulan -->
                <form style="margin-right:20px; margin-top:0px" class="pull-right">
                    <!-- <select id="bulanku" class="form-control input-sm" name="bulan" onchange="location = '?search_kelas={{$content['input_kelas']}}&bulan='+this.value+'&tahun={{$content['input_tahun']}}';"> -->
                    <select id="bulanku" class="form-control input-sm" name="bulan" onchange="location = '?search_kelas={{$content['input_kelas']}}&bulan='+this.value;">
                        <option value="">-Pilih Bulan-</option>
                        @foreach($content['bulan'] as $key => $value)
                        <?php $selected = $content['input_bulan']==$key ? 'selected' : '' ?>
                            <option {{$selected}} value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Bulan :</label>

                <!-- Pilih Kelas -->
                <form style="margin-right:50px; margin-top:0px" class="pull-right">
                    <!-- <select class="form-control input-sm" onchange="location = this.value+'&bulan={{$content['input_bulan']}}&tahun={{$content['input_tahun']}}';"> -->
                    <select class="form-control input-sm" onchange="location = this.value+'&bulan={{$content['input_bulan']}}';">
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
                    <td><center>{{$item->sakitb}}</center></td>
                    <td><center>{{$item->izinb}}</center></td>
                    <td><center>{{$item->alpab}}</center></td>
                    <td><center>{{$item->totalb}}</center></td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->
    @endif
    <div class="box-foot">
        <div class="col-lg-2 pull-right">
            <input type="hidden" disabled class="form-control" value="{{$content['input_bulan']}}">
        </div>
    </div>
            <input id="kelasku" type="hidden" name="kelas" value="{{$content['input_kelas']}}">     
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
    function masuk(){console.log("asdasd")}$(document).ready(function(){$("#datetimePicker, #datetimePicker1").datepicker({format:"yyyy-mm-dd",autoclose:!0})});
</script>

<script type="text/javascript">
    $(function(){$("#datetimePicker").datepicker({format:"yyyy-mm-dd",autoclose:!0}),$("#tanggal").on("change",function(){var a=$(this).val();document.getElementById("caritanggal").value=a})});
</script>

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(function(){$("#tablerekap").dataTable({scrollY:400,scrollCollapse:!0,bPaginate:!0,bLengthChange:!0,bFilter:!0,bSort:!0,bInfo:!0,responsive:!0,bAutoWidth:!1,aoColumns:[{sWidth:"8%"},{sWidth:"30%"},{sWidth:"15%"},{sWidth:"15%"},{sWidth:"8%"},{sWidth:"8%"},{sWidth:"8%"},{sWidth:"8%"}],aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Siswa",sUrl:"",sZeroRecords:"Data tidak ditemukan"},aoColumnDefs:[{bSearchable:!1,aTargets:["nis","jkl","kelas","sakit","izin","alpa","total"]},{bSortable:!1,aTargets:["kelas"]}],dom:"<'row'<'col-md-5'l><'col-md-2'B><'col-md-5'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",buttons:[{extend:"excelHtml5",text:"Export Excel",title:"Document",exportOptions:{columns:":visible",modifier:{page:"current"}},customize:function(a){a.xl.worksheets["sheet1.xml"]}}]});var a=$("#tablerekap").DataTable();$(".dataTables_filter input").unbind().bind("keyup",function(){var e="\\b"+this.value.toLowerCase()+"\\b";a.rows().search(e,!0,!1).draw()})});
</script>

<!-- Export Excel -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<!-- <script type="text/javascript" src="js/modal.js"></script> -->

<!-- Hide/Show Datatable Rekap Absensi -->
<script type="text/javascript">
    function validate(){""!=$("#kelasku").val()?($("#tablerekap").parents("div.dataTables_wrapper").first().show(),document.getElementById("infoMessage").style.display="none"):($("#tablerekap").parents("div.dataTables_wrapper").first().hide(),document.getElementById("infoRekap").style.display="none")}$(document).ready(function(){validate(),$("#kelasku").change(validate)});        
</script>
<!-- Hide/Show Datatable Rekap Absensi -->
@endsection