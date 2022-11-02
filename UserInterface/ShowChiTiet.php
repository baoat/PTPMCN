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
					<div class="soluongton">
						<span>Kho: <?php echo $row['soluongton'] ?></span>
					</div>	
					<div class="gia-san-pham">
						<?php $_SESSION['giaban'] = $row['giaban']; ?>
						<span><?php echo $row['giaban']; ?>đ</span>
					</div>
					<div class="thanh-phan">
						<div class="mo-ta"><span>Mô tả: </span></div>
						<p><strong><?php echo $row['mota'] ?></strong></p>
					</div>
					<div class="dat-mua">
                        <a class="btn btn-warning">Them gio hang</a>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#muangay">Mua ngay</button>
					</div>
				</div>
			</div>
		</div>
		<div class="flex lien-quan ">
			<div class="container-fluid">
				<div class="san-pham-lien-quan">
					<span>SẢN PHẨM LIÊN QUAN</span>
				</div>
				<div class="show-san-pham-lien-quan">
					<?php
					$sql_sanphamlienquan = "SELECT * FROM sanpham WHERE maloaisp = '".$row['maloaisp']."'";
					$query_sanphamlienquan = mysqli_query($conn, $sql_sanphamlienquan);
					while($row_sanphamlienquan = mysqli_fetch_array($query_sanphamlienquan))
					{
						?>
						<div class="san-pham">
							<a href="ChiTietSanPham.php?showChitiet=chiTiet&chiTiet=<?php echo $row_sanphamlienquan['masp'] ?>">
								<div class="show-san-pham">
									<div class="img-san-pham-lien-quan">
										<img src="images/<?php echo $row_sanphamlienquan['anh'] ?>" width="100px" height="100px">
									</div>
									<div class="thong-tin-san-pham-lien-quan">
										<div class="ten-san-pham-lien-quan">
											<span><?php echo $row_sanphamlienquan['tensp'] ?></span>
										</div>
										<div class="danh-gia-san-pham-lien-quan">
										</div>
										<div class="gia-san-pham-lien-quan">
											<span><?php echo $row_sanphamlienquan['giaban'] ?>đ</span>
										</div>
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

