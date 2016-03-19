@extends('layout.data')
@section('aktif3')
class="active"
@endsection

@section('content')
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Formulir Pengubahan Data User</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(array('route'=>'update-user', 'method' => 'POST','role' => 'form','class' => 'form')); }}

                  <div class="box-body">
                    <div class="form-group">
                      @foreach($data_user as $row)
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="{{$row->username}}" disabled>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" name="nama" class="form-control" id="exampleInputPassword1" value="{{$row->nama}}">
                    </div>
                     <div class="form-group">
                      <?php 
                      $role = $row->role;
                      if ($role==1) {
                         $role_1 = "selected";
                         $role_2 = "";
                      }elseif ($role==2) {
                        $role_1 = "";
                        $role_2 = "selected";
                      }?>
                      <label for="exampleInputPassword1">Jabatan</label>
                      <select name="role" class="form-control">
                        <option value="" disabled selected>Pilih jabatan...</option>
                        <option value="1" <?php echo $role_1?>>Admin PLN</option >
                        <option value="2" <?php echo $role_2?>>Admin PU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak</label>
                      <input name="kontak" type="text" class="form-control" id="exampleInputEmail1" value="{{$row->kontak}}">
                      <input type="hidden" value="{{$row->id}}" name="id_user">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text"  name="email" class="form-control" id="exampleInputEmail1" value="{{$row->email}}">

                    </div>
                    @endforeach
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {{ Form::submit('Simpan', array('class' => 'btn btn-success', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                       <button class="btn btn-default"><a href="{{URL::to('manajemen-user')}}">Cancel</a></button>
                  </div>
                </form>
              </div><!-- /.box -->
@endsection