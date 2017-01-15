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
        $('#datetimePicker').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script type="text/javascript" src="js/guru.js"></script>
<script type="text/javascript" src="js/siswa.js"></script>

<!-- Datatables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true
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
    $('#TambahSiswa, #UbahSiswa, #TambahGuru, #UbahGuru').bootstrapValidator("resetForm",true);          
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

<!-- bootstrapvalidator -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js" type="text/javascript"></script> -->
<script src="{{ asset('/js/bootstrapValidator.js') }}" type="text/javascript"></script>

<!-- validasi form modal tambah dan ubah siswa -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalTambahSiswa, #ModalUbahSiswa').modal('hide');


  var validator = $('#TambahSiswa, #UbahSiswa').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nis: {
        validators: {
          notEmpty: {
            message: "NIS is required"
          },          
          stringLength: {
            min: 4,
            message: "NIS must be 4 characters long"
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
            message: "Nama is required"
          },          
          stringLength: {
            min: 3,
            max: 25,
            message: "Nama must be between 3 and 25 characters long"
          },       
        }
      },

      // jkl: {
      //   validators: {
      //     notEmpty: {
      //       message: "Jenis Kelamin is required"
      //     }
      //   }
      // },

      // agama: {
      //   validators: {
      //     notEmpty: {
      //       message: "Agama is required"
      //     }
      //   }
      // },

      kelas: {
        validators: {
          notEmpty: {
            message: "Kelas is required"
          }
        }
      }


    }
  });
});
</script>

<!-- validasi form modal tambah dan ubah guru -->
<script type="text/javascript">
$(document).ready(function() {
$('#ModalTambahGuru, #ModalUbahGuru').modal('hide');
  var validator = $('#TambahGuru, #UbahGuru').bootstrapValidator({
    feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
    fields: {
      nip: {
        validators: {
          notEmpty: {
            message: "NIP is required"
          },
          stringLength: {
            min: 4,
            message: "NIP must be 4 characters long"
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
            message: "Nama is required"
          },
          stringLength: {
            min: 3,
            max: 25,
            message: "Nama must be between 3 and 25 characters long"
          }
        }
      },

      username: {
        validators: {
          notEmpty: {
            message: "Username is required"
          },
          stringLength: {
            min: 6,
            message: "Username must be 6 characters long"
          },
          regexp: {
                    regexp: /^[a-zA-Z0-9_\.]+$/,
                    message: 'The username can only consist of alphabetical, number, dot and underscore'
          },
          remote: {
            url: "{{ URL::to('/checkUsername') }}",
              data: function(validator) {
                return {
                    username: validator.getFieldElements('username').val()
                };
            },
            message: 'The username is not available'
          }
        }
      },

      password: {
        validators: {
          notEmpty: {
            message: "Password is required"
          },
          stringLength: {
            min: 6,
            message: "Password must be 8 characters long"
          },
          different: {
            field: "username",
            message: "Username and Password must be different"
          }
        }
      },

      role: {
        validators: {
          notEmpty: {
            message: "Role is required"
          }
        }
      },

      // jkl: {
      //   validators: {
      //     notEmpty: {
      //       message: "Jenis Kelamin is required"
      //     }
      //   }
      // },

      // agama: {
      //   validators: {
      //     notEmpty: {
      //       message: "Agama is required"
      //     }
      //   }
      // },

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
            regexp: /^[0-9]*$/,
            message: 'Not a valid Telepon'
          }
        }
      }
      
    }
  });
});
</script>