<?php 
 $sqlloaisp ="select * from loaisanpham";
 $queryloaisp =mysqli_query($conn,$sqlloaisp);
 
 $sqlhangsp ="select * from hangsanpham";
 $queryhangsp =mysqli_query($conn,$sqlhangsp);

 //kiểm tra
 if(isset($_POST['submit'])){
	$tensp =$_POST['tensp'];
	$giaban =$_POST['giaban'];
	$mota =$_POST['mota'];
	$soluongton =$_POST['soluongton'];

	
	if($_FILES['anh']['name'] == '')
				{
					$target_fiel = $row_spedit['anh'];
				}
				else
				{
					$hinhanhpart = basename($_FILES['anh']['name']); 
					$target_dir = "../images";
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

	if($_POST['maloaisp']=='unselect'){
		echo "bạn chưa chọn loại sản phẩm";
	}else{
		$maloaisp =$_POST['maloaisp'];
	}
	if($_POST['mahangsp']=='unselect'){
		echo "bạn chưa chọn loại sản phẩm";
	}else{
		$mahangsp =$_POST['mahangsp'];
	}
	
		// $mahang =$_POST['mahangsp'];
	


		//  move_uploaded_file($tmp_name,'images1/');
		$sql="insert into sanpham(tensp,giaban,mota,soluongton,mahangsp,maloaisp,anh) value('$tensp','$giaban','$mota','$soluongton','$mahangsp','$maloaisp','$target_fiel')";
		$query = mysqli_query($conn, $sql);
		header('location:index.php?QL=QLHangHoa');
	
 }
?>
<div class="top_nav">
<div class="container-fluid">

	<div class="row">
		<div class="col-md-1 text-left">
			<a href="index.php?QL=QLHangHoa" class="btn btn-sm btn-default"><i class="fas fa-chevron-left"></i></a>
		</div>
		<div class="col-md-11">
			<h2 class="text-left text-danger">Thêm sản phẩm</h2>
		</div>
	</div>

	
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Têm sản phẩm</label>
		    <input type="text" class="form-control" name="tensp">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Giá bán</label>
		    <input type="text" class="form-control"  name="giaban">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">mô tả</label>
		    <input type="text" class="form-control"  name="mota">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Số lượng tồn</label>
		    <input type="text" class="form-control"  name="soluongton">
		  </div>
		 


		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Loại sản phẩm</label>
		    <select name="maloaisp">
				<option value="unselect" selected>Lựa chọn loại sản phẩm</option>
				<?php 
				while ($rowloaisp = mysqli_fetch_array($queryloaisp)) {
				?>
				<option value="<?php echo $rowloaisp['maloaisp']; ?>"><?php echo $rowloaisp['tenloaisp']; ?> </option>
				<?php }?>
			</select>
		  </div>

		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Hãng sản phẩm</label>
		    <select name="mahangsp">
				<option value="unselect" selected>Lựa chọn hãng sản phẩm</option>
				<?php 
				while ($rowhangsp = mysqli_fetch_array($queryhangsp)) {
				?>
				<option value="<?php echo $rowhangsp['mahangsp']; ?>"><?php echo $rowhangsp['tenhangsp']; ?> </option>
				<?php }?>
			</select>
		  </div>
		  <!-- <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">hãng sản phẩm</label>
		    <input type="text" name="mahangsp" class="form-control"  name="mahangsp">
		  </div> -->



		  <div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">load hình ảnh</label>
				<input type="file" class="form-control" name="anh">
			</div>
		  <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
		</form> 
	</div>
</div>
</div>
