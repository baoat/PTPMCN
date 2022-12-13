<?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		//echo $id;
	}
?> 
<div class="top_nav">
<div class=" col-md-9  process container-fluid">
	<div class="row">
		<div class="col-md-1 text-left">
			<a href="Admin.php?adminql=type" class="btn btn-sm btn-default"><i class=" fa-chevron-left"></i></a>
		</div>
		<div class="col-md-11">
			<h2 class="text-left text-danger">Sửa loại sản phẩm</h2>
		</div>
	</div>
	<?php
		$sql = "SELECT * FROM loaisanpham WHERE maloaisp = '$id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
	 ?>
	<?php
		if(!empty($_POST))
		{ 
			$id = $_POST['maloaisp'];
			$tenloaisp = $_POST['tenloaisp'];

			if($_FILES['hinhanh']['name'] == '')
			{
				$target_fiel = $row_loainuocedit['hinhanh'];
			}
			else
			{
				$hinhanhpart = basename($_FILES['hinhanh']['name']); 
				$target_dir = "images1/";
				$target_fiel = $target_dir . $hinhanhpart;
			}
			
			//upload file ảnh
			
			
			$flag_ok = true;
			if($_FILES['hinhanh']['size'] > 1000000)
			{
				$flag_ok = false;
			}
			if($tenloaisp == "" && $hinhanhpart == "")
			{
				echo "<span class='text-danger'>Bạn chưa nhập đầy đủ thông tin</span>";
			}
			if($flag_ok)
			{
				//kiểm tra file hợp lệ thì lưu vào thư mục.
				move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_fiel);
				$sql=" UPDATE loaisanpham SET maloaisp = '$id', tenloaisp = '$tenloaisp', hinhanh = '$target_fiel' WHERE maloaisp = '$id'";
				$run=mysqli_query($conn, $sql);
				header('location:index.php?QL=QLLoaiHangHoa');
				//$conn->close();
			}
			else
			{
				echo "Không upload được File.";
			}
		}
	?>

	<div class=" form-edit">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Mã Loại Sản Phảm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="maloaisp" value="<?php echo $row['maloaisp']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Tên loại sản phẩm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="tenloaisp"  value="<?php echo $row['tenloaisp']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">load hình ảnh</label>
		    <input type="file" class="form-control" name="hinhanh"/>
		  </div>
		  <button type="submit" class="btn btn-primary">Sửa</button>
		</form> 
	</div>
</div>
	</div>