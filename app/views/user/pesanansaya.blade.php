@extends('layout.user')

@section('aktif2')
class="active"
@endsection
@section('content')
<div class="col-xs-12">
               <A href="form-pemesanan"><button class="btn btn-warning"><i class="fa fa-plus"></i>  Tambah Pemesanan</button></a>
                <br><br>
                <?php 
                if (Session::has('success-message'))
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Pesanan baru telah berhasil ditambahkan.
                </div>
                <?php
                }
                ?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">DAFTAR PESANAN SAYA</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                   <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status Pesanan</th>
                        <th>&nbsp&nbsp&nbspFile 1&nbsp&nbsp&nbsp</th>
                        <th>&nbsp&nbsp&nbspFile 2&nbsp&nbsp&nbsp</th>
                        <th>&nbsp&nbsp&nbspFile 3&nbsp&nbsp&nbsp</th>
                        
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                      @foreach($daftar_pesanan as $row)
                      <tr>
                        <td>{{$i}}</td>
                        <td>
                        <?php 
                        $tanggal = explode("-",$row->tanggal);
                        $bulan = $tanggal[1];
                        if ($bulan == "01") {
                            $bulan_data = "Januari";
                        }elseif ($bulan =="02") {
                          $bulan_data ="Februari";
                        }elseif ($bulan =="03") {
                          $bulan_data ="Maret";
                        }elseif ($bulan =="04") {
                          $bulan_data ="April";
                        }elseif ($bulan =="05") {
                          $bulan_data ="Mei";
                        }elseif ($bulan =="06") {
                          $bulan_data ="Juni";
                        }elseif ($bulan =="07") {
                          $bulan_data ="Juli";
                        }elseif ($bulan =="08") {
                          $bulan_data ="Agustus";
                        }elseif ($bulan =="09") {
                          $bulan_data ="September";
                        }elseif ($bulan =="10") {
                          $bulan_data ="Oktober";
                        }elseif ($bulan =="11") {
                          $bulan_data ="November";
                        }elseif ($bulan =="12") {
                          $bulan_data ="Desember";
                        }  
                        ?>  
                        {{$tanggal[2]}} {{$bulan_data}} {{$tanggal[0]}}</td>
                        <td>
                          <?php $status=$row->status;
                          if ($status==1) { ?>
                            <span class="label label-warning">Pending</span>
                          <?php }elseif ($status == 2) { ?>
                            <span class="label label-success">Approved</span>
                          <?php }else{ ?>
                          <span class="label label-danger">Denied</span>
                           <?php } 
                           $i+=1;?>
                        </td>
                        <?php if ($row->file_satu != 0 or $row->file_satu != null) { ?>
                          <td><center><a href="{{URL::to('upload/file_satu/'.$row->file_satu)}}" target="_blank"><button class="btn  btn-warning btn-sm">Unduh</button></center></a></td>
                        <?php }else{?>
                          <td><center>-</center></td>
                        <?php }?>
                        <?php if ($row->file_dua != 0 or $row->file_dua != null) { ?>
                          <td><center><a href="{{URL::to('upload/file_dua/'.$row->file_dua)}}" target="_blank"><button class="btn  btn-warning btn-sm">Unduh</button></a></center></td>
                        <?php }else{?>
                          <td><center>-</center></td>
                        <?php }?>
                        <?php if ($row->file_tiga != 0 or $row->file_tiga != null) { ?>
                          <td><center><a href="{{URL::to('upload/file_tiga/'.$row->file_tiga)}}" target="_blank"> <button class="btn  btn-warning btn-sm">Unduh</button></a></center></td>
                        <?php }else{?>
                          <td><center>-</center></td>
                        <?php }?>
                        <td><a href="detail-pesanan/{{$row->id}}"><button class="btn btn-block btn-primary btn-sm">Detail</button></a></td>
                      </tr>
                      @endforeach
                      
                     
                      
                      
                     
                    </tbody>
                    <tfoot>
                      <tr>
                        
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status Pesanan</th>
                        <th>&nbsp&nbsp&nbspFile 1&nbsp&nbsp&nbsp</th>
                        <th>&nbsp&nbsp&nbspFile 2&nbsp&nbsp&nbsp</th>
                        <th>&nbsp&nbsp&nbspFile 3&nbsp&nbsp&nbsp</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

@endsection