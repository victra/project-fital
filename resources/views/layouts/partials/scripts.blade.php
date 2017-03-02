<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
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
        $('#datetimePicker').datepicker({
          format: "yyyy-mm-dd",
          autoclose: true
        });
    });

    function masuk()
    {
      console.log('asdasd');
    }
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script type="text/javascript" src="js/guru.js"></script>
<script type="text/javascript" src="js/kelas.js"></script>
<script type="text/javascript" src="js/siswa.js"></script>
<script type="text/javascript" src="js/infosiswa.js"></script>

<!-- PERCOBAAN INFO DETAIL SISWA -->
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

<!-- Datatables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<!-- TableTools -->
<script src="{{ asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>

<!-- Responsive Table -->
<script src="{{ asset('/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>

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
              { sWidth: '34%' }, //nama
              { sWidth: '15%' }, //jenis kelamin
              { sWidth: '10%' }, //agama
              { sWidth: '15%' }, //kelas
              { sWidth: '11%' }, //action
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
                sSearchPlaceholder: "NIS / Nama Siswa",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },

            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","agama","jkl","kelas","none" ]},
              {"bSortable" : false, "aTargets" : [ "agama","jkl","kelas","no-expor" ]} 
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
                sSearchPlaceholder: "NIP/NIK / Nama User",
                sUrl: "",
                sZeroRecords: "Data tidak ditemukan"
                },
            // kolom dengan class "iii" tidak ada fitur sorting
            "aoColumnDefs" : [ 
              {"bSearchable" : false, "aTargets" : [ "no","jkl","agama","role","none" ]},
              {"bSortable" : false, "aTargets" : [ "jkl","agama","action" ]} 
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
              { sWidth: '20%' }, //nama kelas
              { sWidth: '25%' }, //jurusan
              { sWidth: '20%' }, //tahun ajaran
              { sWidth: '25%' }, //wali kelas
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
              {"bSearchable" : false, "aTargets" : [ "no","jurusan","thn_ajaran","walikelas","no" ]},
              {"bSortable" : false, "aTargets" : [ "thn_ajaran","walikelas","no-export" ]} 
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

<!-- Autofocus Inputan -->
<script type="text/javascript">
  $('#ModalTambahSiswa, #ModalTambahKelas, #ModalTambahGuru').on('shown.bs.modal', function () {
    $('#nis').focus();
    $('#nama_kelas').focus();
    $('#nip').focus();
})
</script>

<!-- Javascript Center Modal Dialog -->
    <script>
    /* center modal */
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

<!-- reset form modal -->
<script type="text/javascript">
    $('[data-dismiss=modal]').on('click', function (e) {
    // $("#TambahSiswa, #UbahSiswa, #TambahGuru, #UbahGuru").data('bootstrapValidator').resetForm();
    $('#TambahSiswa, #UbahSiswa, #TambahGuru, #UbahGuru, #TambahKelas, #UbahKelas, #UbahPassword').bootstrapValidator("resetForm",true);          
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
})
</script>

<!-- MODAL KONFIRMASI HAPUS DATA -->
<script type="text/javascript">
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

<!-- bootstrapvalidator -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js" type="text/javascript"></script> -->
<script src="{{ asset('/js/bootstrapValidator.js') }}" type="text/javascript"></script>

<!-- validasi form ubah password -->
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

<!-- validasi form modal tambah siswa -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalTambahSiswa').modal('hide');
  var validator = $('#TambahSiswa').bootstrapValidator({
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
            min: 4,
            message: "NIS minimal 4 karakter"
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
            min: 3,
            max: 50,
            message: "Nama antara 3-50 karakter"
          },       
        }
      },

      jkl: {
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
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
      }


    }
  });
});
</script>

<!-- validasi form modal ubah siswa -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalUbahSiswa').modal('hide');
  var validator = $('#UbahSiswa').bootstrapValidator({
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
            min: 4,
            message: "NIS minimal 4 karakter"
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
            min: 3,
            max: 50,
            message: "Nama antara 3-50 karakter"
          },       
        }
      },

      jkl: {
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
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
      }


    }
  });
});
</script>

<!-- validasi form modah tambah guru -->
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
            min: 4,
            message: "NIP minimal 4 karakter"
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
            min: 6,
            message: "Username minimal 6 karakter"
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
            min: 6,
            message: "Password minimal 6 karakter"
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

      jkl: {
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      tlp: {
        validators: {
          // notEmpty: {
          //   message: "Telepon is required"
          // },
          // stringLength: {
          //   min: 6,
          //   message: "Telepon must be 6 characters long"
          // },
          // Telephon: {
          //   message: "Telepon must be valid"
          // },
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Telepon tidak valid'
          }
        }
      }
      
    }
  });
});
</script>

<!-- validasi form modal ubah guru -->
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
            min: 4,
            message: "NIP minimal 4 karakter"
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
            min: 6,
            message: "Username minimal 6 karakter"
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
        validators: {
          // notEmpty: {
          //   message: "Password harus diisi"
          // },
          stringLength: {
            min: 6,
            message: "Password minimal 6 karakter"
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

      jkl: {
        validators: {
          notEmpty: {
            message: "Jenis kelamin harus diisi"
          }
        }
      },

      agama: {
        validators: {
          notEmpty: {
            message: "Agama harus diisi"
          }
        }
      },

      tlp: {
        validators: {
          // notEmpty: {
          //   message: "Telepon is required"
          // },
          // stringLength: {
          //   min: 6,
          //   message: "Telepon must be 6 characters long"
          // },
          // Telephon: {
          //   message: "Telepon must be valid"
          // },
          regexp: {
            regexp: /^[+0-9]*$/,
            message: 'Telepon tidak valid'
          }
        }
      }
      
    }
  });
});
</script>

<!-- validasi form modah tambah kelas -->
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

<!-- validasi form modah ubah kelas -->
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

<!-- pengaturan pesan peringatan -->
<script type="text/javascript">
$(document).ready(function(){
                    setTimeout(function() {
            $('#successMessage, #errorsMessage').fadeOut(1500);
            }, 3000); //hilang setelah 3 detik
        });
</script>

<!-- validasi form login -->
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