<?php
session_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng kí</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/StyleGiaoDien.css">
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
			<div class="row bg-warning">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 logoheader">
					<div class="navbar-brand">
						<a href="Index.php"><img src="https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/logo/Sapo-logo.svg" class="img-fluid" style="width:180px; height:50px;" /></a>
						<h3><strong>ĐĂNG KÍ</strong></h3>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 help">
					<a href="" class="active">Cần trợ giúp?</a>
				</div>
			</div>
		</div>
		<div class="clearfix main">
			<div class="row">
				<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 logo">
					<img src="https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/logo/Sapo-logo.svg" class="img-fluid" style="width:80%; height:80%;" />
					<div class="gioithieu">
						<p><h2>Đồ gia dụng </h2></p>
						
					</div>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<div class="login-box">
						<div class="card">
							<div class="card-body login-card-body">
								<p class="login-box-msg"><h4>ĐĂNG KÍ</h4></p>
								<?php
								if(isset($_POST['registration']))
								{
									$email = $_POST['email'];
									$sodienthoai  = $_POST['sodienthoai'];
									$name = $_POST['name'];
									$diachi = $_POST['diachi'];
									$gioitinh = $_POST['gioitinh'];
									$password = $_POST['password'];
									$rpassword = $_POST['rpassword'];
									if($password != $rpassword)
									{
										echo "<span style='color:red; font-size: 20px'>Mật khẩu không khớp.</span>";
									}
								// Thực hiện truy vấn dữ liệu - insert data vào database
									$query_insert = "INSERT INTO user(name,gioitinh,email,diachi,sodienthoai,password) VALUES('".$name."','".$gioitinh."','".$email."','".$diachi."','".$sodienthoai."','".$password."')";
									mysqli_query($conn, $query_insert);
									$query = "SELECT * FROM user WHERE email = '$email' limit 1";
									$run = mysqli_query($conn,$query);
									$row = mysqli_fetch_array($run);
									$count = mysqli_num_rows($run);
									if($count != 0 )
									{
										$_SESSION['login']=$row['name'];
										$_SESSION['ma_user'] = $row['id'];
										header('Location:login.php');
									}
									else
									{
										echo "<span style='color:red; font-size: 20px'>Đăng kí tài khoản không thành công.</span>";
									}
								}	
								?>
								<form action="" method="post" accept-charset="utf-8">
									<div class="input-group mb-3">
										<input type="text" name="name" class="form-control" placeholder="Họ tên khách hàng">
									</div>
									<div class="input-group mb-3">
										<input type="text" name="gioitinh" class="form-control" placeholder="Giới tính">
									</div>
									<div class="input-group mb-3">
										<input type="text" name="sodienthoai" class="form-control" placeholder="Số điện thoại">
									</div>
									<div class="input-group mb-3">
										<input type="text" name="diachi" class="form-control" placeholder="Địa chỉ">
									</div>
									<div class="input-group mb-3">
										<input type="text" name="email" class="form-control" placeholder="Tên đăng nhập hoặc Email">
									</div>
									<div class="input-group mb-3">
										<input type="password" name="password" class="form-control" placeholder="Mật khẩu">
									</div>
									<div class="input-group mb-3">
										<input type="password" name="rpassword" class="form-control" placeholder="Nhập lại mật khẩu">
									</div>
									<div class="row">
										
									</div>
									<div class="row btnlg">
										<button type="submit" name="registration" class="btn btn-primary btn-block">ĐĂNG KÍ</button>
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>