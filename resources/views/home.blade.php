@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
		
		@if(Auth::user())
			<div class="col-md-6 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>
					 	<div class="panel-body">							 
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		@else
			<div class="col-md-6 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>
					 	<div class="panel-body">							 
						Login sek jancuk, bajingan, asu, kirik, telek!
					</div>
				</div>
			</div>
		@endif  
@endsection
