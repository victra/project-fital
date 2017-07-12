<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.2/js/app.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js" type="text/javascript"></script>

<!-- Datetimepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
    function masuk(){console.log("asdasd")}$(document).ready(function(){$("#datetimePicker, #datetimePicker1").datepicker({format:"yyyy-mm-dd",autoclose:!0})});
</script>

<script type="text/javascript">
    $(function(){$("#datetimePicker").datepicker({format:"yyyy-mm-dd",autoclose:!0}),$("#tanggal").on("change",function(){var a=$(this).val();document.getElementById("caritanggal").value=a})});
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<!-- <script type="text/javascript" src="js/profil.js"></script> -->

<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<!-- Export Excel -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

<!-- Responsive Table -->
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js" type="text/javascript"></script>
<!-- BOOTSTRAP VALIDATOR -->

<!-- VALIDASI FORM UBAH PASSWORD-->
<script type="text/javascript">
$(document).ready(function(){$("#UbahPassword").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{current_password:{validators:{notEmpty:{message:"Password lama harus diisi"},remote:{url:"{{ URL::to('/checkPassword') }}",data:function(a){return{current_password:a.getFieldElements("current_password").val()}},message:"Password yang anda masukkan salah"}}},new_password:{validators:{notEmpty:{message:"Password baru harus diisi"},stringLength:{min:6,max:50,message:"Password baru antara 6-50 karakter"}}},password_confirmation:{validators:{notEmpty:{message:"Password konfirmasi harus diisi"},identical:{field:"new_password",message:"Password konfirmasi tidak sama dengan password baru"}}}}})});
</script>
<!-- VALIDASI FORM UBAH PASSWORD-->

<!-- PENGATURAN PESAN PERINGATAN -->
<script type="text/javascript">
$(document).ready(function(){setTimeout(function(){$("#successMessage, #errorsMessage").fadeOut(1500)},3e3)});
</script>
<!-- PENGATURAN PESAN PERINGATAN -->

<!-- VALIDASI FORM LOGIN -->
<script type="text/javascript">
$(document).ready(function(){$("#formLogin").bootstrapValidator({fields:{email:{validators:{notEmpty:{message:"Masukkan username terlebih dahulu"}}},password:{validators:{notEmpty:{message:"Masukkan password terlebih dahulu"}}}}})});
</script>
<!-- VALIDASI FORM LOGIN -->

<!-- VALIDASI FORM UBAH PROFIL -->
<script type="text/javascript">
$(document).ready(function(){$("#ModalUbahProfil").modal("hide");$("#UbahProfil").bootstrapValidator({feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},fields:{nip:{validators:{notEmpty:{message:"NIP harus diisi"},stringLength:{max:25,message:"NIP maksimal 25 karakter"},remote:{url:"{{ URL::to('/checkNIPUbah') }}",data:function(a){return{nis:a.getFieldElements("nip").val(),id:a.getFieldElements("id").val()}},message:"NIP sudah ada"}}},nama:{validators:{notEmpty:{message:"Nama harus diisi"},stringLength:{min:3,max:50,message:"Nama antara 3-50 karakter"}}},username:{validators:{notEmpty:{message:"Username harus diisi"},stringLength:{min:5,message:"Username minimal 5 karakter"},regexp:{regexp:/^[a-zA-Z0-9_\.]+$/,message:"Hanya boleh memakai huruf, nomor dan garis bawah"},remote:{url:"{{ URL::to('/checkUsernameUbah') }}",data:function(a){return{username:a.getFieldElements("username").val(),id:a.getFieldElements("id").val()}},message:"Username sudah ada"}}},jadwal:{validators:{notEmpty:{message:"Jadwal piket harus diisi"}}},jkl:{enabled:!1,validators:{notEmpty:{message:"Jenis kelamin harus diisi"}}},agama:{enabled:!1,validators:{notEmpty:{message:"Agama harus diisi"}}},tlp:{enabled:!1,validators:{regexp:{regexp:/^[+0-9]*$/,message:"Masukkan hanya berupa angka"}}}}}).on("keyup",'[name="jkl"]',function(){var a=""==$(this).val();$("#UbahProfil").bootstrapValidator("enableFieldValidators","jkl",!a),1==$(this).val().length&&$("#UbahProfil").bootstrapValidator("validateField","jkl")}).on("keyup",'[name="agama"]',function(){var a=""==$(this).val();$("#UbahProfil").bootstrapValidator("enableFieldValidators","agama",!a),1==$(this).val().length&&$("#UbahProfil").bootstrapValidator("validateField","agama")}).on("keyup",'[name="tlp"]',function(){var a=""==$(this).val();$("#UbahProfil").bootstrapValidator("enableFieldValidators","tlp",!a),1==$(this).val().length&&$("#UbahProfil").bootstrapValidator("validateField","tlp")})});
</script>
<!-- VALIDASI FORM UBAH PROFIL -->

<!-- ======================================================================================================= -->
<!--                                 VALIDASI SEMUA FORM ADA DI ATAS SINI                                   -->
<!-- ======================================================================================================= -->