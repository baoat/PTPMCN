<?php
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
?>

<div class="top_nav">
	<div class="container-fluid ml-2">
		<div class="row">
			<div class="col-md-1 text-left">
				<a href="Admin.php?adminql=type" class="btn btn-sm btn-default"><i class="fas fa-chevron-left"></i></a>
			</div>
			<div class="col-md-11">
				<h2 class="text-left text-danger">Sửa sản phẩm</h2>
			</div>
		</div>
		<?php
			$sql = "SELECT * FROM sanpham WHERE masp = '$id'";
			$run = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($run);
		?>
		<?php
			if(!empty($_POST))
			{ 
				$id = $_POST['masp'];
				$tensp = $_POST['tensp'];
				
				if($_FILES['anh']['name'] == '')
				{
					$target_fiel = $row_spedit['anh'];
				}
				else
				{
					$hinhanhpart = basename($_FILES['anh']['name']); 
					$target_dir = "../images/";
					$target_fiel = $target_dir . $hinhanhpart;
				}
				$maloaisp = $_POST['maloaisp'];
				$giaban = $_POST['giaban'];
				$mota = $_POST['mota'];
				
				$soluongton = $_POST['soluongton'];
				//upload file ảnh
				
				
				$flag_ok = true;
				$arrayFile = array('jpg', 'png', 'jpeg', 'gif' );
				$file_type = strtolower(pathinfo($target_fiel, PATHINFO_EXTENSION));

				if(!in_array($file_type, $arrayFile))
				{
					$flag_ok = false;
				}
				if(file_exists($target_fiel))
				{
					echo "File đã tồn tại.";
					$flag_ok = false;
				}
				$check = getimagesize($_FILES['anh']['tmp_name']);
				if($check == false)
				{
					echo "File không hợp lệ.";
					$flag_ok = false;
				}
				if($_FILES['anh']['size'] > 1000000)
				{
					$flag_ok = false;
				}
				if($tensp=="" && $hinhanhpart=="" && $maloaisp=="" && $giaban=="" && $mota=="" && $soluongton=="")
				{
					echo "<span class='text-danger'>Bạn chưa nhập đầy đủ thông tin</span>";
				}
				if($flag_ok)
				{
					//kiểm tra file hợp lệ thì lưu vào thư mục.
					move_uploaded_file($_FILES['anh']['tmp_name'], $target_fiel);
					$sql=" UPDATE sanpham SET masp = '$id', tensp = '$tensp', anh = '$target_fiel' , maloaisp = '$maloaisp', giaban = '$giaban', mota = '$mota' WHERE masp = '$id'";
					$run=mysqli_query($conn, $sql);
					header('location:index.php?QL=QLHangHoa');
					//$conn->close();
				}
				else
				{
					echo "Không upload được File.";
				}
			}
		?>
		
		<div class="row">
			<form action="" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Id sản phẩm</label>
				<input type="text" class="form-control" value="<?php echo $row['masp']?>"  name="masp">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Têm sản phẩm</label>
				<input type="text" class="form-control" value="<?php echo $row['tensp']  ?>" name="tensp">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">load hình ảnh</label>
				<input type="file" class="form-control" name="anh">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Id loại sản phẩm</label>
				<input type="text" class="form-control" value="<?php echo $row['maloaisp']  ?>"  name="maloaisp">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Đơn giá sản phẩm</label>
				<input type="text" class="form-control" value="<?php echo $row['giaban']  ?>"  name="giaban">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Mô tả</label>
				<input type="text" class="form-control" value="<?php echo $row['mota']  ?>"  name="mota">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Số lượng tồn</label>
				<input type="text" class="form-control" value="<?php echo $row['soluongton']  ?>"  name="soluongton">
			</div>
			<button type="submit" class="btn btn-primary">Sửa</button>
			</form> 
		</div>
	</div>
</div>
