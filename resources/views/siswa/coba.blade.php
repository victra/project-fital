
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
              <div class="row">
              <div class="col-sm-6">
              <div class="dataTables_length" id="example1_length"><label>Show 
              <select name="example1_length" aria-controls="example1" class="form-control input-sm">
              <option value="10">10</option>
              <option value="25">25</option><option value="50">50</option>
              <option value="100">100</option></select> entries</label></div>
              </div>

              </div>
              <div class="row"><div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 160px;">Rendering engine</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 203px;">Browser</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 185px;">Platform(s)</th>
                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 136px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 98px;">CSS grade</th></tr>
                </thead>
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
                </tr></tbody>
                <tfoot>
                <tr>
                <th rowspan="1" colspan="1">Rendering engine</th>
                <th rowspan="1" colspan="1">Browser</th>
                <th rowspan="1" colspan="1">Platform(s)</th>
                <th rowspan="1" colspan="1">Engine version</th>
                <th rowspan="1" colspan="1">CSS grade</th></tr>
                </tfoot>
              </table></div></div>

                         </div>
            </div>
            <!-- /.box-body -->
          </div>

   @endsection