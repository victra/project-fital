<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<!-- <script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>

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

<script type="text/javascript" src="js/profil.js"></script>

<!-- Datatables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>

<!-- Export Excel -->
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/jszip.min.js"></script>
<script type="text/javascript" src="js/buttons.html5.min.js"></script>

<!-- Responsive Table -->
<script src="{{ asset('/plugins/datatables/extensions/Responsive/js/dataTables.responsive.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>

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

      jadwal: {
        validators: {
          notEmpty: {
            message: "Jadwal piket harus diisi"
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
<!-- VALIDASI FORM UBAH PROFIL -->

<!-- ======================================================================================================= -->
<!--                                 VALIDASI SEMUA FORM ADA DI ATAS SINI                                   -->
<!-- ======================================================================================================= -->