<?php
if(!isset($_SESSION))
{
	session_start();
}
?>
<div class="clearfix khachhang">
	<div class="container-fluid">
		<div class="hoso">
			<div class="text-hoso">
				<strong>Hồ sơ khách hàng</strong>
			</div>
		</div>
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