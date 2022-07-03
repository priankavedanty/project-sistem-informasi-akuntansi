<?php

session_start();
include "config/koneksi.php";

    if (@$_SESSION['admin'] || @$_SESSION['direktur'] || @$_SESSION['akunting'] || @$_SESSION['gudang']) {
    	header("location:index.php");
    }else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PT.TIRTA REJEKI DEWATA</title>

    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h3">PT. TIRTA REJEKI DEWATA</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">

      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php  

	@$username = $_POST ['username'];
	@$password = $_POST ['password'];
	@$login = $_POST ['login'];

		if ($login) {
		
		$sql = $koneksi->query("SELECT * FROM tb_pegawai WHERE username = '$username' AND password = '$password'");

		$masuk = $sql->num_rows;
		$data = mysqli_fetch_assoc($sql);

		if ($masuk > 0) {
			header("location:index.php");   
			if ($data['level'] == "admin") {
				$_SESSION['admin'] = $data[user_id];                
				header("location:index.php");
			} elseif ($data['level'] == "direktur") {
				$_SESSION['direktur'] = $data[user_id];
				header("location:index.php"); 
			} elseif ($data['level'] == "akunting") {
				$_SESSION['akunting'] = $data[user_id];
				header("location:index.php");
			} elseif ($data['level'] == "gudang") {
        $_SESSION['gudang'] = $data[user_id];
        header("location:index.php");
      } 
                
		}else{
			echo "<script type='text/javascript'>
				alert('Maaf, Username atau Password salah');
			</script>";
		}
  }
}

?>
