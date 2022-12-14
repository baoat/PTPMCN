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
			<h2 class="text-left text-danger">Sửa hãng sản phẩm</h2>
		</div>
	</div>
	<?php
		$sql = "SELECT * FROM hangsanpham WHERE mahangsp = '$id'";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
	 ?>
	<?php
		if(!empty($_POST))
		{ 
			$id = $_POST['mahangsp'];
			$tenloaisp = $_POST['tenhangsp'];

			
				$sql=" UPDATE hangsanpham SET mahangsp = '$id', tenhangsp = '$tenloaisp' WHERE mahangsp = '$id'";
				$run=mysqli_query($conn, $sql);
				header('location:index.php?QL=QLHangSp');
				//$conn->close();
			}
			
		
	?>

	<div class=" form-edit">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Mã hãng Sản Phảm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="mahangsp" value="<?php echo $row['mahangsp']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Tên hãng sản phẩm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="tenhangsp"  value="<?php echo $row['tenhangsp']?>">
		  </div>
		
		  <button type="submit" class="btn btn-primary">Sửa</button>
		</form> 
	</div>
</div>
	</div>