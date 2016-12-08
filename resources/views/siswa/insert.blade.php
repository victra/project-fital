@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	
		<div class="row">			
			<div class="col-md-6 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">Insert Data</div>			
					 	<div class="panel-body">
					 		<form class="form-horizontal" method="post" action="store">
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">NIS</label>
						 			<div class="col-sm-7">
						 				<input type="text" name="nis" class="form-control" placeholder="Isikan NIS">
						 			</div>	
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Nama</label>
						 			<div class="col-sm-7">
						 				<input type="text" name="nama" class="form-control" placeholder="Isikan Nama">
						 			</div>	
						 		</div>						 								 		
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Jenis Kelamin</label>
						 			<div class="col-sm-7">
						 			<select class="form-control" name="jkl">
						 				<option value="">-Pilih Jenis Kelamin-</option>
						 				<option value="Laki-Laki">Laki-Laki</option>
						 				<option value="Perempuan">Perempuan</option>
						 			</select>
						 			</div>
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Agama</label>
						 			<div class="col-sm-7">
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
						 			<div class="col-sm-7">
						 			<select class="form-control" name="kelas">
						 				<option value="">-Pilih Kelas-</option>
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
						 		
						 		<div class="form-group">        
								      <div class="col-sm-offset-3 col-sm-10">
								        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
								        <button type="submit" class="btn btn-default">Simpan</button>
								      </div>
								    </div>						 		
							</form>						
						</div>
				</div>
			</div>
		</div>
	
		
@endsection
