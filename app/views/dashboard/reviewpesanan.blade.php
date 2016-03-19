@extends('layout.data')
@section('aktif2')
class="active"
@endsection

@section('content')
<!-- Main content -->
        

        <section class="invoice">
          <A href="{{ URL::To('pesananbaru') }}"><button class="btn btn-warning"><i class="fa fa-back"></i>  Kembali</button></a>
                <br><br>
          <!-- title row -->
          @foreach($daftar_pesanan as $row)
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Detail Pesanan
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
                <small class="pull-right">Tanggal Pemesanan : {{$tanggal[2]}} {{$bulan_data}} {{$tanggal[0]}}</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Pemesan :
              <address>
                <strong>{{$row->nama_pemesan}}</strong><br>
                
                Kontak: {{$row->kontak}}<br>
                Email: {{$row->email}}
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <?php  
                $id_desa = $row->id_desa;
                $id_kec = DB::table('desa')->where('id','=',$id_desa)->pluck('id_kec');
                $nama_desa = DB::table('desa')->where('id','=',$id_desa)->pluck('nama_desa');
                $nama_kecamatan = DB::table('kecamatan')->where('id','=',$id_kec)->pluck('nama_kec');?>
              Lokasi : 
              <address>
                
                <strong>Desa {{$nama_desa}}</strong><br>
                Kecamatan {{$nama_kecamatan}}
              </address>
            </div><!-- /.col -->
             <div class="col-sm-4 invoice-col">
              GARDU :
                 
                 <?php $nama_gardu = DB::table('gardu_pln')->where('id','=',$row->id_gardu)->pluck('id_gardu');?>
                {{$nama_gardu}}<br>
               
              
            </div><!-- /.col -->
           
          </div><!-- /.row -->
          @endforeach

          <!-- Table row -->
          <center>
          <div class="row">
            <div class="col-xs-3">
            </div>
            <div class="col-xs-6 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#OPSI PESANAN</th>
                    <th>DETAIL</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jenis Lampu</td>
                    <?php $jenis_lampu = DB::table('jenis_lampu')->where('id','=',$row->id_jenis)->pluck('jenis');?>
                    <td><B>{{$jenis_lampu}}</B></td>
                    
                  </tr>
                  <tr>
                    <td>Tipe Lampu</td>
                    <?php $id_tipe = $row->tipe;
                    if ($id_tipe == 1) {
                      $tipe = "PELEPAS GAS";
                    }else{
                      $tipe = "PIJAR";
                    }
                    ?>
                    <td><B>{{$tipe}}</B></td>
                    
                  </tr>
                  
                  <tr>
                    <td>Daya Lampu</td>
                    <?php $id_daya = $row->daya;
                    $daya = DB::table('daya')->where('id','=',$id_daya)->pluck('daya');
                    ?>
                    <td><B>{{$daya}} Watt</B></td>
                    
                  </tr>
                  <tr>
                    <td>Kelas Lampu</td>
                    <td><B>{{$id_daya}}</B></td>
                    
                  </tr>
                  <tr>
                    <td>Jumlah Lampu</td>
                    <td><B>{{$row->jumlah}} Buah</B></td>
                    
                  </tr>
                  
                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          </center>

         
<div class="box box-primary">
               <div class="box-footer">
                <A href="{{ URL::To('form-penerimaan/'.$row->id) }}"><button class="btn btn-primary"> Terima Pesanan </button></a>
                <A href="{{ URL::To('form-penolakan/'.$row->id) }}"><button class="btn btn-danger"> Tolak Pesanan</button></a>
               
               
                

              </div><!-- /.box -->
@endsection