@extends('layouts.app')

@section('css-tambahan')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />   
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('htmlheader_title')
    Cari Absensi
@endsection

@section('contentheader_title')
    Cari Data Absensi
@endsection

@section('contentheader_description')
    Cari Absensi Siswa
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Cari Absensi</h3>            
            <div style="margin-right:-15px; margin-top:-20px" class="form-group">
                <input id="caritanggal" type="hidden"/>
                <!-- <div class="col-sm-4 pull-right">
                    <input id="myInput" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa">
                </div>  
                <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-right">Cari Berdasarkan Nama:</label> -->   
                <!-- <label style="margin-right:-5px; margin-top:5px"  class="control-label pull-left">Cari Tanggal :</label> -->
                <button id="reset" type="button" style="margin-right:15px; margin-top:4px"; name="reset" class="btn btn-danger pull-right fa fa-close btn-xs" title="Reset Tanggal"></button>
                <div class="col-sm-2 pull-right">
                    <div class="input-group date" id="datetimePicker">
                        <input id="tanggal" type="text" name="tanggal" class="form-control tanggal input-sm" placeholder="Cari Tanggal">
                        <!-- <input type="text" name="tanggal" class="form-control tanggal input-sm"> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div>
                <!-- <button onclick="window.location.href = '?tanggal=' " type="button" style="margin-right:5px"; name="lihat" class="btn btn-info pull-left fa fa-search btn-sm" title="Lihat"></button> -->
                <!-- <button id="reset" onclick="myFunction()" type="button" style="margin-right:15px; margin-top:4px"; name="reset" class="btn btn-danger pull-left fa fa-close btn-xs" title="Reset Tanggal"></button> -->
            </div>
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablecariabsensi" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablecariabsensi_info">

            <thead>
                <tr>
                    <!-- <th class="no"><center>No</center></th> -->
                    <th class="tanggal">Tanggal</th>
                    <th class="nis">NIS</th>
                    <th>Nama Siswa</th>
                    <th class="jkl">Jenis Kelamin</th>
                    <th class="kelas">Kelas</th>
                    <th class="status">Status</th>
                    <th class="keterangan">Keterangan</th>
                </tr>
            </thead>
                                  
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
    $(document).ready(function() {
    oTable = $('#tablecariabsensi').DataTable({
        "scrollY": 400,
        "scrollCollapse": true,
        "processing": true,
        "serverSide": true,
        "ajax": "{{ route('cariabsensi.data') }}",
        "columns": [
          { data: 'date' , name: 'absensi.date' , sWidth: '10%' },
          { data: 'nis' , name: 'siswa.nis' , sWidth: '5%' , searchable: false },
          { data: 'nama' , name: 'siswa.nama' , sWidth: '25%' },
          { data: 'jkl' , name: 'siswa.jkl' , sWidth: '15%' },
          { data: 'nama_kelas' , name: 'kelas.nama_kelas' , sWidth: '11%' ,  className: "text-center" , orderable: false , searchable: false },
          { data: 'status' , name: 'absensi.status' , sWidth: '9%' , searchable: false },
          { data: 'description' , name: 'absensi.description' , sWidth: '25%' , orderable: false , searchable: false }
        ],
        "responsive": true,
        "bAutoWidth": false,
        "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
        "oLanguage": {
            sEmptyTable: "Belum ada data dalam tabel ini",
            sInfo: "Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",
            sInfoEmpty: "Menampilkan 0 to 0 of 0 data",
            sInfoFiltered: "",
            sInfoPostFix: "",
            sDecimal: "",
            sThousands: ",",
            sLengthMenu: "Tampilkan _MENU_ data",
            sLoadingRecords: "Loading...",
            sProcessing: "Processing...",
            sSearch: "Cari:",
            sSearchPlaceholder: "Nama Siswa",
            sUrl: "",
            sZeroRecords: "Data tidak ditemukan"
            },
            "dom": "<'row'<'col-md-5'l><'col-md-2'B><'col-md-5'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>", 
            "buttons": [ {
                "extend": 'excelHtml5',
                "text": 'Export Excel',
                "title": 'Document',
                "exportOptions": {
                    // columns: [ 0, 1, 2 ],
                    columns: ':visible',
                    // columns: ':not(.no-print)',
                    // rows: ':visible',
                    modifier: {
                        page: 'current'
                    },
                },
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                }
            } ],
        });
    });
    // $(function(){$("#tablecariabsensi").dataTable({scrollY:400,scrollCollapse:!0,bPaginate:!0,bLengthChange:!0,bFilter:!0,bSort:!0,bInfo:!0,responsive:!0,bAutoWidth:!1,aoColumns:[{sWidth:"10%"},{sWidth:"5%"},{sWidth:"25%"},{sWidth:"15%"},{sWidth:"11%"},{sWidth:"9%"},{sWidth:"25%"}],aLengthMenu:[[10,25,50,100,-1],[10,25,50,100,"Semua"]],oLanguage:{sEmptyTable:"Belum ada data dalam tabel ini",sInfo:"Menampilkan _START_ sampai _END_ data dari _TOTAL_ data",sInfoEmpty:"Menampilkan 0 to 0 of 0 data",sInfoFiltered:"",sInfoPostFix:"",sDecimal:"",sThousands:",",sLengthMenu:"Tampilkan _MENU_ data",sLoadingRecords:"Loading...",sProcessing:"Processing...",sSearch:"Cari:",sSearchPlaceholder:"Nama Siswa",sUrl:"",sZeroRecords:"Data tidak ditemukan"},aoColumnDefs:[{bSearchable:!1,aTargets:["no","nis","jkl","agama","kelas","status","keterangan"]},{bSortable:!1,aTargets:["jkl","keterangan"]}],dom:"<'row'<'col-md-5'l><'col-md-2'B><'col-md-5'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",buttons:[{extend:"excelHtml5",text:"Export Excel",title:"Document",exportOptions:{columns:":visible",modifier:{page:"current"}},customize:function(a){a.xl.worksheets["sheet1.xml"]}}]})});
</script>

<!-- Export Excel -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<!-- <script type="text/javascript" src="js/modal.js"></script> -->

<!-- CARI ABSENSI BERDASAR TANGGAL -->
<script type="text/javascript">
    $(document).ready(function(){var a=$("#tablecariabsensi").DataTable();$("#tanggal").on("change",function(){var n=$(this).val();""!=$("#caritanggal").val()?a.columns(0).search(n,!0,!1).draw():a.columns(0).search("",!0,!1).draw()})});
</script>
<!-- CARI ABSENSI BERDASAR TANGGAL -->

<!-- TOMBOL RESET CARI TANGGAL -->
<script type="text/javascript">
    $("#reset").click(function(){
    $('#datetimePicker').data('datepicker').setDate(null);
});
</script>
<!-- TOMBOL RESET CARI TANGGAL -->
@endsection