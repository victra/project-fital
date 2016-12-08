@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<section class="content">
		<div class="row">
			<div class="col-xs-12">			
				<div class="box">
					<div class="box-header">
                  	<h3 class="box-title">Data Siswa</h3><br>
                  	<!--<a class="pull-right btn btn-success btn-sm">Print Siswa</a>-->
                  	<a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" href="insert"> <i class="fa fa-plus"></i> Tambah Siswa</a>
                  	
                </div><!-- /.box-header -->

                <div class="box-body" style="overflow-x:auto">
                <form>
	               
	                <table id="example" class="table table-bordered table-striped">
                    	<thead>
					 		<tr>
					 			<th><center>No</center></th>
					 			<th><center>NIS</center></th>
					 			<th><center>Nama Siswa</center></th>
					 			<th><center>Jenis Kelamin</center></th>
					 			<th><center>Agama</center></th>
					 			<th><center>Kelas</center></th>
					 			<th><center>Action</center></th>
					 		</tr>
					 	</thead>
					 	<tbody>

					 		<?php $no=1;
					 			foreach ($siswax as $item) {
					 			?>					 				 
					 			<tr>
					 				<td><center>{{$no++}}</center></td>
					 				<td><center>{{$item->nis}}</center></td>
					 				<td>{{$item->nama}}</td>
					 				<td><center>{{$item->jkl}}</center></td>
					 				<td><center>{{$item->agama}}</center></td>
					 				<td><center>{{$item->kelas}}</center></td>	
					 				<td><center>
					 				
				                    <a class="btn btn-success btn-xs" title="Ubah" href="edit&{{$item->nis}}"><span class="fa fa-edit"></span> Ubah</a>
				                    <a class="btn btn-danger btn-xs" title="Hapus" href="delete&{{$item->nis}}"><span class="fa fa-trash"></span> Hapus</a>

					 			</tr>					 				 
					 		<?php
					 		}
					 		?></tbody>

					 	
                   
                  </table> 
                  <div align="right">{{ $siswax->render() }}</div>
                  	                				
                </form>

                </div><!-- /.box-body -->




				</div>
			</div>
		</div>
	</section>

@endsection
