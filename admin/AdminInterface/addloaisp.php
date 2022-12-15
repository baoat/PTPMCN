<?php 

 //kiểm tra
 if(isset($_POST['submit'])){
	$tenloaisp =$_POST['tenloaisp'];
	

	
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
				if($flag_ok)
				{
					//kiểm tra file hợp lệ thì lưu vào thư mục.
					move_uploaded_file($_FILES['anh']['tmp_name'], $target_fiel);
				}



		//  move_uploaded_file($tmp_name,'images1/');
		$sql="insert into loaisanpham(tenloaisp,hinhanh)value('$tenloaisp','$target_fiel')";
		$query = mysqli_query($conn, $sql);
		header('location:index.php?QL=QLLoaiHangHoa');
	
 }
?>
<div class="top_nav">
<div class="container-fluid">

	<div class="row">
		<div class="col-md-1 text-left">
			<a href="index.php?QL=QLLoaiHangHoa" class="btn btn-sm btn-default"><i class="fas fa-chevron-left"></i></a>
		</div>
		<div class="col-md-11">
			<h2 class="text-left text-danger">Thêm sản phẩm</h2>
		</div>
	</div>

	
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Tên loại sản phẩm</label>
		    <input type="text" class="form-control" name="tenloaisp">
		  </div>
		 

		  <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">load hình ảnh</label>
				<input type="file" class="form-control" name="anh">
			</div>
		  <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
		</form> 
	</div>
</div>
</div>
