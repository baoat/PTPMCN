<div class="row goi-y">
	<h2 class="text-uppercase">Gợi ý cho bạn</h2>
</div>
<div class="row show-sanpham">
		<?php
		for ($i=0; $i < 10; $i++) { 
			# code...
		// if(isset($_GET['trang']))
		// {
		// 	$trang = $_GET['trang'];
		// }
		// else
		// {
		// 	$trang = 1;
		// }
		// $sosp1trang = 20;
		// $phantrang = ($trang*$sosp1trang)-$sosp1trang;
		// $query="select * from sanpham limit $phantrang, $sosp1trang";
		// $run = mysqli_query($conn, $query);
		// while ($row=mysqli_fetch_assoc($run)) {
			?>
			<div class="show-tung-sanpham">
				<!-- <a href="ChiTietSanPham.php?showChitiet=chiTiet&chiTiet=<?php echo $row['id_sanpham'] ?>"> -->
                <a>
					<div class="show-sanpham-1">
						<div class="img-show-sanpham">
							<img src="" />
						</div>
						<div class="name-show-sanpham">
							<p style="color: black; margin-top:5px;"><strong>Tên sản phẩm</strong></p>
						</div>
						<div class="gia-show-sanpham">
							<p style=" margin-top:5px;">Giá tiền</p>
						</div>
						<div class="timkiem-lienquan">
                            <a>Tìm kiếm liên quan</a>
							<!-- <a href="Index.php?showSanpham=phantrangloai&id=<?php echo $row['id_loainuoc'] ?>">Tìm kiếm liên quan</a> -->
						</div>
					</div>
				</a>
			</div>
			<?php	
		}
		// $sql_phantrang="select*from sanpham";
		// $query_phantrang=mysqli_query($conn,$sql_phantrang);
		// //tìm số trang cho dữ liệu
		// $row_phantrang=mysqli_num_rows($query_phantrang);
		// $sotrang=ceil($row_phantrang/$sosp1trang);
		// //
		// $tentrang="tatcasanpham";
		?>
	<div class="phan-trang">
		<?php
			//include("Phantrang.php");
		?>
	</div>
</div>