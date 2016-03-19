@extends('layout.data')
@section('aktif3')
class="active"
@endsection

@section('content')
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Formulir Penambahan User</h3><br><br>
                   <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Password tidak cocok.
                </div>
                </div><!-- /.box-header -->
                 <?php if($notif==1) { ?>
               
                <?php } ?>
                <!-- form start -->
                {{ Form::open(array('route'=>'simpan-user', 'method' => 'POST','role' => 'form','class' => 'form')); }}

                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" name="username" value="{{$username}}" class="form-control" id="exampleInputEmail1" placeholder="Kangenjogja ?">
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
                      <input type="text" name="nama" value="{{$nama}}" class="form-control" id="exampleInputPassword1" placeholder="Isikan nama user...">
                    </div>
                     <div class="form-group">
                      <?php if ($role==1) {
                         $role_1 = "selected";
                         $role_2 = "";
                      }elseif ($role==2) {
                        $role_1 = "";
                        $role_2 = "selected";
                      }else{
                        $role_1 = "";
                        $role_2 = "";
                       }?>
                      <label for="exampleInputPassword1">Jabatan</label>
                      <select name="role" class="form-control">
                        <option value="0" disabled selected>Pilih jabatan...</option>
                        <option value="1" <?php echo $role_1?>>Admin PLN</option >
                        <option value="2" <?php echo $role_2?>>Admin PU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak</label>
                      <input type="text" name="kontak" value="{{$kontak}}" class="form-control" id="exampleInputEmail1" placeholder="Isikan kontak anda...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" name="email" value="{{$email}}" class="form-control" id="exampleInputEmail1" placeholder="Isikan email anda...">
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