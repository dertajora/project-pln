@extends('layout.user')
@section('aktif2')
class="active"
@endsection

@section('content')
<!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> Konfirmasi Pemesanan
                <small class="pull-right">Tanggal Pemesanan: 
                  <?php
                  $tanggal = date("d");
                  $tahun = date("Y");
                  $bulan = date("m");
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

                  echo $tanggal." ".$bulan_data." ".$tahun;?>
                </small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Pemesan :
              <address>
                <strong>{{$nama_pemesan}}</strong><br>
                
                Kontak: {{$kontak}}<br>
                Email: {{$email}}
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <?php  $nama_desa = DB::table('desa')->where('id','=',$id_desa)->pluck('nama_desa');
                $nama_kecamatan = DB::table('kecamatan')->where('id','=',$id_kec)->pluck('nama_kec');?>
              Lokasi : 
              <address>
                
                <strong>Desa {{$nama_desa}}</strong><br>
                Kecamatan {{$nama_kecamatan}}
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              GARDU :
              
                 <?php $nama_gardu = DB::table('gardu_pln')->where('id','=',$kode_gardu)->pluck('id_gardu');?>
                {{$nama_gardu}}<br>
                
              
            </div><!-- /.col -->


           
          </div><!-- /.row -->

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
                    <?php $jenis_lampu = DB::table('jenis_lampu')->where('id','=',$id_jenis)->pluck('jenis');?>
                    <td><B>{{$jenis_lampu}}</B></td>
                    
                  </tr>
                  <tr>
                    <td>Tipe Lampu</td>
                    
                    <td><B>{{$tipe}}</B></td>
                    
                  </tr>
                  
                  <tr>
                    <?php 
                        $daya_lampu = DB::table('daya')->where('id','=',$id_daya)->pluck('daya');?>                        
                    
                    <td>Daya Lampu</td>
                    <td><B>{{$daya_lampu}}</B></td>
                    
                  </tr>
                  <tr>
                    <td>Kelas Lampu</td>
                    <td><B>{{$kelas}}</B></td>
                    
                  </tr>
                  <tr>
                    <td>Jumlah Lampu</td>
                    <td><B>{{$jumlah_lampu}}</B></td>
                    
                  </tr>
                  
                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          </center>

         
<div class="box box-primary">
               
                
                {{ Form::open(array('route'=>'simpan-pesanan', 'method' => 'POST','role' => 'form','class' => 'form')); }}
                  <input type="hidden" name="kode_gardu" value="{{$kode_gardu}}">
                  <input type="hidden" name="id_desa" value="{{$id_desa}}">
                  <input type="hidden" name="jenis" value="{{$id_jenis}}">
                  <input type="hidden" name="tipe" value="{{$tipe}}">
                  <input type="hidden" name="daya" value="{{$id_daya}}">
                  <input type="hidden" name="kelas" value="{{$kelas}}">
                  <input type="hidden" name="jumlah" value="{{$jumlah_lampu}}">
                  <input type="hidden" name="nama_pemesan" value="{{$nama_pemesan}}">
                  <input type="hidden" name="kontak" value="{{$kontak}}">
                  <input type="hidden" name="email" value="{{$email}}">

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {{ Form::close();}}
                    <button class="btn btn-default"><a href="{{URL::to('form-pemesanan')}}">Cancel</a></button>
                    
                  </div>
                </form>
              </div><!-- /.box -->
@endsection