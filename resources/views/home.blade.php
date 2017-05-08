@extends('layouts.app')

@section('htmlheader_title')
	Beranda
@endsection


@section('main-content')
		
		{{--@if(Auth::user())
			<div class="col-md-6 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>
					 	<div class="panel-body">							 
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		@else
			<div class="col-md-12 col-md-offset-0">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>
					 	<div class="panel-body">							 
						<!-- Login sek jancuk, bajingan, asu, kirik, telek! -->
					</div>
				</div>
			</div>
		@endif--}}

<div class="box">
    <div class="box-header">
    </div>
    
    <div class="box-body">
        <div id="container"></div>
    </div>
</div>
@endsection

@section('scripts-tambahan')
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript">
    $(function () { 
      var data_sakit = <?php echo $sakit; ?>;
      var data_izin = <?php echo $izin; ?>;
      var data_alpa = <?php echo $alpa; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Chart'
        },
        xAxis: {
            categories: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Juli','Agustus','September','Oktober','November','Desember']
        },
        yAxis: {
        	 min: 0,
        	 max: 10,
            title: {
                text: 'Rate'
            }
        },
        series: [{
            name: 'Sakit',
            data: data_sakit
        }, {
            name: 'Izin',
            data: data_izin
        }, {
            name: 'Alpa',
            data: data_alpa
        }]
    });
  });
</script>
@endsection
