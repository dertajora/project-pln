@extends('layout.gardu_datatable')

@section('title')
{{$parameter_pencarian}}
@endsection

@section('aktif1')
{{"active"}}
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
                        $id_desa = $row->id_desa;
                        
                        // $nama_desa = $row->nama_desa;
                        // $nama_kec = $row->nama_kec;   
                            $nama_desa = Desa::where('id', '=', $id_desa)->pluck('nama_desa');
                            $id_kec = Desa::where('id', '=', $id_desa)->pluck('id_kec');
                            $nama_kec = Kecamatan::where('id', '=', $id_kec)->pluck('nama_kec');
                        ?>
                        {{$nama_desa}}
                        </td>
                        <td>{{$nama_kec}}</td>
                        
                        <td><?php 
                        $id_jenis = $row->id_jenis;
                        
                        $nama_jenis = Jenis::where('id', '=', $id_jenis)->where('id','!=',2)->pluck('jenis');
                        echo $nama_jenis;
                        ?></td>
                        
                        <?php 
                        $array_daya = [
                        "25-50",
                        "51-100",
                        "101-200",
                        "201-300",
                        "301-400",
                        "401-500",
                        "501-600",
                        "601-700",
                        "701-800",
                        "801-900",
                        "901-1000",
                        "10-50",
                        "51-100",
                        "101-250",
                        "251-500",
                        "501-1000",    
                        ];


                        if($row->daya == 0){
                          $daya = 0;
                        }else{
                          $daya = $array_daya[$row->daya-1];
                        }


                        ?>  

                        <td>{{$daya}}</td>


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
                      <!-- <tr>
                        <td>3</td>
                        <td>PB089</td>
                        <td>Setanggor</td>
                        <td>Praya Barat</td>
                        
                        <td>Mercury</td>
                        <td>0</td>
                        <td>0</td>
                        <td>111.23</td>
                        <td>-8.789005</td>
                        
                        <td>120</td>
                        <td>Pelepas Gas</td>
                        <td>14</td>
                        
                        <td>Layak</td>
                      
                       
                      </tr>
                      <tr>
                        <td>1</td>
                        <td>PB011</td>
                        <td>Setanggor</td>
                        <td>Praya</td>
                        
                        <td>LHE</td>
                        <td>0</td>
                        <td>0</td>
                        <td>111.23</td>
                        <td>-8.789005</td>
                        
                        <td>120</td>
                        <td>Pelepas Gas</td>
                        
                        <td>1</td>
                        <td>Tidak</td>
                      
                       
                      </tr>
                      -->
                     
                      
                      
                     
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

@endsection