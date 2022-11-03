<?php
session_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title Page</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	
	<link rel="stylesheet" href="css/StyleLogin.css">
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="Scripts/bootstrap.min.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<?php
	include("Connection/Connection.php");
	?>
	<body>
		<div class="clearfix header"> 
			<div class="row bg-warning header-login">
				<div class="logoheader">
					<div class="navbar-brand">
						<a href="Index.php"><img src="https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/logo/Sapo-logo.svg" class="img-fluid" style="width:180px; height:50px;" /></a>
						<h3><strong>ĐĂNG NHẬP</strong></h3>
					</div>
				</div>
				<div class=" help">
					<a href="" class="active">Cần trợ giúp?</a>
				</div>
			</div>
		</div>
		<div class="clearfix main">
			<div class="row">
				<div class=" logo">
					<img src="https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/logo/Sapo-logo.svg" class="img-fluid" style="width:80%; height:80%;" />
					<div class="gioithieu">
						<p><h2>Đồ gia dụng </h2></p>
						
					</div>
				</div>
				<div class="form-login">
					<div class="login-box">
						<!-- /.login-logo -->
						<div class="card">
							<div class="card-body login-card-body">
								<p class="login-box-msg"><h4>ĐĂNG NHẬP</h4></p>
								<?php
								if(isset($_POST['login']))
								{
									$email = $_POST['email'];
									$password = $_POST['password'];
									$tendangnhapAdmin = $_POST['email'];
									$passwordAdmin = $_POST['password'];
								// Tạo kết nối
									$conn = mysqli_connect ("localhost", "root", "", "dogiadung") or die("Không kết nối được tới CSDL");
								// Cho phép PHP lưu bằng tiếng Việt vào database
									mysqli_set_charset($conn, "utf-8");
								// Thực hiện truy vấn dữ liệu - insert data vào database
									$query = " select * from user where email = '$email' and password = '$password' limit 1 ";
									$run = mysqli_query($conn, $query);
									$row=mysqli_fetch_array($run);
									$count = mysqli_num_rows($run);
									$query_Admin = " select * from useradmin where email = '$tendangnhapAdmin' and password = '$passwordAdmin' limit 1 ";
									$run_Admin = mysqli_query($conn, $query_Admin);
									$row_Admin=mysqli_fetch_array($run_Admin);
									$count_Admin = mysqli_num_rows($run_Admin);
									if($count == 0 && $count_Admin == 0)
									{
										
										echo '<script>
										alert("Tên đăng nhập sai")
										</script>';
										echo "<span style='color:red; font-size: 20px'>Tên đăng nhập hoặc mật khẩu sai</span>";
									}
									elseif($count != 0)
									{
										$_SESSION['login']=$row['name'];
										$_SESSION['ma_user'] = $row['id'];
									//	$_SESSION['avata'] = $row['avata'];
								//$_SESSION['id_khachhang'] = mysql_insert_id($conn);
										header('Location:Index.php');
									}
									elseif ($count_Admin != 0) {
										$_SESSION['login_Admin']=$row_Admin['email'];
										header('Location:Admin.php');
									}
								}
								?>
								<form action="" method="post" accept-charset="utf-8">
									<div class="input-group mb-3">
										<input type="text" name="email" class="form-control" placeholder="Nhập tên đăng nhập hoặc email">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-envelope"></span>
											</div>
										</div>
									</div>
									<div class="input-group mb-3">
										<input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-lock"></span>
											</div>
										</div>
									</div>
									
									<div class="row btnlg">
										<button type="submit" name="login" class="btn btn-primary btn-block"  >ĐĂNG NHẬP</button>
									</div>
								</form>


								<div class="social-auth-links text-center mb-3 user">
									<p>- OR -</p>
									<div class="row">
										<civ class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<a href="#" class="btn btn-block btn-primary">
												<i class="fab fa-facebook mr-2"></i> Facebook
											</a>
										</civ>
										<civ class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<a href="#" class="btn btn-block btn-danger">
												<i class="fab fa-google-plus mr-2"></i> Google+
											</a>
										</civ>
									</div>


								</div>
								<!-- /.social-auth-links -->

								<p class="mb-1">
									<a href="forgot-password.html">Tôi đã quên mật khẩu</a>
								</p>
							</div>
							<!-- /.login-card-body -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>