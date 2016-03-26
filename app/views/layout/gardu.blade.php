<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Sistem Pendataan Lampu PT. PLN Persero</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          
            <div class="navbar-header">
              <a href="{{ URL::To('menu') }}" class="navbar-brand"><b>PT. PLN PERSERO</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="{{URL::to('menu')}}">Home</a></li>
                <?php $nama = Auth::user()->nama;
                 $role_id =Auth::user()->role; 
                 if ($role_id == "1") {
                   $jabatan = "Admin PLN";
                       
                 }else{
                   $jabatan = "Admin PU";
                 
                 }?>
                <li class=@yield('aktif1')><a href="daftar_lampu">Daftar Lampu PJU</a></li>
                <?php if ($role_id==1) { ?>
                  
                
                <li class=@yield('aktif2')><a href="tambah_lampu">Tambah Data Lampu PJU</a></li>
                <?php }?>
              </ul>
             
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                 
                
                  
                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                     <?php $nama = Auth::user()->nama;
                      $role_id =Auth::user()->role; 
                      if ($role_id == "1") {
                        $jabatan = "Admin PLN";
                       
                      }else{
                        $jabatan = "Admin PU";
                       
                      }?>
                      <span class="hidden-xs">{{$nama}} &nbsp&nbsp<i class="fa fa-gear"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- User image -->
                      <li class="user-header">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        <p>
                         
                          {{$nama}}
                          <small>{{$jabatan}}</small>
                        </p>
                      </li>
                     
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        
                        <div class="pull-right">
                          <a href="{{ URL::To('logout') }}" class="btn btn-default btn-flat">Logout</a>
                        </div>
                      </li>
                    </ul>
                  </li>
                  
                </ul>
              </div><!-- /.navbar-custom-menu -->
          
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <section class="content-header">
            <h1>
              @yield('title')
              
            </h1>
          
          </section>
         <section class="content-header">
          <div class="row">
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                 
                  
                  <center>Cari Berdasarkan Kecamatan</center>
                </div>
                <div class="box-footer">
                  {{ Form::open(array('route'=>'cari-kecamatan', 'method' => 'POST','role' => 'form','class' => 'form')); }}

                  <div class="form-group">
                      <label>Pilih kecamatan</label>
                      <select name="kecamatan" class="form-control">
                        <option value="1">PRAYA</option>
                        <option value="2">PRAYA BARAT DAYA</option>
                        <option value="3">PRAYA BARAT</option>
                        <option value="4">PRAYA TIMUR</option>
                        <option value="5">JANAPRIA</option>
                        <option value="6">PUJUT</option>
                        <option value="7">PRINGGARATA</option>
                        <option value="8">JONGGAT</option>
                        <option value="9">BATUKLIANG UTARA</option>
                        <option value="10">BATUKLIANG</option>
                        <option value="11">PRAYA TENGAH</option>
                        <option value="12">KOPANG</option>

                      </select>
                    </div>
                    <div class="form-group">
                    {{ Form::submit('CARI', array('class' => 'btn btn-success btn-block', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                    </div>
                </div>
                  
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                 
                  
                  <center>Cari Berdasarkan Desa</center>

                  <?php 
                  $daftar_kecamatan = DB::table('kecamatan')->where('id','<',13)->get();
                  $daftar_desa = DB::table('desa')->get();

                  ?>
                </div>
                <div class="box-footer">
                   {{ Form::open(array('route'=>'cari-desa', 'method' => 'POST','role' => 'form','class' => 'form')); }}
                   <div class="form-group">
                    <div class="row">
                    
                    <div class="col-xs-6">
                       <label>Kecamatan</label>
                       <select id="kecamatan" class="form-control" placeholder="Pilih Kecamatan">
                        <option value="" disabled selected>Pilih kecamatan...</option>
                        @foreach($daftar_kecamatan as $row)
                        <option value="{{$row->id}}">{{$row->nama_kec}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-xs-6">
                      <label>Desa</label>
                      <select id="desa" name="id_desa" class="form-control" placeholder="Pilih Desa">
                        <option value="" disabled selected>Pilih desa...</option>
                        @foreach($daftar_desa as $row)
                        <option value="{{$row->id}}" class="{{$row->id_kec}}">{{$row->nama_desa}}</option>
                        @endforeach
                      </select>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    {{ Form::submit('CARI', array('class' => 'btn btn-success btn-block', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                    </div>
                    
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-red">
                 
                  
                  <center>Cari Berdasarkan Nomor Gardu</center>
                </div>
                <div class="box-footer">
                <div class="form-group">
                      {{ Form::open(array('route'=>'cari-gardu', 'method' => 'POST','role' => 'form','class' => 'form')); }}
                      <label>Masukkan kode gardu</label>
                      <input type="text" class="form-control" name="kode_gardu">
                </div>
                <div class="form-group">
                    {{ Form::submit('CARI', array('class' => 'btn btn-success btn-block', 'id' => 'login-button'));}}
                    {{ Form::close();}}
                </div>
                    
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->
            
           
          </div><!-- /.row -->

           @yield('content')
         </section> 
        
        
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
       
         <center>
         <strong>Copyright &copy; 2016 Tim OJT PLN</a>.</strong> All rights reserved.
         </center>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="dist/js/jquery.chained.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#desa").chained("#kecamatan"); /* or $("#series").chainedTo("#mark"); */
        $("#gardu").chained("#desa");
        
        // $('table').dataTable({bFilter: false, bInfo: false});
        // $("#example1").DataTable();
        // $('#example2').DataTable({
        //   "paging": true,
        //   "lengthChange": false,
        //   "searching": false,
        //   "ordering": true,
        //   "info": true,
        //   "autoWidth": false
        // });
      });
    </script>
  </body>
  
</html>
