@extends('layout.data')
@section('aktif3')
class="active"
@endsection

@section('content')
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Formulir Penambahan User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(array('route'=>'simpan-user', 'method' => 'POST','role' => 'form','class' => 'form')); }}

                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Masukkan username... ">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan password anda...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Konfirmasi Password</label>
                      <input type="password" name="confirmpassword" class="form-control" id="exampleInputPassword1" placeholder="Konfirmasi password...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Isikan nama pengguna...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jabatan</label>
                      <select name="role" class="form-control">
                        <option value="" disabled selected>Pilih jabatan...</option>
                        <option value="1">Admin PLN</option>
                        <option value="2">Admin PU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak</label>
                      <input type="text" name="kontak" class="form-control" id="exampleInputEmail1" placeholder="Isikan kontak anda...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Isikan email anda...">
                    </div>
                    
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {{ Form::submit('Simpan', array('class' => 'btn btn-success', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                      <button class="btn btn-default"><a href="{{URL::to('manajemen-user')}}">Cancel</a></button>
                  </div>
                </form>
              </div><!-- /.box -->
@endsection