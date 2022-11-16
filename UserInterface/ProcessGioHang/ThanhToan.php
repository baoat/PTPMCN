<?php
	if(!isset($_SESSION))
    {
        session_start();
    }
?>
<?php
	if(isset($_POST['hoanthanh']))
	{
		$ngayban = date('y/m/d');
		$ma_khachhang = $_SESSION['ma_user'];
		$thanhtien = $_SESSION['thanhtien'];
		$tennguoinhan = $_POST['tennguoinhan'];
		$sđt = $_POST['sđt'];
		$address = $_POST['address'];
		$kieuthanhtoan = $_POST['pay'];

		$query = mysqli_query($conn, "INSERT INTO cart(ngayban, ma_khachhang, thanhtien, fullname, phone, address, kieuthanhtoan) VALUES ('$ngayban', '$ma_khachhang', '$thanhtien', '$tennguoinhan', '$sđt', '$address', '$kieuthanhtoan')");
		if($query)
		{
			//Lấy mã hóa đơn trong bảng cart
			$ma_hoadon = mysqli_insert_id($conn);

			foreach ($_SESSION['cart'] as $key => $value) {
				mysqli_query($conn, "INSERT INTO cart_detail(ma_hoadon, id_sanpham, giaban, soluong) VALUES('$ma_hoadon', '$key', '$value[giaban]', '$value[soluong]')");
			}

			
		}
		unset($_SESSION['cart']);
		header('location:GioHang.php?show=camon');
	}
?>
<?php
	$id = $_SESSION['ma_user'];

	$sql = "SELECT * FROM user WHERE id = '".$id."'";
	$run = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($run);
?>

<div class="clearfix thanhtoan">
	<div class="container container-fluid">
		<form action="" method="POST">
			<div class="row">
				<div class="mb-3 tennguoinhan">
					<label class="form-label">Họ tên người nhận</label>
					<input type="text" class="form-control" name="tennguoinhan" value="<?php echo $row['name'] ?>">
				</div>
				<div class="mb-3 password">
					<label  class="form-label">Số điện thoại người nhận</label>
					<input type="text" class="form-control" name="sđt" value="<?php echo $row['sodienthoai'] ?>">
				</div>
			</div>
			<div class="row address">
				<div class="mb-3 address">
					<label class="form-label">Địa chỉ người nhận</label>
					<input type="text" class="form-control" name="address" value="<?php echo $row['diachi']?>">
				</div>
			</div>
			<div class="row">
				<div class="mb-3 kieuthanhtoan">
					<label class="form-label">Kiểu thanh toán</label>
					<select class="form-select" name="pay">
						<option value="">Chọn kiểu thanh toán</option>
						<option value="athmoe">Thanh toán tại nhà</option>
						<option value="credit">Thanh toán bằng thẻ tính dụng </option>
					</select>
				</div>
			</div>
			<div class="row hoanthanh">
				<div class="back">
					<a href="GioHang.php?show=showgiohang" class="btn btn-secondary"><i class="fas fa-chevron-left"></i>Trở về</a>
				</div>
				<div class="btn-hoanthanh">
					<button type="submit" name="hoanthanh" class="btn btn-warning">Hoàn thành</button>
				</div>

				
			</div>
		</form>
	</div>
</div>