@extends('layout.form')

@section('title')
Form Penambahan Data Lampu PJU
@endsection

@section('aktif2')
"active"
@endsection
@section('content')
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
                
             <div class="box-header with-border">
                  <h3 class="box-title">Formulir Pemesanan Lampu</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(array('route'=>'simpan-lampu', 'method' => 'POST','role' => 'form','class' => 'form')); }}

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
                         <option value="{{$row->id_gardu}}" class="{{$row->id_desa}}">{{$row->id_gardu}}</option>
                         @endforeach
                     
                        
                      
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
                        <option value="12">ORNAMEN</option>
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
                      <label for="exampleInputPassword1">Daya Terpasang</label>
                      <input type="text" name="daya_terpasang" class="form-control" placeholder="Daya...">
                    </div>
                    <div class="col-xs-6">
                      <label for="exampleInputPassword1">Rasionalisasi</label>
                      <input type="text" name="rasionalisasi" class="form-control" placeholder="Rasionalisasi..">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="row">
                    
                    <div class="col-xs-6">
                      <label for="exampleInputPassword1">Lat</label>
                      <input type="text" name="lat" class="form-control" placeholder="Lat...">
                    </div>
                    <div class="col-xs-6">
                      <label for="exampleInputPassword1">Long</label>
                      <input type="text" name="long" class="form-control" placeholder="Long...">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    
                    
                      <label for="exampleInputPassword1">Deskripsi</label>
                      <select id="daya" name="deskripsi" class="form-control">
                      	<option>...</option>
                        <option value="1">LAYAK</option>
                        <option value="2">TIDAK LAYAK</option>
                       
                      </select>
                   
                    </div>

                   
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    {{ Form::submit('Simpan', array('class' => 'btn btn-success', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                     <button class="btn btn-default"><a href="{{URL::to('pesanansaya')}}">Cancel</a></button>
                  </div>
                </form>
@endsection