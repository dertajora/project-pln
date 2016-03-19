@extends('layout.data')
@section('aktif2')
class="active"
@endsection

@section('content')
<!-- Main content -->



        <section class="invoice">
          @foreach($daftar_pesanan as $row)
          <A href="{{ URL::To('review-pesanan/'.$row->id) }}"><button class="btn btn-warning"><i class="fa"></i> Kembali</button></a>
                <br>
          <!-- title row -->
          
           <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                Form Penolakan
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
         <div class="box box-warning">
                
                <div class="box-body">
                  {{ Form::open(array('route'=>'tolak-pesanan', 'method' => 'POST','role' => 'form','class' => 'form')); }}

                   
                    
                    <div class="form-group">
                      <input type="hidden" name="id_pesanan" value="{{$row->id}}" 
                      <label>Alasan</label>
                      <textarea class="form-control" name="alasan" rows="3" placeholder="Silahkan masukkan alasan..." ></textarea>
                    </div>

                    
                    
                    {{ Form::submit('Kirim', array('class' => 'btn btn-primary', 'id' => 'login-button'));}}
                    <button class="btn btn-default"><a href="{{URL::to('review-pesanan/'.$row->id)}}">Cancel</a></button>
                     
                  </form>
                </div><!-- /.box-body -->
            </div>
      
@endsection