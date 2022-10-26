<?php
if(!isset($_SESSION))
{
	session_start();
}
// $id = $_SESSION['ma_khachhang'];

// $sql = "SELECT * FROM tkkhachhang WHERE ma_khachhang = '".$id."'";
// $run = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($run);
?>
<div class="clearfix khachhang">
	<div class="container-fluid">
		<div class="hoso">
			<div class="text-hoso">
				<strong>Hồ sơ khách hàng</strong>
			</div>
		</div>
		<?php
		// if(!empty($_POST))
		// { 
		// 	$fullname = $_POST['fullname'];
		// 	$gioitinh = $_POST['gioitinh'];
		// 	$email = $_POST['email'];
		// 	$address = $_POST['address'];
		// 	$sđt = $_POST['sđt'];
		// 	if($_FILES['upload-img']['name'] == '')
		// 	{
		// 		$target_fiel = $row['avata'];
		// 	}
		// 	else
		// 	{
		// 		$hinhanhpart = basename($_FILES['upload-img']['name']);
		// 		$target_dir = "images/";
		// 		$target_fiel = $target_dir . $hinhanhpart;
		// 	}

		// 	$flag_ok = true;
		// 	if($_FILES['upload-img']['size'] > 1000000)
		// 	{
		// 		$flag_ok = false;
		// 	}
		// 	if($flag_ok)
		// 	{
		// 		//kiểm tra file hợp lệ thì lưu vào thư mục.
		// 		move_uploaded_file($_FILES['upload-img']['tmp_name'], $target_fiel);

		// 		$sql_up = "UPDATE tkkhachhang SET hoten='$fullname', gioitinh = '$gioitinh', email = '$email', diachi = '$address', sđt = '$sđt', avata = '$target_fiel' WHERE ma_khachhang = '".$id."' ";
		// 		$run_up = mysqli_query($conn, $sql_up);
		// 		$sql_show = "SELECT * FROM tkkhachhang";
		// 		$run_show = mysqli_query($conn, $sql_show);
		// 		$row_show = mysqli_fetch_array($run_show);
		// 		$_SESSION['login']=$row_show['hoten'];
		// 		$_SESSION['ma_khachhang'] = $row_show['ma_khachhang'];
		// 		$_SESSION['avata'] = $row_show['avata'];
		// 		header('location: Index.php?showIndex=thongtinkhachhang');
		// 	}
		// 	else
		// 	{
		// 		echo "Đổi avata không thành công.";
		// 	}
		// }
		?>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="thongtin-khachhang">
				<div class="show-thongtin">
					<div class="name-khachhang">
						<label for="exampleInputEmail1" class="form-label">Họ tên: </label>
						<input class="form-control" name="fullname" type="text" value="">
					</div>
					<div class="gioitinh-khachhang">
						<label for="exampleInputEmail1" class="form-label">Giới tính: </label>
						<input class="form-control" name="gioitinh" type="text" value="">
					</div>
					<div class="email-khachhang">
						<label for="exampleInputEmail1" class="form-label">Email: </label>
						<input class="form-control" name="email" type="text" value="">
					</div>
					<div class="diachi-khachhang">
						<label for="exampleInputEmail1" class="form-label">Địa chỉ: </label>
						<input class="form-control" name="address" type="text" value="">
					</div>
					<div class="sđt-khachhang">
						<label for="exampleInputEmail1" class="form-label">Số điện thoại: </label>
						<input class="form-control" name="sđt" type="text" value="">
					</div>
				</div>
				<div class="show-imgavata">
					<div class="img-avata">
						<img src="<?php echo $row['avata'] ?>">
					</div>
					<div class="upload-img">
						<input type="file" name="upload-img">
					</div>
				</div>
			</div>
			<div class="luu">
				<div class="sublit-luu">
					<button type="submit"class="btn btn-warning">Lưu</button>
				</div>
			</div>
		</form>
	</div>
</div>