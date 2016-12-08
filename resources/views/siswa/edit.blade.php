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
					 		<form class="form-horizontal" method="post" action="update&{{$item->nis}}">
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">NIS</label>
						 			<div class="col-sm-7">
						 				<input type="integer" name="nis" class="form-control" value="{{$item->nis}}">
						 			</div>	
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Nama</label>
						 			<div class="col-sm-7">
						 				<input type="text" name="nama" class="form-control" 
						 						value="{{$item->nama}}">
						 			</div>	
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Jenis Kelamin</label>
						 			<div class="col-sm-7">						 			
								    
						 			<?php
									    $a = array(
									        'Laki-Laki' => 'Laki-Laki',
									        'Perempuan' => 'Perempuan',
									    );
									?>

									<select class="form-control" name="jkl">
								        <option value="">-Pilih Jenis Kelamin-</option>
								        @foreach($a as $key => $value)
								            <?php $select = $item->jkl==$key ? 'selected' : ''; ?>
								            <option name="{{$key}}" {{$select}}>{{$value}}</option>
								        @endforeach
								    </select>
								    	<!--
									    <select class="form-control" name="jkl">
									        <option value="">-Pilih Jenis Kelamin-</option>
									        <?php foreach($a as $key => $value){
									            $select = $item->jkl==$key ? 'selected' : '';
									            ?>

									            <option name="<?= $key ?>" <?= $select ?>><?= $value ?></option>
									        <?php } ?>
										</select>-->						 			
						 			</div>
						 		</div>

						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Agama</label>
						 			<div class="col-sm-7">

						 			<?php
									    $a = array(
									        'Islam' => 'Islam',
									        'Katolik' => 'Katolik',
									        'Kristen' => 'Kristen',
									        'Hindu' => 'Hindu',
									        'Budha' => 'Budha',
									    );
									?>

									<select class="form-control" name="agama">
								        <option value="">-Pilih Agama-</option>
								        @foreach($a as $key => $value)
								            <?php $select = $item->agama==$key ? 'selected' : ''; ?>
								            <option name="{{$key}}" {{$select}}>{{$value}}</option>
								        @endforeach
								    </select>
						 			</div>
						 		</div>
						 		<div class="form-group">
						 			<label class="control-label col-sm-3">Kelas</label>
						 			<div class="col-sm-7">
						 			<?php
									    $a = array(
									        'X AK 1' => 'X AK 1',
									        'X AK 2' => 'X AK 2',
									        'X AK 3' => 'X AK 3',
									        'X FARMASI' => 'X FARMASI',
									        'X RPL 1' => 'X RPL 1',
									        'X RPL 2' => 'X RPL 2',
									        'XI AK 1' => 'XI AK 1',
									        'XI AK 2' => 'XI AK 2',
									        'XI FARMASI' => 'XI FARMASI',
									        'XI RPL 1' => 'XI RPL 1',
									        'XI RPL 2' => 'XI RPL 2',
									        'XII AK 1' => 'XII AK 1',
									        'XII AK 2' => 'XII AK 2',
									        'XII FARMASI' => 'XII FARMASI',
									        'XII RPL 1' => 'XII RPL 1',
									        'XII RPL 2' => 'XII RPL 2',
									    );
									?>

									<select class="form-control" name="kelas">
								        <option value="">-Pilih Kelas-</option>
								        @foreach($a as $key => $value)
								            <?php $select = $item->kelas==$key ? 'selected' : ''; ?>
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
