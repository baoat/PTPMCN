<div class="clearfix khachhang">
	<div class="container-fluid">
		<div class="hoso">
			<div class="text-hoso">
				<strong>Đổi mật khẩu</strong>
			</div>
		</div>
		<?php
		$id = $_SESSION['ma_user'];
		$sql = "SELECT * FROM user WHERE id = '".$id."'";
		$run = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($run);
			if(!empty($_POST))
			{
				$passnow = $_POST['passnow'];
				$passnew = $_POST['passnew'];
				$passr = $_POST['passr'];

				if($passnow == $row['password'])
				{
					if($passnew == $passr)
					{
						$sql_up = "UPDATE user SET password = '$passnew' WHERE id ='".$id."'";
						mysqli_query($conn, $sql_up);
						
						echo "<a>Đổi mật khẩu thành công.</a>";
						
						//header('location: Index.php?showIndex=doimatkhau');
					}
					else
					{
						echo "Mật khẩu không khớp.";
					}
				}
				else
				{
					echo "Mật khẩu sai";
				}
			}
		?>
		<form action="" method="POST">
			<div class="doi-mat-khau">
				<div class="mat-khau-new">
					<div class="nhap-mat-khau-now">
						<label for="exampleInputEmail1" class="form-label">Nhập mật khẩu hiện tại</label>
						<input type="text" class="form-control" name="passnow"/>
					</div>
					<div class="nhap-mat-khau-new">
						<label for="exampleInputEmail1" class="form-label">Nhập mật khẩu mới</label>
						<input type="text" class="form-control" name="passnew"/>
					</div>
					<div class="xac-nhan">
						<label for="exampleInputEmail1" class="form-label">Xác nhận mật khẩu</label>
						<input type="text" class="form-control" name="passr"/>
					</div>
				</div>
				<div class="luu">
					<div class="sublit-luu">
						<button type="submit"class="btn btn-warning">Lưu</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>