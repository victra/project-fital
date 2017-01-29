@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Ubah Password
@endsection

@section('contentheader_description')
    Ubah Password
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
    <h3 class="box-title">Ubah Password</h3>
        </div>
            <div class="box-body">
                 <form>
                  <div class="form-group">
                    <label for="pwdlama">Password Lama :</label>
                    <input type="password" class="form-control" placeholder="Masukan Password Lama" id="pwdlama">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password Baru (minimal 6 karakter) :</label>
                    <input type="password" class="form-control" placeholder="Masukan Password Baru" id="pwdbaru">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Konfirmasi Password Baru :</label>
                    <input type="password" class="form-control" placeholder="Ulangi Password Baru" id="pwdkonfirm">
                  </div>                  
                  <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
        </div>
</div>

@endsection