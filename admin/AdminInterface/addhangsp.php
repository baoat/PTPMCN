<?php 
 $sqlloaisp ="select * from loaisanpham";
 $queryloaisp =mysqli_query($conn,$sqlloaisp);
 //kiểm tra
 if(isset($_POST['submit'])){
	$tenhangsp =$_POST['tenhangsp'];
    if($_POST['maloaisp']=='unselect'){
		echo "bạn chưa chọn loại sản phẩm";
	}else{
		$maloaisp =$_POST['maloaisp'];
	}
	

		$sql="insert into hangsanpham(tenhangsp,maloaisp)value('$tenhangsp','$maloaisp')";
		$query = mysqli_query($conn, $sql);
		header('location:index.php?QL=QLHangSp');
	
 }
?>
<div class="top_nav">
<div class="container-fluid">

	<div class="row">
		<div class="col-md-1 text-left">
			<a href="index.php?QL=QLHangSp" class="btn btn-sm btn-default"><i class="fas fa-chevron-left"></i></a>
		</div>
		<div class="col-md-11">
			<h2 class="text-left text-danger">Thêm hãng sản phẩm</h2>
		</div>
	</div>

	
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data">
		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Tên hãng sản phẩm</label>
		    <input type="text" class="form-control" name="tenhangsp">
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

		
		  <button name="submit" type="submit" class="btn btn-primary">Thêm</button>
		</form> 
	</div>
</div>
</div>
