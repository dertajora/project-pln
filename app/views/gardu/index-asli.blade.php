@extends('layout.gardu')

@section('title')
Daftar Lampu PJU
@endsection
@section('content')

                
              <div class="box">
                
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Gardu</th>
                        <th>Desa</th>
                        <th>Kecamatan</th>
                        <th>Jenis Lampu</th>
                        <th>Daya (Watt)</th>
                        <th>Rasionalisasi</th>
                        <th>Lat</th>
                        <th>Long</th>
                        
                        <th>Daya Terpasang</th>
                        <th>Tipe</th>
                        
                        <th>Kelas</th>
                        <th>Deskripsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; ?>
                      @foreach($daftar_gardu as $row)  
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$row->id_gardu}}</td>
                        <td><?php 
                        
                        
                        $nama_desa = $row->nama_desa;
                        $nama_kec = $row->nama_kec;   
                            
                        ?>
                        {{$nama_desa}}
                        </td>
                        <td>{{$nama_kec}}</td>
                        
                        <td><?php 
                        // $id_jenis = $row->id_jenis;
                        
                        // $nama_jenis = Jenis::where('id', '=', $id_jenis)->where('id','!=',2)->pluck('jenis');
                        echo $row->jenis;
                        ?></td>
                        <td>{{$row->daya}}</td>
                        <td>{{$row->rasionalisasi}}</td>
                        <td>{{$row->lat}}</td>
                        <td>{{$row->long}}</td>
                        
                        <td>{{$row->daya_terpasang}}</td>
                        <td><?php $tipe = $row->tipe; 
                            if ($tipe==1) {
                              echo "PELEPAS GAS";
                            }elseif ($tipe==2) {
                              echo "PIJAR";
                            }else{
                              echo "-";
                            }
                        ?></td>
                        <td>{{$row->kelas}}</td>
                      
                        <td><?php $deskripsi = $row->deskripsi; 
                            if ($deskripsi==1) {
                              echo "LAYAK";
                            }elseif ($deskripsi==2) {
                              echo "TIDAK LAYAK";
                            }else{
                              echo "-";
                            }
                        ?></td>
                      
                        <?php $i=$i+1;?>
                      </tr>
                      @endforeach
                     
                      
                      
                     
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
                <center>{{$daftar_gardu->links()}}</center>
                
              </div><!-- /.box -->

@endsection