@extends('layout.data')

@section('aktif3')
class="active"
@endsection
@section('content')
<div class="col-xs-12">
               <a href="tambahuser"><button class="btn btn-warning"><i class="fa fa-plus"></i>  &nbspTambah User</button></a><br><Br>
               <?php 
                if (Session::has('success-message'))
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    User baru telah berhasil ditambahkan.
                </div>
                
                <?php
                }
                ?>

                <?php 
                if (Session::has('update-message'))
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Data user telah berhasil diubah.
                </div>
                
                <?php
                }
                ?>

                <?php 
                if (Session::has('delete-message'))
                {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Data user telah berhasil dihapus.
                </div>
                
                <?php
                }
                ?>
                 <?php 
                if (Session::has('confirm-password'))
                {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Password tidak cocok.
                </div>
                
                <?php
                }
                ?>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">DAFTAR USER</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                      @foreach($daftar_user as $row)
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->username}}</td>
                        <td>
                          <?php if ($row->role == 1) {
                            $jabatan = "Admin PLN";
                          }elseif ($row->role ==2 ) {
                            $jabatan = "Admin PU";
                          }?>
                          {{$jabatan}}</td>
                        <td>{{$row->kontak}}</td>
                        <td>{{$row->email}}</td>
                        <td><a href="edit-user/{{$row->id}}"><button class="btn btn-warning btn-sm"><i class="fa fa-wrench"></i>&nbsp Ubah</button></a>
                          <A href="delete-user/{{$row->id}}"><button class="btn  btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp Hapus</button></a></td>
                      </tr>
                      <?php $i+=1;?>
                      @endforeach
                     
                     
                      
                      
                     
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Kontak</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection