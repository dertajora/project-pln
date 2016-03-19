@extends('layout.user')
@section('aktif2')
class="active"
@endsection

@section('content')
<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Formulir Pemesanan Lampu</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(array('route'=>'konfirmasi-pesanan', 'method' => 'POST','role' => 'form','class' => 'form')); }}

                  <div class="box-body">
                    <div class="form-group">
                    <div class="row">
                     <div class="col-xs-4">
                     <label for="exampleInputEmail1">Kecamatan</label>
                      <?php 
                      $daftar_kecamatan = DB::table('kecamatan')->where('id','<',13)->get();
                      $daftar_desa = DB::table('desa')->get();
                      $daftar_gardu = DB::table('gardu_pln')->get();

                      ?>
                      <select id="kecamatan" name="kecamatan" class="form-control" placeholder="Pilih Kecamatan">
                        <option value="" disabled selected>Pilih kecamatan...</option>
                        @foreach($daftar_kecamatan as $row)
                        <option value="{{$row->id}}">{{$row->nama_kec}}</option>
                        @endforeach
                        
                        
                      </select>
                      </div>
                      <div class="col-xs-4">
                     <label for="exampleInputEmail1">Desa</label>
                     <select id="desa" name="desa" class="form-control" placeholder="Pilih Desa">
                         <option value="" disabled selected>Pilih desa...</option>
                         @foreach($daftar_desa as $row)
                         <option value="{{$row->id}}" class="{{$row->id_kec}}">{{$row->nama_desa}}</option>
                         @endforeach
                        
                        
                      </select>
                      </div>
                      <div class="col-xs-4">
                     <label for="exampleInputEmail1">Gardu</label>
                      <select id="gardu" name="gardu" class="form-control" placeholder="Pilih Gardu">
                         <option value="" disabled selected>Pilih gardu...</option>
                         @foreach($daftar_gardu as $row)
                         <option value="{{$row->id}}" class="{{$row->id_desa}}">{{$row->id_gardu}}</option>
                         @endforeach
                        <!--  <option value="1" class="1">PR001</option>
                         <option value="2" class="1">PR005</option>
                         <option value="3" class="1">PR007</option>
                         <option value="4" class="1">PR009</option>
                         <option value="5" class="1">PR011</option>

                         <option value="6" class="2">JG005</option>
                         <option value="7" class="2">JG013</option>
                         <option value="8" class="2">JG017</option>
                         <option value="9" class="2">JG020</option>
                         <option value="10" class="2">JG021</option>
                         <option value="11" class="2">JG025</option>
                         <option value="12" class="2">JG026</option>
                         <option value="13" class="2">JG044</option>
                         <option value="14" class="2">JG048</option>

                         <option value="15" class="3">PG004</option>
                         <option value="16" class="3">PG009</option>
                         <option value="17" class="3">PG012</option>
                         <option value="18" class="3">PG013</option>
                         <option value="19" class="3">PG015</option>
                         <option value="20" class="3">PG023</option>
                         <option value="21" class="3">PG028</option>
                         <option value="22" class="3">PG038</option>
                         <option value="23" class="3">PG045</option>

                         <option value="24" class="4">KP005</option>
                         <option value="25" class="4">KP012</option>
                         <option value="26" class="4">KP013</option>
                         <option value="27" class="4">KP020</option>
                         <option value="28" class="4">KP031</option>
                         <option value="29" class="4">KP032</option>
                         <option value="30" class="4">KP033</option>
                         <option value="31" class="4">KP041</option>
                         <option value="32" class="4">KP046</option> -->
                        
                      
                      </select>
                      

                      </div>
                    </div> 
                    </div> 
                    
                    <div class="form-group">
                    <div class="row">
                    
                    <div class="col-xs-6">
                      
                      <label>Jenis Lampu</label>
                      <select  id="jenis" name="jenis" class="form-control">
                      	<option value="" disabled selected>Jenis Lampu...</option>
                        <option value="1">MERCURY</option>
                        
                        <option value="3">SOROT</option>
                        <option value="4">TL</option>
                        <option value="5">ML</option>
                        <option value="6">SODIUM</option>
                        <option value="7">LHE</option>
                        <option value="8">SON-T</option>
                        <option value="9">LED</option>
                        <option value="10">DOP</option>
                        <option value="11">PIJAR</option>
                      </select>
                    
                    </div>
                    <div class="col-xs-6">
                       <label>Tipe Lampu</label>
                       <input type="text" name="tipe" value"" id="tipe" class="form-control" id="exampleInputEmail1" placeholder="Tipe lampu..." disabled>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                     
                    <div class="row">
                    
                    <div class="col-xs-6">
                       <label>Daya Lampu</label>
                      <select id="daya" name="daya" class="form-control">
                      	<option>...</option>
                        <option value="1">PIJAR 25-50</option>
                        <option value="2">PIJAR 51-100</option>
                        <option value="3">PIJAR 101-200</option>
                        <option value="4">PIJAR 201-300</option>
                        <option value="5">PIJAR 301-400</option>
                        <option value="6">PIJAR 401-500</option>
                        <option value="7">PIJAR 501-600</option>
                        <option value="8">PIJAR 601-700</option>
                        <option value="9">PIJAR 701-800</option>
                        <option value="10">PIJAR 801-900</option>
                        <option value="11">PIJAR 901-1000</option>
                        <option value="12">PELEPAS GAS 10-50</option>
                        <option value="13">PELEPAS GAS 51-100</option>
                        <option value="14">PELEPAS GAS 101-250</option>
                        <option value="15">PELEPAS GAS 251-500</option>
                        <option value="16">PELEPAS GAS 501-1000</option>
                      </select>
                    </div>
                    <div class="col-xs-6">
                      <label>Kelas Lampu</label>
                      
                       <input type="text" name="kelas" id="kelas" class="form-control" id="exampleInputEmail1" placeholder="Kelas lampu..." disabled>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="row">
                    
                    <div class="col-xs-6">
                      <label for="exampleInputPassword1">Jumlah Lampu</label>
                      <input type="text" name="jumlah_lampu" class="form-control" placeholder="Jumlah lampu...">
                    </div>
                   
                    </div>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pemesan</label>
                      <input type="text" name="nama_pemesan" class="form-control" id="exampleInputEmail1" placeholder="Isikan nama anda...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak</label>
                      <input type="text" name="kontak" class="form-control" id="exampleInputEmail1" placeholder="Isikan nomor HP/telepon anda...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Isikan email anda...">
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {{ Form::submit('Next', array('class' => 'btn btn-success', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                     <button class="btn btn-default"><a href="{{URL::to('pesanansaya')}}">Cancel</a></button>
                  </div>
                </form>
              </div><!-- /.box -->
@endsection

@section('jquery_script')
<script>
$('#jenis').on('change', function() {
  var jenis = $('#jenis').val();
  if ($("#jenis").val() == 10){
    $('#tipe').val("PIJAR");
    
  }else if($("#jenis").val() == 11){
    $('#tipe').val("PIJAR");
    
  }else{
    $('#tipe').val("PELEPAS GAS");
  }
  
 
})
</script>

<script>
$('#daya').on('change', function() {
  var daya = $("#daya").val();
  $('#kelas').val(daya);
  
})
</script>
@endsection