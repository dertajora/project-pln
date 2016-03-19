<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Halaman Login Sistem Dashboard PLN</title>
    
    
    
    
        <link rel="stylesheet" href="login/css/style.css">

    
    
    
  </head>

  <body><center>
  	
  	<center><IMG SRC="login/logo.jpg" height="25%" width="25%"></center>
    <div class="wrapper">
	<div class="container">
		<h1>Selamat Datang</h1>
		<?php if (Session::has('password-salah')){ ?>
             
        Password atau username anda salah !
                
        <?php     } ?>
        <?php if (Session::has('akses')){ ?>
             
        Anda tidak diizinkan membuka halaman ini !
                
        <?php     } ?>
        <?php if (Session::has('belum-login')){ ?>
             
        Silahkan login terlebih dahulu !
                
        <?php     } ?>
                		{{ Form::open(array('route'=>'post-login', 'method' => 'POST','role' => 'form','class' => 'form')); }}

			<input type="text" name="username" placeholder="Username" autofocus>
			<input type="password" name="password" placeholder="Password">
			
		{{ Form::submit('Login', array('class' => 'btn btn-sm btn-info', 'id' => 'login-button'));}}

	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    

    
    
    
  </body>
</html>
