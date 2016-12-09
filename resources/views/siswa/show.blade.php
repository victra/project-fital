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
                  	<a style="margin-right:5px" class="pull-right btn btn-primary btn-sm" title="Tambah Siswa" data-toggle="modal" data-target="#myModal"> <i class="fa fa-plus"></i> Tambah Siswa</a>
                	</div><!-- /.box-header -->

                <!-- Modal Form Tambah Data Siswa-->
				 <div class="modal fade" id="myModal" role="dialog">
				 <div class="modal-dialog">
				    
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Data Siswa</h4>
				    </div>
				    <form class="form-horizontal" method="post" action="store">          
			        <div class="modal-body">
			        	       
			          		<div class="form-group">
						 	<label class="control-label col-sm-3">NIS</label>
						 		<div class="col-sm-2">
						 			<input type="text" name="nis" class="form-control" placeholder="NIS">
						 		</div>	
						 	</div>
						 	<div class="form-group">
						 	<label class="control-label col-sm-3">Nama</label>
						 		<div class="col-sm-6">
						 			<input type="text" name="nama" class="form-control" placeholder="Nama">
						 		</div>	
						 	</div>
                            <div class="form-group">
						 	<label class="control-label col-sm-3">Jenis Kelamin</label>
						 		<div class="col-sm-4">
						 			<select class="form-control" name="jkl">
						 				<option value="">-Pilih Jenis Kelamin-</option>
						 				<option value="Laki-Laki">Laki-Laki</option>
						 				<option value="Perempuan">Perempuan</option>
						 			</select>
						 		</div>
						 	</div>
						 	<div class="form-group">
						 	<label class="control-label col-sm-3">Agama</label>
						 		<div class="col-sm-4">
						 			<select class="form-control" name="agama">
						 				<option value="">-Pilih Agama-</option>
						 				<option value="Islam">Islam</option>
						 				<option value="Katolik">Katolik</option>
						 				<option value="Kristen">Kristen</option>
						 				<option value="Hindu">Hindu</option>
						 				<option value="Budha">Budha</option>
						 			</select>
						 		</div>
						 	</div>
						 	<div class="form-group">
						 	<label class="control-label col-sm-3">Kelas</label>
						 		<div class="col-sm-3">
						 		<select class="form-control" name="kelas">
						 				<option value="">-Pilih Kelas-</option>
						 				<option value="X AK 1">X AK 1</option>
						 				<option value="X AK 2">X AK 2</option>
						 				<option value="X AK 3">X AK 3</option>
						 				<option value="X FARMASI">X FARMASI</option>
						 				<option value="X RPL 1">X RPL 1</option>
						 				<option value="X RPL 2">X RPL 2</option>
						 				<option value="XI AK 1">XI AK 1</option>
						 				<option value="XI AK 2">XI AK 2</option>
						 				<option value="XI FARMASI">XI FARMASI</option>
						 				<option value="XI RPL 1">XI RPL 1</option>
						 				<option value="XI RPL 2">XI RPL 2</option>
						 				<option value="XII AK 1">XII AK 1</option>
						 				<option value="XII AK 2">XII AK 2</option>
						 				<option value="XII FARMASI">XII FARMASI</option>
						 				<option value="XII RPL 1">XII RPL 1</option>
						 				<option value="XII RPL 2">XII RPL 2</option>
						 			</select>
						 		</div>
						 	</div>
							
						 	                       
        			</div>

			        <div class="modal-footer">
				        <div class="form-group">
				        <div class="col-xs-5 col-xs-offset-3">
				        	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
				        	<button type="submit" style="margin-right:50px" class="btn btn-default col-sm-5">Simpan</button>
				        	<!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
				        </div>
				    	</div>
        	
        			</div></form>

      			</div>      
    			</div>
  				</div><!-- Modal Form Tambah Data Siswa -->

                <div class="box-body" style="overflow-x:auto">
                <form>	               
	                <table class="table table-bordered table-striped">
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
				                    <a class="btn btn-danger btn-xs" title="Hapus" href="delete&{{$item->nis}}"><span class="fa fa-trash"></span> Hapus</a></center></td>
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
