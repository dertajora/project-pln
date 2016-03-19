@extends('layout.data')

@section('aktif2')
class="active"
@endsection
@section('content')
<div class="col-xs-12">
               <?php 
                if (Session::has('success-message'))
                {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Pesanan baru telah berhasil diterima.
                </div>
                
                <?php
                }
                ?>
                 <?php 
                if (Session::has('fail-message'))
                {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> 
                    Pesanan baru telah berhasil ditolak.
                </div>
                
                <?php
                }
                ?>

                <br>
              <div class="box">

                <div class="box-header">
                  <h3 class="box-title">DAFTAR PESANAN LAMPU BARU</h3>
                </div><!-- /.box-header -->
                 <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Kontak</th>
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
                         {{$row->nama_pemesan}}
                        </td>
                        <td>
                         {{$row->kontak}}
                        </td>
                       
                        <td><a href="review-pesanan/{{$row->id}}"><button class="btn btn-block btn-primary btn-sm">Review</button></a></td>
                         
                       
                      </tr>
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