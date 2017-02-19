@extends('layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
    Ubah Password
@endsection

@section('contentheader_description')
    
@endsection

@section('main-content')

<div class="box">
    <div class="box-header">
    <!-- <h3 class="box-title">Ubah Password</h3> -->
        </div>
            <div class="box-body">
                 <form method="post" action="ubahpasswordku">
                  <div class="form-group">
                    <label for="current_password">Password Lama :</label>
                    <input name="current_password" type="password" class="form-control" placeholder="Masukan Password Lama" id="pwdlama">
                  </div>
                  <div class="form-group">
                    <label for="new_password">Password Baru (minimal 6 karakter) :</label>
                    <input name="new_password" type="password" class="form-control" placeholder="Masukan Password Baru" id="pwdbaru">
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru :</label>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Ulangi Password Baru" id="pwdkonfirm">
                  </div>
                  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                  <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
        </div>
</div>

@endsection