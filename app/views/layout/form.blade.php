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
                <li class=@yield('aktif1')><a href="daftar_lampu">Daftar Lampu PJU</a></li>
                <li class=@yield('aktif2')><a href="tambah_lampu">Tambah Data Lampu PJU</a></li>
                
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
          

           
         </section> 

         <div class="container">
          <section class="content-header">
            <h1>@yield('title')</h1>
          </section>

          <!-- Main content -->
          <section class="content">
            
            <div class="box box-default">
             
              <div class="box-body">
                @yield('content')
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      
        
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
        $('table').dataTable({bFilter: false, bInfo: false});
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
    $('#jenis').on('change', function() {
      var jenis = $('#jenis').val();
      if ($("#jenis").val() == 10){
        $('#tipe').val("PIJAR");
        
      }else if($("#jenis").val() == 11){
        $('#tipe').val("PIJAR");
        
      }else{
        $('#tipe').val("PELEPAS GAS");
      }
      
     
    })
    </script>

    <script>
    $('#daya').on('change', function() {
      var daya = $("#daya").val();
      $('#kelas').val(daya);
      
    })
    </script>
  </body>
  
</html>
