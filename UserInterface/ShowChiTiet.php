<?php
if (isset($_GET['chiTiet'])) {
	$id = $_GET['chiTiet'];
}

$sql = "SELECT * FROM sanpham WHERE masp = '".$id."'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<div class="clearfix chitiet">
	<div class="container-fluid">
		<div class=" flex san-pham-chi-tiet">
			<div class="img-san-pham">
				<div class="img">
					<img src="images/<?php echo $row['anh'] ?>" class="img-1">
				</div>
			</div>
			<div class="chi-tiet-san-pham">
				<div class="thong-tin-chi-tiet">
					<div class="ten-san-pham">
						<span><?php echo $row['tensp'] ?></span>
					</div>
					<div class="danh-gia-san-pham">
						<?php
							include('DanhGia.php');
						?>
					</div>
					<div class="soluongton">
						<span>Kho: <?php echo $row['soluongton'] ?></span>
					</div>	
					<div class="gia-san-pham">
						<?php $_SESSION['giaban'] = $row['giaban']; ?>
						<span><?php echo number_format($row['giaban']); ?>đ</span>
					</div>
					<div class="thanh-phan">
						<div class="mo-ta"><span>Mô tả: </span></div>
						<p><strong><?php echo $row['mota'] ?></strong></p>
					</div>
					<div class="dat-mua">
					<a href="GioHang.php?show=giohang&giohang=<?php echo $row['masp'] ?>" class="btn btn-warning">Thêm vào giỏ hàng</a>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#muangay">Mua ngay</button>
					</div>
				</div>
			</div>
		</div>
		<div class=" show-danh-gia-san-pham ">
			<div class="title-danh-gia">
				<span>ĐÁNH GIÁ SẢN PHẨM</span>
			</div>
			<div class="show-danh-gia-sao">
				<div class="show-tong-sao">
					<span class="tong-sao">5</span><span class="sao-chuan"> Trên 5</span>
					<?php
						include('DanhGia.php');
					?>
				</div>
				<div class="show-sao">

				</div>
			</div>
			<div class="show-danh-gia-nguoi-dung">
				<div class="nguoi-dung">
					<div class="avata-nguoi-dung">
						<img src="data:image/jpeg;base64,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" alt="" >
					</div>
					<div class="ten-nguoi-dung">
						<span>Tên</span>
						<span>Sao</span>
					</div>
				</div>
				<div class="ngay-danh-gia">
					19/12/2022
				</div>
				<div class="noi-dung-danh-gia">
					<span>Tốt</span>
				</div>
			</div>
		</div>
		<div class="flex lien-quan ">
			<div class="container-fluid">
				<div class="san-pham-lien-quan">
					<span>CÓ THỂ BẠN SẼ THÍCH</span>
				</div>
				
				<div class="row show-sanpham">

					<?php
					$sql_sanphamlienquan = "SELECT * FROM sanpham WHERE maloaisp = '".$row['maloaisp']."'";
					$query_sanphamlienquan = mysqli_query($conn, $sql_sanphamlienquan);
					while($row_sanphamlienquan = mysqli_fetch_array($query_sanphamlienquan)) {
						?>
						<div class="show-tung-sanpham">
							<a href="ChiTietSanPham.php?showChitiet=chiTiet&chiTiet=<?php echo $row_sanphamlienquan['masp'] ?>">
								<div class="show-sanpham-1">
									<div class="img-show-sanpham">
										<img src="images/<?php echo $row_sanphamlienquan['anh'] ?>" />
									</div>
									<div class="name-show-sanpham">
										<p style="color: black; margin-top:5px;"><?php echo $row_sanphamlienquan['tensp'] ?></p>
									</div>
									<div class="gia-show-sanpham">
										<span>₫</span><p style=" margin-top:5px;"><?php echo number_format($row_sanphamlienquan['giaban']) ?></p>
									</div>
									<div class="timkiem-lienquan">
										<a href="Index.php?showSanpham=phantrangloai&id=<?php echo $row_sanphamlienquan['masp'] ?>">Tìm kiếm liên quan</a>  
									</div>
								</div>
							</a>
						</div>
						<?php	
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>

