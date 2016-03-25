<?php

class GarduController extends BaseController {

	public function getIndex(){

        // $daftar_gardu = DB::table('gardu')->select('id','id_desa', 'id_gardu')->groupBy('id_gardu')->get();
        
        // foreach ($daftar_gardu as $row) {
        //     $tambah_data = new GarduPLN;
        //     $tambah_data->id_desa = $row->id_desa;
        //     $tambah_data->id_gardu = $row->id_gardu;
        //     $tambah_data->save();

        // }
        // return $daftar_gardu;
         
         $daftar_gardu = DB::table('gardu')
            ->where('gardu.id_desa','!=',54)
            ->where('gardu.id_desa','!=',82)
            ->join('desa','desa.id','=','gardu.id_desa')
            ->join('kecamatan','kecamatan.id','=','desa.id_kec')
            ->join('jenis_lampu','jenis_lampu.id','=','gardu.id_jenis')
            ->paginate(10);
         


         return View::make('gardu.index-asli')->with('daftar_gardu',$daftar_gardu); 
    }

    public function getTambah(){


         return View::make('gardu.tambah'); 
    }

    public function postSimpanLampu(){
        
         $desa = Input::get('desa');
         $gardu = Input::get('gardu');

         $rasionalisasi = Input::get('rasionalisasi');
         $daya_terpasang = Input::get('daya_terpasang');
        
         
         $daya = Input::get('daya');
         $kelas = Input::get('kelas');
         
         $jenis = Input::get('jenis');
         if ($jenis == 10) {
             $tipe = 1;
         }elseif ($jenis == 11) {
             $tipe = 1;
         }else{
            $tipe = 2;
         }
         
         $kelas = $daya;
         $lat = Input::get('lat');
         $long = Input::get('long');

         $deskripsi = Input::get('deskripsi');

         #tambah data
         $tambah_data = new Gardu;
         $tambah_data->id_gardu = $gardu;
         $tambah_data->id_desa = $desa;
         $tambah_data->id_jenis = $jenis;
         $tambah_data->daya = $daya;
         $tambah_data->rasionalisasi = $rasionalisasi;
          $tambah_data->lat = $lat;
         $tambah_data->long = $long;
          $tambah_data->daya_terpasang = $daya_terpasang;
         $tambah_data->tipe = $tipe;
         $tambah_data->kelas = $kelas;
         $tambah_data->deskripsi = $deskripsi;
         $tambah_data->save();

         return Redirect::to('tambah_lampu')->with('success-message','sukses'); 
         
    }

    public function postCariKecamatan(){

         $kecamatan = Input::get('kecamatan');
         $daftar_gardu = DB::table('gardu')
            ->join('desa','desa.id','=','gardu.id_desa')
            ->join('kecamatan','kecamatan.id','=','desa.id_kec')
            ->where('kecamatan.id','=',$kecamatan)
            ->get();
         $nama = Kecamatan::where('id','=',$kecamatan)->pluck('nama_kec');
         $judul = "Lampu PJU di Kecamatan ".$nama;
          return View::make('gardu.index')
            ->with('daftar_gardu',$daftar_gardu)
            ->with('parameter_pencarian',$judul); 
    }

    public function postCariGardu(){
         $gardu = Input::get('kode_gardu');

         $judul = "Lampu PJU di Gardu ".$gardu;
         $daftar_gardu =  Gardu::where('id_gardu','=',$gardu)->orderBy('id')->get();
         return View::make('gardu.index')
            ->with('daftar_gardu',$daftar_gardu)
            ->with('parameter_pencarian',$judul);
    }

    public function postCariDesa(){
         $id_desa = Input::get('id_desa');

         $daftar_gardu =  Gardu::where('id_desa','=',$id_desa)->orderBy('id')->get();
         $nama_desa = Desa::where('id','=',$id_desa)->pluck('nama_desa');
         $id_kec = Desa::where('id','=',$id_desa)->pluck('id_kec');
         $nama_kec = Kecamatan::where('id','=',$id_kec)->pluck('nama_kec');
         $judul = "Lampu PJU di Desa ".$nama_desa.", Kecamatan ".$nama_kec;

         return View::make('gardu.index')
            ->with('daftar_gardu',$daftar_gardu)
            ->with('parameter_pencarian',$judul);
    }

    public function getImportDesa(){
        $array = [1,2,3];
        
        

       

        $derta = Excel::load('12.xlsx', function($reader) {
        })->get();

        $array = [];
        $i = 0;
        
        // return $derta;
        foreach ($derta as $row) {
           
            $array[$i]['desa'] = $row['desa'];
            $array[$i]['kecamatan'] = $row['kecamatan'];
            
            
            
            $i = $i+1;
        }


        $desa_baru = array_map("unserialize", array_unique(array_map("serialize", $array)));
        $desa_baru = array_map("unserialize", array_filter(array_map("serialize", $desa_baru)));
        $desa_baru = array_map("unserialize", array_values(array_map("serialize", $desa_baru)));
        
        $i = 0;
        foreach ($desa_baru as $row) {
            // $tambah_data = new Desa;
            // $tambah_data->nama_desa = $desa_baru[$i]['desa'];
            // $tambah_data->id_kec = 12;
            // $tambah_data->save();

            // $i=$i+1;
        }

        return $desa_baru ;

        
    }

    public function getImport(){
        

        $derta = Excel::load('3.xlsx', function($reader) {
        })->get();

        $array = [];
        $i = 0;
        
        // return $derta;
        foreach ($derta as $row) {
            if ($row['gardu']=="#N\/A" or $row['gardu']==null or $row['gardu']=="#REF!") {
                
            }else{
                

                #desa
                $nama_desa = $row['desa'];
                if ($nama_desa=="#N\/A" or $nama_desa==null or $nama_desa=="#REF!") {
                    $id_desa = 54;
                }else{
                    $id_desa = Desa::where('nama_desa', '=', $nama_desa)->pluck('id');
                }
                
                

                #jenis
                $jenis_lampu = $row['jenis_lampu'];
                if ($jenis_lampu=="#N\/A" or $jenis_lampu==null or $jenis_lampu=="#REF!" or $jenis_lampu==" ") {
                    $id_jenis = 2;
                }else{
                    $id_jenis = Jenis::where('jenis', '=', $jenis_lampu)->pluck('id');
                }
                
                #daya
                $daya = $row['daya_watt'];
                if ($daya=="#N\/A" or $daya==null or $daya=="#REF!") {
                    $daya_watt = 0;
                }else{
                    $daya_watt = $daya;
                }

                #rasionalisasi
                $rasionalisasi = $row['rasionalisasi'];
                if ($rasionalisasi=="#N\/A" or $rasionalisasi==null or $rasionalisasi=="#REF!") {
                    $rasionalisasi = 0;
                }

                #lat
                $lat = $row['lat'];
                if ($lat=="#N\/A" or $lat==null or $lat=="#REF!") {
                    $lat = 0;
                }

                #long
                $long= $row['long'];
                if ($long=="#N\/A" or $long==null or $long=="#REF!") {
                    $long = 0;
                }

                #daya terpasang
                $daya_terpasang= $row['daya_terpasang'];
                if ($daya_terpasang=="#N\/A" or $daya_terpasang==null or $daya_terpasang=="#REF!") {
                    $daya_terpasang = 0;
                }

                #tipe lampu
                $tipe= $row['tipe'];
                if ($tipe=="#N\/A" or $tipe==null or $tipe=="#REF!") {
                    $tipe_lampu = 3;
                }elseif ($tipe=="PELEPAS GAS") {
                    $tipe_lampu = 1;
                }elseif ($tipe=="PIJAR"){
                    $tipe_lampu = 2;
                }else{
                    $tipe_lampu = 3;
                }

                #kelas
                $kelas= $row['kelas'];
                if ($kelas=="#N\/A" or $kelas==null or $kelas=="#REF!" or $kelas=="SALAH") {
                    $kelas = 16;
                }

                #deskripsi
                $deskripsi= $row['deskripsi'];
                if ($deskripsi=="#N\/A" or $deskripsi==null or $deskripsi=="#REF!") {
                    $deskripsi = 3;
                }elseif ($deskripsi =="LAYAK") {
                    $deskripsi = 1;
                }elseif ($deskripsi =="TIDAK LAYAK") {
                    $deskripsi = 2;
                }


                $array[$i]['gardu'] = $row['gardu'];
                $array[$i]['desa'] = $id_desa;
                $array[$i]['jenis_lampu'] = $id_jenis;
                $array[$i]['daya_watt'] = $daya_watt;
                $array[$i]['rasionalisasi'] = $rasionalisasi;
                $array[$i]['lat'] = $lat;
                $array[$i]['long'] = $long;
                $array[$i]['daya_terpasang'] = $daya_terpasang;
                $array[$i]['tipe'] = $tipe_lampu;
                $array[$i]['kelas'] = $kelas;
                $array[$i]['deskripsi'] = $deskripsi;
                
                // $tambah_data = new Gardu;
                // $tambah_data->id_gardu = $row['gardu'];
                // $tambah_data->id_desa = $id_desa;
                // $tambah_data->id_jenis = $id_jenis;
                // $tambah_data->daya = $daya_watt;
                // $tambah_data->rasionalisasi = $rasionalisasi;
                // $tambah_data->lat = $lat;
                // $tambah_data->long = $long;
                // $tambah_data->daya_terpasang = $daya_terpasang;
                // $tambah_data->tipe = $tipe_lampu;
                // $tambah_data->kelas = $kelas;
                // $tambah_data->deskripsi = $deskripsi;
                // $tambah_data->save();


                $i = $i+1;
            }
            
        }
        
        return dd($array) ;



        
    }



    



    
  
	

      

}


	