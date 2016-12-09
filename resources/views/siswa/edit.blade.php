@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	
	<div class="row">			
			<div class="col-md-6 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">Update Data</div>			
					 	<div class="panel-body">
					 		<form class="form-horizontal" method="post" action="update&{{$content['siswa']->nis}}">
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">NIS</label>
						 			<div class="col-sm-7">
						 				<input type="integer" name="nis" class="form-control" disabled="disabled" value="{{$content['siswa']->nis}}">
						 			</div>	
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Nama</label>
						 			<div class="col-sm-7">
						 				<input type="text" name="nama" class="form-control" 
						 						value="{{$content['siswa']->nama}}">
						 			</div>	
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Jenis Kelamin</label>
						 			<div class="col-sm-7">						 			

									<select class="form-control" name="jkl">
								        <option value="">-Pilih Jenis Kelamin-</option>
								        @foreach($content['jenis_kelamin'] as $key => $value)
								            <?php $select = $content['siswa']->jkl==$key ? 'selected' : ''; ?>
								            <option name="{{$key}}" {{$select}}>{{$value}}</option>
								        @endforeach
								    </select>
								    	<!--
									    <select class="form-control" name="jkl">
									        <option value="">-Pilih Jenis Kelamin-</option>
									        <?php foreach($content['jenis_kelamin'] as $key => $value){
									            $select = $content['siswa']->jkl==$key ? 'selected' : '';
									            ?>

									            <option name="<?= $key ?>" <?= $select ?>><?= $value ?></option>
									        <?php } ?>
										</select>-->						 			
						 			</div>
						 		</div>

						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Agama</label>
						 			<div class="col-sm-7">

									<select class="form-control" name="agama">
								        <option value="">-Pilih Agama-</option>
								        @foreach($content['agama'] as $key => $value)
								            <?php $select = $content['siswa']->agama==$key ? 'selected' : ''; ?>
								            <option name="{{$key}}" {{$select}}>{{$value}}</option>
								        @endforeach
								    </select>
						 			</div>
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Kelas</label>
						 			<div class="col-sm-7">

									<select class="form-control" name="kelas">
								        <option value="">-Pilih Kelas-</option>
								        @foreach($content['kelas'] as $key => $value)
								            <?php $select = $content['siswa']->kelas==$key ? 'selected' : ''; ?>
								            <option name="{{$key}}" {{$select}}>{{$value}}</option>
								        @endforeach
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
