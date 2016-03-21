<?php

class LoginController extends BaseController {

    #menampilkan halaman login
	public function getLogin(){
		return View::make('login.login');
    }

    #fungsi untuk logout
    public function getLogout(){
        Auth::logout();
		return Redirect::to('loginpage');
    }
    
    #memverifikasi user
    public function postLogin(){
        $username = Input::get('username');
        $password = Input::get('password');

        $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
        );
        
        
        if (Auth::attempt($user)) {
            return Redirect::route('menu');
            // $role=Auth::user()->role;
            // if ($role==1) {
            //    return Redirect::route('menu');
            // }elseif ($role==2) {
            //    return Redirect::route('dashboard-user');
            // }
            
        }

        // ketika verifikasi tidak berhasil, redirect ke loginpage
        return Redirect::route('login')
            ->with('password-salah','salah'); 


        
		
    }

  

}


	