<?php

class UserController extends BaseController {
    


	public function getPesanan(){

        $role=Auth::user()->role;
        if ($role==1) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); 
        }
         $user_id = Auth::user()->id;
         $daftar_pesanan = Lampu::where('user_id','=',$user_id)->get();
         return View::make('user.pesanansaya')->with('daftar_pesanan',$daftar_pesanan); 
    }

    public function getIndex(){
        $role=Auth::user()->role;
        if ($role==1) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); 
        }
         return View::make('user.informasi'); 
    }

    public function getTambahPesanan(){
        $role=Auth::user()->role;
        if ($role==1) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); 
        }
        return View::make('user.tambahpesanan'); 
    }

    public function getDetailPesanan($id){
        $role=Auth::user()->role;
        if ($role==1) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); 
        }
        $detail_pesanan = Lampu::where('id','=',$id)->get();

        return View::make('user.detail')->with('detail_pesanan',$detail_pesanan); 
    }

    public function postKonfirmasiPesanan(){
         $id_gardu = Input::get('gardu');
         $id_kec = Input::get('kecamatan');
         $id_desa = Input::get('desa');
         $kode_gardu = Input::get('gardu');
         $id_jenis = Input::get('jenis');
         if ($id_jenis == 10) {
             $tipe = "PIJAR";
         }elseif ($id_jenis == 11) {
             $tipe = "PIJAR";
         }else{
            $tipe = "PELEPAS GAS";
         }
         $id_daya = Input::get('daya');
         $kelas = $id_daya;
         $jumlah_lampu = Input::get('jumlah_lampu');
         $nama_pemesan = Input::get('nama_pemesan');
         $kontak = Input::get('kontak');
         $email = Input::get('email');
         
         return View::make('user.konfirmasipesanan')
            ->with('kode_gardu',$id_gardu)
            ->with('id_desa',$id_desa)
            ->with('id_kec',$id_kec)
            ->with('id_jenis',$id_jenis)
            ->with('tipe',$tipe)
            ->with('id_daya',$id_daya)
            ->with('kelas',$kelas)
            ->with('jumlah_lampu',$jumlah_lampu)
            ->with('nama_pemesan',$nama_pemesan)
            ->with('kontak',$kontak)
            ->with('email',$email);

    }

    public function postSimpanPesanan(){
         $id_gardu = Input::get('kode_gardu');

         
         $id_desa = Input::get('id_desa');
         $id_jenis = Input::get('jenis');
         $tipe = Input::get('tipe');
         if ($tipe="PELEPAS GAS") {
             $tipe_id = 1;
         }elseif ($tipe="PIJAR") {
             $tipe_id =2;
         }
         $id_daya = Input::get('daya');
         $kelas = Input::get('kelas');
         $jumlah_lampu = Input::get('jumlah');
         $nama_pemesan = Input::get('nama_pemesan');
         $kontak = Input::get('kontak');
         $email = Input::get('email');

         $user_id = Auth::user()->id;
         $tanggal = date("Y-m-d");


         $tambah_lampu = new Lampu;
         $tambah_lampu->id_gardu = $id_gardu;
         $tambah_lampu->id_desa = $id_desa;
         $tambah_lampu->id_jenis = $id_jenis;
         $tambah_lampu->tipe = $tipe_id;
         $tambah_lampu->daya = $id_daya;
         $tambah_lampu->jumlah = $jumlah_lampu;
         $tambah_lampu->nama_pemesan = $nama_pemesan;
         $tambah_lampu->kontak = $kontak;
         $tambah_lampu->email = $email;
         $tambah_lampu->user_id = $user_id;
         $tambah_lampu->status = 1;
         $tambah_lampu->tanggal = $tanggal;
         $tambah_lampu->save();
        
        return Redirect::to('pesanansaya')->with('success-message','success');
    }



    



    
  
	

      

}


	