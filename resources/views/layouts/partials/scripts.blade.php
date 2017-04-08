<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<!-- <script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- <script type="text/javascript">
    $(document).ready(function () {
      $('#datetimePicker').datepicker();
        // $('.tanggal').datepicker({
        //     format: "dd-mm-yyyy",
        //     autoclose:true
        // });
        autoclose:true
    });
</script> -->
<script src="{{ asset('/js/moment.js') }}" type="text/javascript"></script>

<!-- Datetimepicker -->
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#datetimePicker, #datetimePicker1').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
    });

    function masuk()
    {
      console.log('asdasd');
    }
</script>

<script type="text/javascript">
    $(function() {
    $('#datetimePicker').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
    // $('#tanggal').datepicker();
    $('#tanggal').on("change",function(){
        var selected = $(this).val();
        document.getElementById("caritanggal").value = selected;
    });
});
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script type="text/javascript" src="js/guru.js"></script>
<script type="text/javascript" src="js/kelas.js"></script>
<script type="text/javascript" src="js/siswa.js"></script>
<script type="text/javascript" src="js/infosiswa.js"></script>
<script type="text/javascript" src="js/semester.js"></script>
<script type="text/javascript" src="js/profil.js"></script>
<script type="text/javascript" src="js/piket.js"></script>

<!-- PERCOBAAN INFO DETAIL TELEK -->
<!-- <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[2];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
} );
</script> -->
<!-- PERCOBAAN INFO DETAIL SISWA -->

<!-- Datatables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<!-- TableTools -->
<script src="{{ asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="{{ asset('/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>

<!-- ======================================================================================================= -->
<!--                                   PENGATURAN DATATABLE DI BAWAH INI                                     -->
<!-- ======================================================================================================= -->

<!-- Pengaturan Datatables -->
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#tablesiswa').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '10%' }, //nis
              { sWidth: '32%' }, //nama
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '10%' }, //agama
              { sWidth: '15%' }, //kelas
              { sWidth: '13%' }, //action
              { sWidth: '0%' },
              { sWidth: '0%' },
              { sWidth: '0%' },
              { sWidth: '0%' },
              { sWidth: '0%' },
              { sWidth: '0%' },
            ],
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

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","nis","agama","jkl","kelas","none" ]},
              {"bSortable" : false, "aTargets" : [ "no-expor" ]} 
            ],
            // "sDom": 'T<"clear">lfrtip',
            // "oTableTools": {
            // "sSwfPath": "{{ asset('/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}",
            // "aButtons": [
            //         {
            //           "sExtends": "xls",
            //           "sButtonText": "Save as Excel",
            //           "sFileName": "file.xls",
            //           "mColumns": function (settings) {
            //              var api = new $.fn.dataTable.Api( settings );
            //              return api.columns(":not(.no-export)").indexes().toArray();
            //           }
            //         }
            //     ]
            // }

        });
        $('#tableuser').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '20%' }, //nip
              { sWidth: '30%' }, //nama
              { sWidth: '0%' },
              { sWidth: '15%' }, //role
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '10%' }, //agama           
              { sWidth: '0%' },              
              { sWidth: '5%' }, //action
            ],
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
                sSearchPlaceholder: "Nama User",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },
            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","nip","jkl","agama","role","none" ]},
              {"bSortable" : false, "aTargets" : [ "agama","action" ]} 
            ],
        });
        $('#tablegurupiket').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '7%' }, //hari
              { sWidth: '20%' }, //nip
              { sWidth: '25%' }, //nama
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '10%' }, //agama
              { sWidth: '13%' }, //telepon
              { sWidth: '5%' }, //action
            ],
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
                sSearchPlaceholder: "Nama Guru Piket",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },
            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","hari","nip","jkl","agama","tlp" ]},
              {"bSortable" : false, "aTargets" : [ "agama","action" ]} 
            ],
        });
        $('#tablegurupiketguest').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '10%' }, //hari
              { sWidth: '20%' }, //nip
              { sWidth: '25%' }, //nama
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '10%' }, //agama
              { sWidth: '15%' }, //telepon
            ],
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
                sSearchPlaceholder: "Nama Guru Piket",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },
            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","hari","nip","jkl","agama","tlp" ]},
              {"bSortable" : false, "aTargets" : [ "agama","action" ]} 
            ],
        });
        $('#tablekelas').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '15%' }, //nama kelas
              { sWidth: '25%' }, //jurusan
              // { sWidth: '15%' }, //tahun ajaran
              { sWidth: '30%' }, //wali kelas
              { sWidth: '5%' }, //laki
              { sWidth: '5%' }, //perempuan
              { sWidth: '10%' }, //total
              { sWidth: '5%' }, //action
            ],
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
                sSearchPlaceholder: "Nama Kelas",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","jurusan","thn_ajaran","walikelas","laki","perempuan","total" ]},
              {"bSortable" : false, "aTargets" : [ "thn_ajaran","walikelas","no-export" ]} 
            ],
        });
        $('#tableguestkelas').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '20%' }, //nama kelas
              { sWidth: '25%' }, //jurusan
              // { sWidth: '15%' }, //tahun ajaran
              { sWidth: '30%' }, //wali kelas
              { sWidth: '5%' }, //laki
              { sWidth: '5%' }, //perempuan
              { sWidth: '10%' }, //total
            ],
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
                sSearchPlaceholder: "Nama Kelas",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","jurusan","thn_ajaran","walikelas","laki","perempuan","total" ]},
              {"bSortable" : false, "aTargets" : [ "thn_ajaran","walikelas","no-export" ]} 
            ],
        });
        $('#tableabsensi').dataTable({
            "scrollY": 350,
            "scrollCollapse": true,
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '5%' }, //nis
              { sWidth: '30%' }, //nama siswa
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '10%' }, //agama
              { sWidth: '10%' }, //status
              { sWidth: '25%' }, //keterangan
            ],
            "aLengthMenu": [[-1], ["Semua"]],
            "oLanguage": {
                sEmptyTable: "Belum ada data dalam tabel ini",
                sInfo: "Jumlah Siswa : _TOTAL_ siswa",
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

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","nis","jkl","agama","status","keterangan" ]},
              {"bSortable" : false, "aTargets" : [ "agama","status","keterangan" ]} 
            ],
        });
        $('#tablecariabsensi').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              // { sWidth: '5%' }, //no
              { sWidth: '10%' }, //tanggal
              { sWidth: '5%' }, //no
              { sWidth: '25%' }, //nama siswa
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '11%' }, //kelas
              { sWidth: '9%' }, //status
              { sWidth: '25%' }, //keterangan
            ],
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

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","nis","jkl","agama","kelas","status","keterangan" ]},
              {"bSortable" : false, "aTargets" : [ "jkl","keterangan" ]} 
            ],
        });
        $('#tablerekaphari').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '15%' }, //nama kelas
              { sWidth: '8%' }, //jumlah siswa
              { sWidth: '8%' }, //sakit
              { sWidth: '8%' }, //izin
              { sWidth: '8%' }, //alpa
              { sWidth: '8%' }, //total
              { sWidth: '40%' }, //keterangan
            ],
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
                sSearchPlaceholder: "Nama Kelas",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","sakit","izin","alpa","total","ket" ]},
              {"bSortable" : false, "aTargets" : [ "ket" ]} 
            ],
        });
        $('#tablerekapminggu').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '10%' }, //nis
              { sWidth: '30%' }, //nama
              { sWidth: '15%' }, //jkl
              // { sWidth: '15%' }, //kelas
              { sWidth: '9%' }, //sakit
              { sWidth: '9%' }, //izin
              { sWidth: '9%' }, //alpa
              { sWidth: '9%' }, //total
              { sWidth: '9%' }, //info
            ],
            // "rowCallback": function( row, data, index ) {
            //   if ( data[1] == "AHOK" ) {
            //     $( row ).css( "background-color", "Red" );
            //   }
            // },
            // "createdRow": function( row, data, dataIndex ) {
            //   if ( data[1] == "AHOK" ) {
            //     $( row ).css( "background-color", "Red" );
            //   }
            // },
            // "rowCallback": function( row, data, dataIndex ) {
            //     if ( data[1] == "AHOK" ) {
            //         $( row ).css( "background-color", "Red" );
            //         // $( row ).addClass( "warning" );
            //     }
            //     else {
            //         $( row ).css( "background-color", "Blue" );
            //         // $( row ).addClass( "warning" );
            //     }
            // },
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

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "nis","jkl","kelas","sakit","izin","alpa","total","infoa" ]},
              {"bSortable" : false, "aTargets" : [ "kelas" ]} 
            ],
        });
        $('#tablerekap').dataTable({
            "scrollY": 400,
            "scrollCollapse": true,
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '10%' }, //nis
              { sWidth: '35%' }, //nama
              { sWidth: '15%' }, //jkl
              // { sWidth: '15%' }, //kelas
              { sWidth: '9%' }, //sakit
              { sWidth: '9%' }, //izin
              { sWidth: '9%' }, //alpa
              { sWidth: '13%' }, //total
            ],            
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

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "nis","jkl","kelas","sakit","izin","alpa","total" ]},
              {"bSortable" : false, "aTargets" : [ "kelas" ]}
            ],
        });
        $('#tablesemester').dataTable({
            "bPaginate": false,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": true,
            "bInfo": false,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '40%' }, //semester
              { sWidth: '25%' }, //tgl awal
              { sWidth: '25%' }, //tgl akhir
              { sWidth: '5%' }, //action
            ],
        });
        $('#tableguestsemester').dataTable({
            "bPaginate": false,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //no
              { sWidth: '45%' }, //semester
              { sWidth: '25%' }, //tgl awal
              { sWidth: '25%' }, //tgl akhir
            ],
        });
        $('#examplee').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "responsive": true,
            // "bAutoWidth": true,
            // pengaturan lebar kolom
            "bAutoWidth": false,
            "aoColumns" : [
              { sWidth: '5%' }, //nis
              { sWidth: '30%' }, //nama
              { sWidth: '15%' }, //jkl
              { sWidth: '15%' }, //kelas
              { sWidth: '5%' }, //sakit
              { sWidth: '5%' }, //izin
              { sWidth: '5%' }, //alpa
              { sWidth: '10%' }, //total
              { sWidth: '10%' }, //info
            ],
        });
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            // pengaturan lebar kolom
            // "bAutoWidth": false,
            // "aoColumns" : [
            //   { sWidth: '5%' },
            //   { sWidth: '15%' },
            //   { sWidth: '25%' },
            //   { sWidth: '15%' },
            //   { sWidth: '15%' },
            //   { sWidth: '15%' },
            //   { sWidth: '10%' }
            // ],
            // "aLengthMenu": [[25, 50, 100, 250, 500, -1], [25, 50, 100, 250, 500, "All"]],
            // "oLanguage": {
            //     sEmptyTable: "Belum ada data dalam tabel ini",
            //     sInfo: "Menampilkan _START_ sampai _END_ data _TOTAL_ data",
            //     sInfoEmpty: "Menampilkan 0 to 0 of 0 data",
            //     sInfoFiltered: "(filtered from _MAX_ total data)",
            //     sInfoPostFix: "",
            //     sDecimal: "",
            //     sThousands: ",",
            //     sLengthMenu: "Tampilkan _MENU_ data",
            //     sLoadingRecords: "Loading...",
            //     sProcessing: "Processing...",
            //     sSearch: "Cari:",
            //     sSearchPlaceholder: "",
            //     sUrl: "",
            //     sZeroRecords: "Tidak ditemukan"
            //     },

            // kolom dengan class "iii" tidak ada fitur sorting
            // "aoColumnDefs" : [ 
            //   {"bSearchable" : false, "aTargets" : [ "no","jkl","agm" ]},
            //   {"bSortable" : false, "aTargets" : [ "nis","jkl","no" ]} 
            // ],
            "sDom": 'T<"clear">lfrtip',
            "oTableTools": {
            "sSwfPath": "{{ asset('/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}",
            "aButtons": [
                    {
                      "sExtends": "xls",
                      "sButtonText": "Save as Excel",
                      "sFileName": "file.xls",
                      "mColumns": function (settings) {
                         var api = new $.fn.dataTable.Api( settings );
                         return api.columns(":not(.no-export)").indexes().toArray();
                      }
                    }
                ]
            }

        });
        $('#example3').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
        });
          // coba-coba
            var table = $('#example4').DataTable();
            
            // #myInput is a <input type="text"> element
            $('#myInput').on( 'keyup', function () {              
                table.search( this.value ).draw();
                // pencarian exact match
                // var term = $(this).val(),
                // regex = '\\b' + term + '\\b';
                // table.search(regex, true, false).draw();
            });

    });            
</script>
<!-- Pengaturan Datatables -->

<!-- ======================================================================================================= -->
<!--                                    PENGATURAN DATATABLE DI ATAS INI                                     -->
<!-- ======================================================================================================= -->

<!-- CARI ABSENSI BERDASAR TANGGAL -->
<script type="text/javascript">
    $(document).ready(function (){
    var table = $('#tablecariabsensi').DataTable();

    $("#tanggal").on("change",function(){
        
     var _val = $(this).val();
     var i = $("#caritanggal").val();     
     if(i != ''){  
            table
            .columns(0)
            .search(_val, true, false)
            .draw();
      }else{  
            table
            .columns(0)
            .search('', true, false)
            .draw();
      }
    });

    });
</script>
<!-- CARI ABSENSI BERDASAR TANGGAL -->

<!-- TOMBOL RESET CARI TANGGAL -->
<script type="text/javascript">
    $("#reset").click(function(){
    $('#datetimePicker').data('datepicker').setDate(null);
});
</script>
<!-- TOMBOL RESET CARI TANGGAL -->

<!-- Ambil Tanggal Per Minggu untuk Rekap Absensi Per Minggu -->
<!-- <script type="text/javascript">
    $('.dari').change(function() {
    var date2 = $('.dari').datepicker('getDate', '+7d'); 
    date2.setDate(date2.getDate()+7); 
    $('.sampai').datepicker('setDate', date2);
});
</script> -->
<!-- Ambil Tanggal Per Minggu untuk Rekap Absensi Per Minggu -->

<!-- <script type="text/javascript">
    $("#reset").on("click", function() {
    // if ($(this).val() != "")
        // $("#tanggal").val("")
        // $('input[type="text"]').val('');
        document.getElementById("tanggal").empty();
});
</script> -->

<!-- reset form modal tambah siswa -->
<!-- <script type="text/javascript">
    $('#myModal1').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end()
    .find("input[type=hidden]")
       .val('{{{ csrf_token() }}}')
       .end();
})
</script> -->

<!-- AUTOFOCUS INPUTAN DI FORM MODAL -->
<script type="text/javascript">
  $('#ModalTambahSiswa, #ModalTambahKelas, #ModalTambahGuru').on('shown.bs.modal', function () {
    $('#nis').focus();
    $('#nama_kelas').focus();
    $('#nip').focus();
})
</script>
<!-- AUTOFOCUS INPUTAN DI FORM MODAL -->

<!-- CENTER MODAL DIALOG -->
<script>
function centerModals(){
  $('.modal').each(function(i){
  var $clone = $(this).clone().css('display', 'block').appendTo('body');
  var top = Math.round(($clone.height() - $clone.find('.modal-content').height()) / 2);
  top = top > 0 ? top : 0;
  $clone.remove();
  $(this).find('.modal-content').css("margin-top", top);
  });
}
$('.modal').on('show.bs.modal', centerModals);
$(window).on('resize', centerModals);
</script>
<!-- CENTER MODAL DIALOG -->

<!-- <script type="text/javascript">
  $('#ModalTambahSiswa').on('shown.bs.modal', function() {
    $('#TambahSiswa').bootstrapValidator('resetForm', true);
});
</script> -->

<!-- JADWAL PIKET -->
<script type="text/javascript">
  document.getElementById('role').addEventListener('change', function () {
      var style = this.value == 'guru piket' ? 'block' : 'none';
      document.getElementById('hidden_div').style.display = style;
  });
</script>

<script type="text/javascript">
  document.getElementById('role_ubah').addEventListener('change', function () {
      var style = this.value == 'guru piket' ? 'block' : 'none';
      document.getElementById('hidden_div_ubah').style.display = style;
  });
</script>
<!-- JADWAL PIKET -->

<!-- RESET FORM MODAL -->
<script type="text/javascript">
    $('[data-dismiss=modal]').on('click', function (e) {
    // $("#TambahSiswa, #UbahSiswa, #TambahGuru, #UbahGuru").data('bootstrapValidator').resetForm();
    $('#TambahSiswa, #UbahSiswa, #TambahGuru, #UbahGuru, #TambahKelas, #UbahKelas, #UbahPassword, #UbahSemester, #UbahProfil').bootstrapValidator("resetForm",true);
    $('#siswa').bootstrapValidator("resetUl",true);          
    var $t = $(this),
        target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];
    
  $(target)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end()
    .find("input[type=hidden]")
       .val('{{{ csrf_token() }}}')
       .end();;
  // tambahan jadwal piket
  document.getElementById('hidden_div').style.display = 'none';
  document.getElementById('hidden_div_ubah').style.display = 'none';
})
</script>
<!-- RESET FORM MODAL -->

<!-- MODAL KONFIRMASI HAPUS DATA -->
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>
<!-- MODAL KONFIRMASI HAPUS DATA -->

<!-- ======================================================================================================= -->
<!--                                 VALIDASI SEMUA FORM ADA DI BAWAH SINI                                   -->
<!-- ======================================================================================================= -->

<!-- BOOTSTRAP VALIDATOR -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js" type="text/javascript"></script> -->
<script src="{{ asset('/js/bootstrapValidator.js') }}" type="text/javascript"></script>
<!-- BOOTSTRAP VALIDATOR -->

<!-- VALIDASI FORM UBAH PASSWORD-->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#UbahPassword').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      current_password: {
        validators: {
          notEmpty: {
            message: "Password lama harus diisi"
          },
          remote: {
            url: "{{ URL::to('/checkPassword') }}",
              data: function(validator) {
                return {
                    current_password: validator.getFieldElements('current_password').val()
                };
            },
            message: 'Password yang anda masukkan salah'
          }
        }
      },

      new_password: {
        validators: {
          notEmpty: {
            message: "Password baru harus diisi"
          },          
          stringLength: {
            min: 6,
            max: 50,
            message: "Password baru antara 6-50 karakter"
          },
        }
      },

      password_confirmation: {
        validators: {
          notEmpty: {
            message: "Password konfirmasi harus diisi"
          },
          identical: {
            field: "new_password",
            message: "Password konfirmasi tidak sama dengan password baru"
          }
        }
      }
    }
  });
});
</script>
<!-- VALIDASI FORM UBAH PASSWORD-->

<!-- VALIDASI FORM UBAH SEMESTER -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#UbahSemester').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      tgl_awal: {
        validators: {
          notEmpty: {
            message: "Tanggal awal harus diisi"
          }
        }
      },

      tgl_akhir: {
        validators: {
          notEmpty: {
            message: "Tanggal akhir harus diisi"
          }
        }
      },
    }
  });
});
</script>
<!-- VALIDASI FORM UBAH SEMESTER -->

<!-- VALIDASI FORM TAMBAH SISWA -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalTambahSiswa').modal('hide');
  var validator = $('#TambahSiswa').bootstrapValidator({
    excluded: [':disabled'],
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nis: {
        validators: {
          notEmpty: {
            message: "NIS harus diisi"
          },          
          stringLength: {
            max: 10,
            message: "NIS maksimal 10 karakter"
          },
          remote: {
            url: "{{ URL::to('/checkNIS') }}",
              data: function(validator) {
                return {
                    nis: validator.getFieldElements('nis').val()
                };
            },
            message: 'NIS sudah ada'
          }
        }
      },

      nama: {
        validators: {
          notEmpty: {
            message: "Nama harus diisi"
          },          
          stringLength: {
            max: 50,
            message: "Nama maksimal 50 karakter"
          },       
        }
      },

      jkl: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      kelas: {
        validators: {
          notEmpty: {
            message: "Kelas harus diisi"
          }
        }
      },

      tlp_siswa: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Telepon is required"
          // },
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      },

      alamat_siswa: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Nama harus diisi"
          // },          
          stringLength: {
            max: 70,
            message: "Alamat maksimal 70 karakter"
          },       
        }
      },

      nama_ayah: {
        validators: {
          notEmpty: {
            message: "Nama Ayah harus diisi"
          },          
          stringLength: {
            min: 3,
            max: 50,
            message: "Nama Ayah antara 3-50 karakter"
          },       
        }
      },

      nama_ibu: {
        validators: {
          notEmpty: {
            message: "Nama Ibu harus diisi"
          },          
          stringLength: {
            min: 3,
            max: 50,
            message: "Nama Ibu antara 3-50 karakter"
          },       
        }
      },

      tlp_ortu: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Telepon is required"
          // },
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      },

      alamat_ortu: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Nama harus diisi"
          // },          
          stringLength: {
            max: 70,
            message: "Alamat maksimal 70 karakter"
          },       
        }
      },


    }
  })
  // tambah feedback icon pada tab modal
  .on('status.field.bv', function(e, data) {
            var $form     = $(e.target),
                validator = data.bv,
                $tabPane  = data.element.parents('.tab-pane'),
                tabId     = $tabPane.attr('id');
            
            if (tabId) {
                var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');

                // Add custom class to tab containing the field
                if (data.status == validator.STATUS_INVALID) {
                    $icon.removeClass('fa-check').addClass('fa-times');
                } else if (data.status == validator.STATUS_VALID) {
                    var isValidTab = validator.isValidContainer($tabPane);
                    $icon.removeClass('fa-check fa-times')
                         .addClass(isValidTab ? 'fa-check' : 'fa-times');
                } else {
                    $icon.removeClass('fa-check fa-times');                  
                }
            }
        })

  // hilangkan feedback icon pada field yang kosong
  .on('keyup', '[name="jkl"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'jkl', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'jkl')
      }
  })
  .on('keyup', '[name="agama"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'agama', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'agama')
      }
  })
  .on('keyup', '[name="tlp_siswa"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahSiswa')
             .bootstrapValidator('enableFieldValidators', 'tlp_siswa', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahSiswa').bootstrapValidator('validateField', 'tlp_siswa')
      }
  })
  .on('keyup', '[name="alamat_siswa"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahSiswa')
             .bootstrapValidator('enableFieldValidators', 'alamat_siswa', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahSiswa').bootstrapValidator('validateField', 'alamat_siswa')
      }
  })
  .on('keyup', '[name="tlp_ortu"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahSiswa')
             .bootstrapValidator('enableFieldValidators', 'tlp_ortu', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahSiswa').bootstrapValidator('validateField', 'tlp_ortu')
      }
  })
  .on('keyup', '[name="alamat_ortu"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahSiswa')
             .bootstrapValidator('enableFieldValidators', 'alamat_ortu', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahSiswa').bootstrapValidator('validateField', 'alamat_ortu')
      }
  });
});
</script>
<!-- VALIDASI FORM TAMBAH SISWA -->

<!-- VALIDASI FORM UBAH SISWA -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalUbahSiswa').modal('hide');
  var validator = $('#UbahSiswa').bootstrapValidator({
    excluded: [':disabled'],
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nis: {
        validators: {
          notEmpty: {
            message: "NIS harus diisi"
          },          
          stringLength: {
            max: 10,
            message: "NIS maksimal 10 karakter"
          },
          remote: {
            url: "{{ URL::to('/checkNISUbah') }}",
              data: function(validator) {
                return {
                    nis: validator.getFieldElements('nis').val(),
                    id: validator.getFieldElements('id').val()
                };
            },
            message: 'NIS sudah ada'
          }
        }
      },

      nama: {
        validators: {
          notEmpty: {
            message: "Nama harus diisi"
          },          
          stringLength: {
            max: 50,
            message: "Nama maksimal 50 karakter"
          },       
        }
      },

      jkl: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Agama hraus diisi"
          }
        }
      },

      kelas: {
        validators: {
          notEmpty: {
            message: "Kelas harus diisi"
          }
        }
      },

      tlp_siswa: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Telepon is required"
          // },
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      },

      alamat_siswa: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Nama harus diisi"
          // },          
          stringLength: {
            max: 70,
            message: "Alamat maksimal 70 karakter"
          },       
        }
      },

      nama_ayah: {
        validators: {
          notEmpty: {
            message: "Nama Ayah harus diisi"
          },          
          stringLength: {
            max: 50,
            message: "Nama Ayah maksimal 50 karakter"
          },       
        }
      },

      nama_ibu: {
        validators: {
          notEmpty: {
            message: "Nama Ibu harus diisi"
          },          
          stringLength: {
            max: 50,
            message: "Nama Ibu maksimal 50 karakter"
          },       
        }
      },

      tlp_ortu: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Telepon is required"
          // },
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      },

      alamat_ortu: {
        enabled: false,
        validators: {
          // notEmpty: {
          //   message: "Nama harus diisi"
          // },          
          stringLength: {
            max: 70,
            message: "Alamat maksimal 70 karakter"
          },       
        }
      },


    }
  })
  // tambah feedback icon pada tab modal
  .on('status.field.bv', function(e, data) {
            var $form     = $(e.target),
                validator = data.bv,
                $tabPane  = data.element.parents('.tab-pane'),
                tabId     = $tabPane.attr('id');
            
            if (tabId) {
                var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');

                // Add custom class to tab containing the field
                if (data.status == validator.STATUS_INVALID) {
                    $icon.removeClass('fa-check').addClass('fa-times');
                } else if (data.status == validator.STATUS_VALID) {
                    var isValidTab = validator.isValidContainer($tabPane);
                    $icon.removeClass('fa-check fa-times')
                         .addClass(isValidTab ? 'fa-check' : 'fa-times');
                } else {
                    $icon.removeClass('fa-check fa-times');                  
                }
            }
        })

  .on('keyup', '[name="jkl"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'jkl', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'jkl')
      }
  })
  .on('keyup', '[name="agama"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'agama', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'agama')
      }
  })
  .on('keyup', '[name="tlp_siswa"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'tlp_siswa', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'tlp_siswa')
      }
  })
  .on('keyup', '[name="alamat_siswa"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'alamat_siswa', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'alamat_siswa')
      }
  })
  .on('keyup', '[name="tlp_ortu"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'tlp_ortu', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'tlp_ortu')
      }
  })
  .on('keyup', '[name="alamat_ortu"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahSiswa')
             .bootstrapValidator('enableFieldValidators', 'alamat_ortu', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahSiswa').bootstrapValidator('validateField', 'alamat_ortu')
      }
  });
});
</script>
<!-- VALIDASI FORM UBAH SISWA -->

<!-- VALIDASI FORM TAMBAH GURU -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalTambahGuru').modal('hide');
  var validator = $('#TambahGuru').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nip: {
        validators: {
          notEmpty: {
            message: "NIP harus diisi"
          },
          stringLength: {
            max: 25,
            message: "NIP maksimal 25 karakter"
          },
          remote: {
            url: "{{ URL::to('/checkNIP') }}",
              data: function(validator) {
                return {
                    nis: validator.getFieldElements('nip').val()
                };
            },
            message: 'NIP sudah ada'
          }
        }
      },

      nama: {
        validators: {
          notEmpty: {
            message: "Nama harus diisi"
          },
          stringLength: {
            max: 50,
            message: "Nama maksimal 50 karakter"
          }
        }
      },

      username: {
        validators: {
          notEmpty: {
            message: "Username harus diisi"
          },
          stringLength: {
            min: 5,
            message: "Username minimal 5 karakter"
          },
          regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'The username can only consist of alphabetical, number, dot and underscore'
          },
          remote: {
            url: "{{ URL::to('/checkUsername') }}",
              data: function(validator) {
                return {
                    username: validator.getFieldElements('username').val(),
                    nama: validator.getFieldElements('nama').val()
                };
            },
            message: 'Username sudah ada'
          }
        }
      },

      password: {
        validators: {
          notEmpty: {
            message: "Password harus diisi"
          },
          stringLength: {
            min: 5,
            message: "Password minimal 5 karakter"
          },
          different: {
            field: "username",
            message: "Username dan password tidak boleh sama"
          }
        }
      },

      role: {
        validators: {
          notEmpty: {
            message: "Role harus diisi"
          }
        }
      },

      jadwal: {
        validators: {
          notEmpty: {
            message: "Jadwal harus diisi"
          }
        }
      },

      jkl: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      tlp: {
        enabled: false,
        validators: {
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      }
      
    }
  })
  .on('keyup', '[name="jkl"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahGuru')
             .bootstrapValidator('enableFieldValidators', 'jkl', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahGuru').bootstrapValidator('validateField', 'jkl')
      }
  })
  .on('keyup', '[name="agama"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahGuru')
             .bootstrapValidator('enableFieldValidators', 'agama', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahGuru').bootstrapValidator('validateField', 'agama')
      }
  })
  .on('keyup', '[name="tlp"]', function () {
      var isEmpty = $(this).val() == '';
      $('#TambahGuru')
             .bootstrapValidator('enableFieldValidators', 'tlp', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#TambahGuru').bootstrapValidator('validateField', 'tlp')
      }
  })
});
</script>
<!-- VALIDASI FORM TAMBAH GURU -->

<!-- VALIDASI FORM UBAH GURU -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalUbahGuru').modal('hide');
  var validator = $('#UbahGuru').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nip: {
        validators: {
          notEmpty: {
            message: "NIP harus diisi"
          },
          stringLength: {
            max: 25,
            message: "NIP maksimal 25 karakter"
          },
          remote: {
            url: "{{ URL::to('/checkNIPUbah') }}",
              data: function(validator) {
                return {
                    nis: validator.getFieldElements('nip').val(),
                    id: validator.getFieldElements('id').val()
                };
            },
            message: 'NIP sudah ada'
          }
        }
      },

      nama: {
        validators: {
          notEmpty: {
            message: "Nama harus diisi"
          },
          stringLength: {
            max: 50,
            message: "Nama maksimal 50 karakter"
          }
        }
      },

      username: {
        validators: {
          notEmpty: {
            message: "Username harus diisi"
          },
          stringLength: {
            min: 5,
            message: "Username minimal 5 karakter"
          },
          regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'Hanya boleh memakai huruf, nomor dan garis bawah'
          },
          remote: {
            url: "{{ URL::to('/checkUsernameUbah') }}",
              data: function(validator) {
                return {
                    username: validator.getFieldElements('username').val(),
                    id: validator.getFieldElements('id').val()
                };
            },
            message: 'Username sudah ada'
          }
        }
      },

      password: {
        enabled: false,
        validators: {
          stringLength: {
            min: 5,
            message: "Password minimal 5 karakter"
          },
          different: {
            field: "username",
            message: "Username dan password tidak boleh sama"
          }
        }
      },

      role: {
        validators: {
          notEmpty: {
            message: "Role harus diisi"
          }
        }
      },

      jadwal: {
        validators: {
          notEmpty: {
            message: "Jadwal harus diisi"
          }
        }
      },

      jkl: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      tlp: {
        enabled: false,
        validators: {
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      }
      
    }
  })
  .on('keyup', '[name="password"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahGuru')
             .bootstrapValidator('enableFieldValidators', 'password', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahGuru').bootstrapValidator('validateField', 'password')
      }
  })
  .on('keyup', '[name="jkl"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahGuru')
             .bootstrapValidator('enableFieldValidators', 'jkl', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahGuru').bootstrapValidator('validateField', 'jkl')
      }
  })
  .on('keyup', '[name="agama"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahGuru')
             .bootstrapValidator('enableFieldValidators', 'agama', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahGuru').bootstrapValidator('validateField', 'agama')
      }
  })
  .on('keyup', '[name="tlp"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahGuru')
             .bootstrapValidator('enableFieldValidators', 'tlp', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahGuru').bootstrapValidator('validateField', 'tlp')
      }
  })
});
</script>
<!-- VALIDASI FORM UBAH GURU -->

<!-- VALIDASI FORM UBAH GURU PIKET -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalUbahPiket').modal('hide');
  var validator = $('#UbahPiket').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nip: {
        validators: {
          notEmpty: {
            message: "NIP harus diisi"
          },
          stringLength: {
            max: 25,
            message: "NIP maksimal 25 karakter"
          },
          remote: {
            url: "{{ URL::to('/checkNIPUbah') }}",
              data: function(validator) {
                return {
                    nis: validator.getFieldElements('nip').val(),
                    id: validator.getFieldElements('id').val()
                };
            },
            message: 'NIP sudah ada'
          }
        }
      },

      nama: {
        validators: {
          notEmpty: {
            message: "Nama harus diisi"
          },
          stringLength: {
            max: 50,
            message: "Nama maksimal 50 karakter"
          }
        }
      },

      // username: {
      //   validators: {
      //     notEmpty: {
      //       message: "Username harus diisi"
      //     },
      //     stringLength: {
      //       min: 5,
      //       message: "Username minimal 5 karakter"
      //     },
      //     regexp: {
      //               regexp: /^[a-zA-Z0-9_\.]+$/,
      //               message: 'Hanya boleh memakai huruf, nomor dan garis bawah'
      //     },
      //     remote: {
      //       url: "{{ URL::to('/checkUsernameUbah') }}",
      //         data: function(validator) {
      //           return {
      //               username: validator.getFieldElements('username').val(),
      //               id: validator.getFieldElements('id').val()
      //           };
      //       },
      //       message: 'Username sudah ada'
      //     }
      //   }
      // },

      // password: {
      //   validators: {
      //     stringLength: {
      //       min: 5,
      //       message: "Password minimal 5 karakter"
      //     },
      //     different: {
      //       field: "username",
      //       message: "Username dan password tidak boleh sama"
      //     }
      //   }
      // },

      // role: {
      //   validators: {
      //     notEmpty: {
      //       message: "Role harus diisi"
      //     }
      //   }
      // },

      jadwal: {
        validators: {
          notEmpty: {
            message: "Jadwal harus diisi"
          }
        }
      },

      jkl: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      tlp: {
        enabled: false,
        validators: {
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      }
      
    }
  })
  .on('keyup', '[name="jkl"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahPiket')
             .bootstrapValidator('enableFieldValidators', 'jkl', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahPiket').bootstrapValidator('validateField', 'jkl')
      }
  })
  .on('keyup', '[name="agama"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahPiket')
             .bootstrapValidator('enableFieldValidators', 'agama', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahPiket').bootstrapValidator('validateField', 'agama')
      }
  })
  .on('keyup', '[name="tlp"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahPiket')
             .bootstrapValidator('enableFieldValidators', 'tlp', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahPiket').bootstrapValidator('validateField', 'tlp')
      }
  })
});
</script>
<!-- VALIDASI FORM UBAH GURU PIKET -->

<!-- VALIDASI FORM TAMBAH KELAS -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalTambahKelas').modal('hide');
  var validator = $('#TambahKelas').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nama_kelas: {
        validators: {
          notEmpty: {
            message: "Nama kelas harus diisi"
          },
          remote: {
            url: "{{ URL::to('/checkKelas') }}",
              data: function(validator) {
                return {
                    nama_kelas: validator.getFieldElements('nama_kelas').val()
                };
            },
            message: 'Nama kelas sudah ada'
          }
        }
      },

      jurusan: {
        validators: {
          notEmpty: {
            message: "Jurusan harus diisi"
          }
        }
      },

      thn_ajaran: {
        validators: {
          notEmpty: {
            message: "Tahun ajaran harus diisi"
          },
          stringLength: {
            min: 9,
            message: "Tahun ajaran minimal 9 karakter"
          }
        }
      },

      wali_kelas: {
        validators: {
          notEmpty: {
            message: "Wali kelas harus diisi"
          }
        }
      }
      
    }
  });
});
</script>
<!-- VALIDASI FORM TAMBAH KELAS -->

<!-- VALIDASI FORM UBAH KELAS -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalUbahKelas').modal('hide');
  var validator = $('#UbahKelas').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nama_kelas: {
        validators: {
          notEmpty: {
            message: "Nama kelas harus diisi"
          },
          remote: {
            url: "{{ URL::to('/checkKelasUbah') }}",
              data: function(validator) {
                return {
                    nama_kelas: validator.getFieldElements('nama_kelas').val(),
                    id : validator.getFieldElements('id').val()
                };
            },
            message: 'Nama kelas sudah ada'
          }
        }
      },

      jurusan: {
        validators: {
          notEmpty: {
            message: "Jurusan harus diisi"
          }
        }
      },

      thn_ajaran: {
        validators: {
          notEmpty: {
            message: "Tahun ajaran harus diisi"
          },
          stringLength: {
            min: 9,
            message: "Tahun ajaran minimal 9 karakter"
          }
        }
      },

      wali_kelas: {
        validators: {
          notEmpty: {
            message: "Wali kelas harus diisi"
          }
        }
      }
      
    }
  });
});
</script>
<!-- VALIDASI FORM UBAH KELAS -->

<!-- PENGATURAN PESAN PERINGATAN -->
<script type="text/javascript">
$(document).ready(function(){
                    setTimeout(function() {
            $('#successMessage, #errorsMessage').fadeOut(1500);
            }, 3000); //hilang setelah 3 detik
        });
</script>
<!-- PENGATURAN PESAN PERINGATAN -->

<!-- VALIDASI FORM LOGIN -->
<script type="text/javascript">
$(document).ready(function() {
  var validator = $('#formLogin').bootstrapValidator({
    fields: {
      email: {
        validators: {
          notEmpty: {
            message: "Masukkan username terlebih dahulu"
          }
        }
      },

      password: {
        validators: {
          notEmpty: {
            message: "Masukkan password terlebih dahulu"
          }
        }
      }
      
    }
  });
});
</script>
<!-- VALIDASI FORM LOGIN -->

<!-- VALIDASI FORM UBAH PROFIL -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalUbahProfil').modal('hide');
  var validator = $('#UbahProfil').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nip: {
        validators: {
          notEmpty: {
            message: "NIP harus diisi"
          },
          stringLength: {
            max: 25,
            message: "NIP maksimal 25 karakter"
          },
          remote: {
            url: "{{ URL::to('/checkNIPUbah') }}",
              data: function(validator) {
                return {
                    nis: validator.getFieldElements('nip').val(),
                    id: validator.getFieldElements('id').val()
                };
            },
            message: 'NIP sudah ada'
          }
        }
      },

      nama: {
        validators: {
          notEmpty: {
            message: "Nama harus diisi"
          },
          stringLength: {
            min: 3,
            max: 50,
            message: "Nama antara 3-50 karakter"
          }
        }
      },

      username: {
        validators: {
          notEmpty: {
            message: "Username harus diisi"
          },
          stringLength: {
            min: 5,
            message: "Username minimal 5 karakter"
          },
          regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'Hanya boleh memakai huruf, nomor dan garis bawah'
          },
          remote: {
            url: "{{ URL::to('/checkUsernameUbah') }}",
              data: function(validator) {
                return {
                    username: validator.getFieldElements('username').val(),
                    id: validator.getFieldElements('id').val()
                };
            },
            message: 'Username sudah ada'
          }
        }
      },

      jkl: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        enabled: false,
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      tlp: {
        enabled: false,
        validators: {
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Masukkan hanya berupa angka'
          }
        }
      }
      
    }
  })
  .on('keyup', '[name="jkl"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahProfil')
             .bootstrapValidator('enableFieldValidators', 'jkl', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahProfil').bootstrapValidator('validateField', 'jkl')
      }
  })
  .on('keyup', '[name="agama"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahProfil')
             .bootstrapValidator('enableFieldValidators', 'agama', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahProfil').bootstrapValidator('validateField', 'agama')
      }
  })
  .on('keyup', '[name="tlp"]', function () {
      var isEmpty = $(this).val() == '';
      $('#UbahProfil')
             .bootstrapValidator('enableFieldValidators', 'tlp', !isEmpty);
      // Revalidate the field when user start typing in the Phone field
      if ($(this).val().length == 1) {
          $('#UbahProfil').bootstrapValidator('validateField', 'tlp')
      }
  })
});
</script>
<!-- VALIDASI FORM UBAH PROFIL