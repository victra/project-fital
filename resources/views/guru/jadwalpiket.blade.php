@extends('layouts.app')

@section('htmlheader_title')
    Data Guru Piket
@endsection

@section('contentheader_title')
    Data Guru Piket
@endsection

@section('contentheader_description')
    Olah Data Guru Piket
@endsection

@section('main-content')

<!-- pesan peringatan berhasil -->
@if(Session::has('flash_message'))
    <div id="successMessage" class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Guru Piket</h3>
        <!-- <a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#ModalTambahGuru"> <i class="fa fa-plus"></i> Tambah User</a> -->
    </div><!-- /.box-header -->

    <div class="box-body">
        <table id="tablegurupiket" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablegurupiket_info" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th class="no"><center>No</center></th>
                    <th class="hari"><center>Hari</center></th>
                    <th class="nip"><center>NIP/NIK</center></th>
                    <th><center>Nama Guru Piket</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="agama"><center>Agama</center></th>
                    <th class="tlp">Telepon</th>
                    <th class="action"><center>Action</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['gurupkt'] as $item)
                <tr>
                    <td><center>{{$no++}}</center></td>
                    <td><center>{{$item->jadwal}}</center></td>
                    <td><center>{{$item->nip}}</center></td>
                    <td>{{$item->name}}</td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->agama}}</center></td>
                    <td>{{$item->tlp}}</td>  
                    <td>
                        <center>
                            <a class="btn btn-success btn-xs" title="Ubah" onclick="showModalPiket(this)" 
                            data-id="{{$item->id}}"
                            data-nip="{{$item->nip}}"
                            data-nama="{{$item->name}}"                            
                            data-jenis-kelamin="{{$item->jkl}}"
                            data-agama="{{$item->agama}}"
                            data-tlp="{{$item->tlp}}"
                            data-jadwal="{{$item->jadwal}}">
                            <span class="fa fa-edit"></span></a>
                            <a data-href="deletepiket&{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs" title="Hapus"><span class="fa fa-trash"></span></a>
                        </center>
                    </td>
                </tr>                                    
                @endforeach
            </tbody>                               
        </table>                
                
    </div><!-- /.box-body -->
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

<!-- Modal Form Ubah Data Guru Piket -->
<div class="modal fade" id="ModalUbahPiket" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ubah Data Guru Piket</h4>
            </div>
            <form class="form-horizontal" method="post" action="updateguru" id="UbahPiket">          
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
                    <div>
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
                    </div>
                    <label class="control-label col-sm-4">Jenis Kelamin</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="jkl">
                                <option value="">-Jenis Kelamin-</option>
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Agama-</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
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
<!-- Modal Form Ubah Data Guru Piket -->

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
                                @foreach($content['jenis_kelamin'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <label class="control-label col-sm-4">Agama</label>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <select class="form-control" name="agama">
                                <option value="">-Agama-</option>
                                @foreach($content['agama'] as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
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
<script type="text/javascript">
    $(function() {
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
              { sWidth: '19%' }, //nip
              { sWidth: '25%' }, //nama
              { sWidth: '14%' }, //jenis kelamin
              { sWidth: '9%' }, //agama
              { sWidth: '13%' }, //telepon
              { sWidth: '8%' }, //action
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
        var table = $('#tablegurupiket').DataTable();
        $('.dataTables_filter input').unbind().bind('keyup', function() {
           var searchTerm = this.value.toLowerCase(),
               regex = '\\b' + searchTerm + '\\b';
           table.rows().search(regex, true, false).draw();
        });
    });
</script>

<script type="text/javascript" src="js/piket.js"></script>

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
@endsection