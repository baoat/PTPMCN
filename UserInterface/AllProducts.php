<?php
	if(isset($_GET['trang']))
	{
		$trang = $_GET['trang'];
	}
	else
	{
		$trang = 1;
	}
	$sosp1trang = 12;
	$phantrang = ($trang*$sosp1trang)-$sosp1trang;
	include('ContactProducts.php');
?>
<div class="row show-sanpham">
		<?php
		while ($row=mysqli_fetch_assoc($run)) {
			?>
			<div class="show-tung-sanpham">
				<a href="ChiTietSanPham.php?showChitiet=chiTiet&chiTiet=<?php echo $row['masp'] ?>">
					<div class="show-sanpham-1">
						<div class="img-show-sanpham">
							<img src="images/<?php echo $row['anh'] ?>" />
						</div>
						<div class="name-show-sanpham">
							<p style="color: black; margin-top:5px;"><?php echo $row['tensp'] ?></p>
						</div>
						<div class="gia-show-sanpham">
							<span>₫</span><p style=" margin-top:5px;"><?php echo number_format($row['giaban']) ?></p>
						</div>
						<div class="timkiem-lienquan">
							<a href="Index.php?showSanpham=phantrangloai&id=<?php echo $row['maloaisp'] ?>">Tìm kiếm liên quan</a>  
						</div>
					</div>
				</a>
			</div>
			<?php	
		}
		$sql_phantrang="select*from sanpham";
		$query_phantrang=mysqli_query($conn,$sql_phantrang);
		//tìm số trang cho dữ liệu
		$row_phantrang=mysqli_num_rows($query_phantrang);
		$sotrang=ceil($row_phantrang/$sosp1trang);
		//
		$tentrang="tatcasanpham";
		?>
	<div class="phan-trang">
		<?php
			include("Phantrang.php");
		?>
	</div>
</div>