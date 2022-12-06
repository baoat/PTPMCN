<?php 
	if(isset($_GET['id']))
	{
		$id_sanphamdelete = $_GET['id'];
	}
?>
<div class="top_nav">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-1 text-left">
			<a href="Admin.php?adminql=product" class="btn btn-sm btn-default"><i class="fas fa-chevron-left"></i></a>
		</div>
		<div class="col-md-11">
			<h2 class="text-left text-danger">Xóa sản phẩm</h2>
		</div>
	</div>
	<?php
		if(!empty($_POST))
		{

			$sql="DELETE from sanpham where masp = '$id_sanphamdelete'";
			$run=mysqli_query($conn, $sql);
			header('location:index.php?QL=QLHangHoa');
				//$conn->close();
		}
	?>
	<?php
		$sql_sanpham = "select * from sanpham where masp = '$id_sanphamdelete'";
		$run_sanpham = mysqli_query($conn, $sql_sanpham);
		$row_sanpham = mysqli_fetch_array($run_sanpham);
	?>
	<div class="row">
		<form action="" method="post">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Id sản phẩm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="masp" value="<?php echo $row_sanpham['masp']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Têm sản phẩm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="tensp" value="<?php echo $row_sanpham['tensp']?>" >
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Địa chỉ hình ảnh</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="anh" value="<?php echo $row_sanpham['anh']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Id loại sản phẩm</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="maloaisp" value="<?php echo $row_sanpham['maloaisp']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Giá bán </label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="giaban" value="<?php echo $row_sanpham['giaban']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Mô Tả</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="mota" value="<?php echo $row_sanpham['mota']?>">
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Số lượng tồn</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="soluongton" value="<?php echo $row_sanpham['soluongton']?>">
		  </div>
		  <button type="submit" class="btn btn-primary">Xóa</button>
		</form> 
	</div>
</div>
</div>