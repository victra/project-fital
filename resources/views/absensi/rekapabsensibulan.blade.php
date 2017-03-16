@extends('layouts.app')

@section('htmlheader_title')
    Rekap Absensi (Bulan)
@endsection

@section('contentheader_title')
    Rekap Absensi Siswa
@endsection

@section('contentheader_description')
    Rekap perBulan
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Rekap Absensi Per Bulan</h3>            
            <div style="margin-right:0px; margin-top:30px" class="form-group pull-right">
                <!-- Pilih Bulan -->
                <form style="margin-right:20px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" name="bulan" onchange="location = '?search_kelas={{$content['input_kelas']}}&bulan='+this.value;">
                        <option value="">-Pilih Bulan-</option>
                        @foreach($content['bulan'] as $key => $value)
                        <?php $selected = $content['input_bulan']==$key ? 'selected' : '' ?>
                            <option {{$selected}} value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Bulan :</label>

                <!-- Pilih Kelas -->
                <form style="margin-right:50px; margin-top:0px" class="pull-right">
                    <select class="form-control input-sm" onchange="location = this.value+'&bulan={{$content['input_bulan']}}';">
                        <option value="?search_kelas=">-Pilih Kelas-</option>
                            @foreach($content['kelas'] as $value)
                            <?php $selected = $content['input_kelas']==$value['id'] ? 'selected' : '' ?>
                        <option {{$selected}} value="?search_kelas={{$value['id']}}">{{$value['nama_kelas']}}</option>
                        @endforeach
                    </select>
                </form>
                <label style="margin-right:10px; margin-top:5px"  class="control-label pull-right">Kelas :</label>                

            </div>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="tablerekap" class="table table-hover table-bordered table-striped dataTable" aria-describedby="tablerekap_info">

            <thead>
                <tr>
                    {{--<th><center>No</center></th>--}}
                    <th><center>NIS</center></th>
                    <th><center>Nama Siswa</center></th>
                    <th class="jkl"><center>Jenis Kelamin</center></th>
                    <th class="kelas"><center>Kelas</center></th>
                    <th class="sakit"><center>Sakit</center></th>
                    <th class="izin"><center>Izin</center></th>
                    <th class="alpa"><center>Alpa</center></th>
                    <th class="total"><center>Total</center></th>
                </tr>
            </thead>

            <tbody>
                <?php $no=1; ?>
                @foreach($content['absensis'] as $item)
                <tr>
                    {{--<td><center>{{$no++}}</center></td>--}}
                    <td>{{$item->nis}}</td>
                    <td>{{$item->nama}}</td>
                    <td><center>{{$item->jkl}}</center></td>
                    <td><center>{{$item->kelas->nama_kelas}}</center></td>
                    <td><center>{{$item->sakitb}}</center></td>
                    <td><center>{{$item->izinb}}</center></td>
                    <td><center>{{$item->alpab}}</center></td>
                    <td><center>{{$item->sakitb + $item->izinb + $item->alpab}}</center></td>
                </tr>                                    
                @endforeach
            </tbody>                       
        </table>                
                
    </div><!-- /.box-body -->

    <div class="box-foot">
        <div class="col-lg-2 pull-right">
            <input type="text" disabled class="form-control" value="{{$content['input_bulan']}}">
        </div>
    </div>

</div>
@endsection