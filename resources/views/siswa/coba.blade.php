
@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection



@section('main-content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            
              <div class="row"><div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <!--
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 160px;">Rendering engine</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 203px;">Browser</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 185px;">Platform(s)</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 136px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">CSS grade</th></tr>
                </thead>
                -->
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 5px;"><center>NIS</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 290px;"><center>Nama</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 80px;"><center>Jenis Kelamin</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 50px;"><center>Agama</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 50px;"><center>Kelas</center></th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 80px;"><center>Action</center></th></tr>
                </thead>

                <tbody>
                  <?php $no=1; ?>
                  @foreach($content['siswas'] as $item)
                    <tr role="row">
                      
                      <td class="sorting_1"><center>{{$item->nis}}</center></td>
                      <td class="sorting_1">{{$item->nama}}</td>
                      <td class="sorting_1"><center>{{$item->jkl}}</center></td>
                      <td class="sorting_1"><center>{{$item->agama}}</center></td>
                      <td class="sorting_1"><center>{{$item->kelas}}</center></td>  
                      <td>
                        <center>                  
                                    <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->nis}}"><span class="fa fa-edit"></span> Ubah</a>
                                    <a class="btn btn-danger btn-xs" title="Hapus" href="delete&{{$item->nis}}"><span class="fa fa-trash"></span> Hapus</a>
                                  </center>
                                </td>
                            </tr>                  
                  @endforeach
                </tbody>
                <!--
                <tbody>
                <tr role="row" class="odd">
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 1.0</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.7</td>
                  <td>A</td>
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Gecko</td>
                  <td>Firefox 1.5</td>
                  <td>Win 98+ / OSX.2+</td>
                  <td>1.8</td>
                  <td>B</td>
                </tr></tbody>-->
                <!--
                <tfoot>
                <tr>
                <th rowspan="1" colspan="1">NIS</th>
                <th rowspan="1" colspan="1">Nama</th>
                <th rowspan="1" colspan="1">Jenis Kelamin</th>
                <th rowspan="1" colspan="1">Agama</th>
                <th rowspan="1" colspan="1">Kelas</th><
                <th rowspan="1" colspan="1">Action</th></tr>
                </tfoot>-->
              </table></div></div>

                         </div>
            </div>
            <!-- /.box-body -->
          </div>

   @endsection