
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    @include('Template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
    @include('Template.navbar-depan')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('Template.sidebar')  
  <!-- / .Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <center><h1 class="m-0">Welcome to Dashboard Human Capital</h1></center>
            <br><br><br>
            


 <center><div class="col-sm-5">
  <!-- /.login-logo -->
 <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <center><img src="img/matrix.png" width="50%"></center>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login terlebih dahulu</p>

      <form action="{{ route('beranda-hc') }}" method="get">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="mb-1 tulisan_kiri" style:align="left">
        <input type="checkbox" id="show-password">            
        <label>Tampilkan Password </label>
        </div>
        <br>

        <div class="mb-3">
          <!-- /.col -->
          <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-block mr-2">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div></center>
<!-- /.login-box -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
        @include('Template.footer')
   </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    @include('Template.script')
<!-- /.REQUIRED SCRIPTS -->
</body>
</html>
<script>
  $(document).ready(function(){  
   $('#show-password').click(function(){
    if($(this).is(':checked')){
     $('#password').attr('type','text');
    }else{
     $('#password').attr('type','password');
    }
   });
  });
</script>
