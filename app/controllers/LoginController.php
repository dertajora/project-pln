<?php

class LoginController extends BaseController {

	public function getLogin(){
		return View::make('login.login');
    }

    public function getLogout(){
        Auth::logout();
		return Redirect::to('loginpage');
    }
    public function getDrag(){
		return View::make('maps.drag');
    }

    public function postLogin(){
        $username = Input::get('username');
        $password = Input::get('password');

        $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
        );
        
        
        if (Auth::attempt($user)) {
            $role=Auth::user()->role;
            if ($role==1) {
               return Redirect::route('menu');
            }elseif ($role==2) {
               return Redirect::route('dashboard-user');
            }
            
        }
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
            ->with('password-salah','salah'); 


        
     //    if ($password != 123456) {
     //         return Redirect::to('loginpage')->with('password-salah','salah');
     //    }
    	// $role_id = 1;
    	// if ($username == "gebetansatu") {
    	// 	return Redirect::to('dashboard');
    	// }elseif ($username == "gebetandua") {
     //        return Redirect::to('dashboard-user');
    		
    	// }
		
    }

    public function getIndex(){
    	return "wew";
		return View::make('maps.drag');
    }
	

}


	