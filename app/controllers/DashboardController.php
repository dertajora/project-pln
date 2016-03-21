<?php

class DashboardController extends BaseController {

	public function getMenu(){
        // $role=Auth::user()->role;
        //  if ($role==2) {
        //     Auth::logout();
        //     return Redirect::to('loginpage')->with('akses','akses'); ;
        // }
        return View::make('layout.menu'); 
    }

    public function getIndex(){
         
         
         

         $daftar_pesanan = Lampu::get();
         $jumlah_pesanan_baru = Lampu::where('status','=',1)->count('id');

         return View::make('dashboard.pesanan')->with('daftar_pesanan',$daftar_pesanan)->with('pesanan_baru',$jumlah_pesanan_baru); 
    }

    public function getDaftarpesanan(){
         $role=Auth::user()->role;
         if ($role==2) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); ;
         }
         $daftar_pesanan = Lampu::get();
         $jumlah_pesanan_baru = Lampu::where('status','=',1)->count('id');
         return View::make('dashboard.pesanan')->with('daftar_pesanan',$daftar_pesanan)->with('pesanan_baru',$jumlah_pesanan_baru); 
    }

    public function getPesananbaru(){
         $role=Auth::user()->role;
         if ($role==2) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); ;
         }
         $daftar_pesanan = Lampu::where('status','=',1)->get();
        
         return View::make('dashboard.pesananbaru')->with('daftar_pesanan',$daftar_pesanan); 
    }

    public function getReviewPesanan($id){
         $role=Auth::user()->role;
         if ($role==2) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); ;
         }
         $daftar_pesanan = Lampu::where('id','=',$id)->get();
         return View::make('dashboard.reviewpesanan')->with('daftar_pesanan',$daftar_pesanan); 
    }

    public function getTerimaPesanan($id){
         $pesanan = Lampu::find($id);
         $pesanan->status = 2;
         $pesanan->save();
         
         return Redirect::to('pesananbaru')->with('success-message','success');
    }

    public function getFormPenolakan($id){
         $daftar_pesanan = Lampu::where('id','=',$id)->get();
         return View::make('dashboard.formpenolakan')->with('daftar_pesanan',$daftar_pesanan); 
    }

    public function getFormPenerimaan($id){
         $role=Auth::user()->role;
         if ($role==2) {
            Auth::logout();
            return Redirect::to('loginpage')->with('akses','akses'); ;
         }
         $daftar_pesanan = Lampu::where('id','=',$id)->get();
         return View::make('dashboard.formpenerimaan')->with('daftar_pesanan',$daftar_pesanan); 
    }

    public function postPenolakan(){
         $alasan = Input::get('alasan');
         $id_pesanan = Input::get('id_pesanan');

         $pesanan = Lampu::find($id_pesanan);
         $pesanan->keterangan = $alasan;
         $pesanan->status = 3;
         $pesanan->save();

         return Redirect::to('pesananbaru')->with('fail-message','denied');
    }

    public function postPenerimaan(){
         $alasan = Input::get('alasan');
         $id_pesanan = Input::get('id_pesanan');
         
         $file_satu = Input::file('file_1');
         $file_dua = Input::file('file_2');
         $file_tiga = Input::file('file_3');

         $file1_name = 0;
         $file2_name = 0;
         $file3_name = 0;

         if ($file_satu != null) {
             $destinationPath = 'upload/file_satu';
             $file1_name = $file_satu->getClientOriginalName();
             $file1_name = "1-".$id_pesanan."-".$file1_name;
             $upload_proposal = $file_satu->move($destinationPath, $file1_name);
         }

         if ($file_dua != null) {
             $destinationPath2 = 'upload/file_dua';
             $file2_name = $file_dua->getClientOriginalName();
             $file2_name = "2-".$id_pesanan."-".$file2_name;
             $upload_proposal2 = $file_dua->move($destinationPath2, $file2_name);
         }

         if ($file_tiga != null) {
             $destinationPath3 = 'upload/file_tiga';
             $file3_name = $file_tiga->getClientOriginalName();
             $file3_name = "3-".$id_pesanan."-".$file3_name;
             $upload_proposal3 = $file_tiga->move($destinationPath3, $file3_name);
         }


         $pesanan = Lampu::find($id_pesanan);
         $pesanan->keterangan = $alasan;
         $pesanan->status = 2;
         $pesanan->file_satu = $file1_name;
         $pesanan->file_dua = $file2_name;
         $pesanan->file_tiga = $file3_name;
         $pesanan->save();

         return Redirect::to('pesananbaru')->with('success-message','success');
    }

    public function getDetailPesanan($id){
         $detail_pesanan = Lampu::where('id','=',$id)->get();
         return View::make('dashboard.detail')->with('detail_pesanan',$detail_pesanan);
         
    }

    #user
    public function getManajemenUser(){
         $notif="";
         $daftar_user = User::get();
         return View::make('dashboard.manajemenuser')->with('notif',$notif)->with('daftar_user',$daftar_user); 
    }


    public function getTambahUser(){

         return View::make('dashboard.tambahuser'); 
    }

    public function postSimpanUser(){
         $username = Input::get('username');
         $password = Input::get('password');
         $confirm = Input::get('confirmpassword');
         $role = Input::get('role');
         $kontak = Input::get('kontak');
         $email = Input::get('email');
         $nama = Input::get('nama');

         if ($confirm != $password) {
             $notif=1;

             return View::make('dashboard.tambahuser-repeat')
                ->with('username',$username)
                ->with('role',$role)
                ->with('kontak',$kontak)
                ->with('email',$email)
                ->with('nama',$nama)
                ->with('password',$password)
                ->with('confirm-password','fail-message')
                ->with('notif',$notif);
         }


        

         $tambahuser = new User;
         $tambahuser->username = $username;
         $tambahuser->password = Hash::make($password);
         $tambahuser->role = $role;
         $tambahuser->kontak = $kontak;
         $tambahuser->email = $email;
         $tambahuser->nama = $nama;
         $tambahuser->save();

         return Redirect::to('manajemen-user')->with('success-message','success');
    }

    public function getEditUser($id){
         $data = User::where('id','=',$id)->get();

         return View::make('dashboard.edituser')->with('data_user',$data);
    }

    public function postUpdateUser(){
         $id = Input::get('id_user');
         
         $data = User::find($id);
         $data->nama = Input::get('nama');
         $data->kontak = Input::get('kontak');
         $data->email = Input::get('email');
         $data->role = Input::get('role');
         $data->save();
         return Redirect::to('manajemen-user')->with('update-message','success');
    }

    public function getDeleteUser($id){
         $data = User::find($id);
         $data->delete();
         return Redirect::to('manajemen-user')->with('delete-message','success');
    }

   


    
  
	

      

}


	