@extends('layout.data')
@section('aktif1')
class="active"
@endsection

@section('content')
<div class="col-xs-12">
              <div class="row">
            <a href="pesananbaru">
            <div class="col-md-3 col-sm-6 col-xs-12">
              
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Pendaftaran Baru</span>
                  <span class="info-box-number">{{$pesanan_baru}}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->

            </div><!-- /.col -->
            </a>
          </div><!-- /.row -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Pemesanan Lampu</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Nama Pemesan</th>
                        <th>Kontak</th>
                        <th>Status</th>
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
                        <td><a href="detail-pesanan-user/{{$row->id}}"><button class="btn btn-block btn-primary btn-sm">Detail</button></a></td>  
                         
                       
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