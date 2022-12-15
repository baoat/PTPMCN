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
							include('ShowSao.php');
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
					<span class="tong-sao"><?php echo $rating ?></span><span class="sao-chuan"> Trên 5</span>
					<?php
						include('ShowSao.php');
					?>
				</div>
				<div class="show-sao">
				</div>
			</div>
			<?php
				$sql_danhgia = "SELECT * FROM chitietdanhgia WHERE id_sanpham = '".$id."'";
				$querr_danhgia = mysqli_query($conn, $sql_danhgia);
				while($row_danhgia = mysqli_fetch_array($querr_danhgia)) {
					$sql_user = "SELECT * FROM user WHERE id ='".$row_danhgia['id_user']."'";
					$query_user = mysqli_query($conn, $sql_user);
					while($row_user = mysqli_fetch_array($query_user)) {
			?>
			<div class="show-danh-gia-nguoi-dung">
				<div class="nguoi-dung">
					<div class="avata-nguoi-dung">
						<img style="border-radius: 50%;" src="<?php echo $row_user['hinhanh'] ?>" alt="" width="35" height="35">
					</div>
					<div class="ten-nguoi-dung">
						<span><?php echo $row_user['name'] ?></span>
						<ul class="list-inline rating" title="Average Rating">
						<?php 
						for ($i=1; $i <= 5; $i++) { 
							if($i<=$row_danhgia['sosaodanhgia'])
							{
								$color = 'color:#ffcc00;';
							}else{
								$color = 'color:#ccc;';
							}
							?>
							<li style="cursor:pointer;<?php echo $color; ?>">
								&#9733;
							</li>
							<?php
						}
						?>
					</ul>
					</div>
				</div>
				<div class="ngay-danh-gia">
					<?php echo $row_danhgia['ngaydanhgia'] ?>
				</div>
				
				<div class="comment">
					<div class="noi-dung-danh-gia">
						<span><?php echo $row_danhgia['noidungdanhgia'] ?></span>
					</div>
					<?php
						if(isset($_SESSION['ma_user']) && $row_danhgia['id_user'] == $_SESSION['ma_user']) {
							?>
							<div class="xoa-danh-gia">
								<a href="ChiTietSanPham.php?showChitiet=chiTiet&action=xoadanhgia&id_xoadanhgia=<?php echo $row_danhgia['id'] ?>&chiTiet=<?php echo $id ?>" class="btn btn-danger">
									Xóa
								</a>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<?php
					}
				}
			?>
			<?php
				$action = isset($_GET['action']) ? $_GET['action'] : '';
					if($action == 'danhgia') {
						if(isset($_POST['submit'])) {
							if(!isset($_POST['sao'])) {
								?>
								<span style="color:red;">Vui lòng nhập số sao đánh giá.</span>
								<?php
							} else {
								$sao = $_POST['sao'];
								$ma_khachhang = $_SESSION['ma_user'];
								$ngaydanhgia = date('y/m/d');
								$noidung = $_POST['noidung'];
								$id_sanpham = $row['masp'];
								$sql = "INSERT INTO chitietdanhgia(ngaydanhgia, id_user, id_sanpham, sosaodanhgia, noidungdanhgia) VALUES ('$ngaydanhgia', '$ma_khachhang', '$id_sanpham', '$sao', '$noidung')";
								$query = mysqli_query($conn, $sql);
								header('location: ChiTietSanPham.php?showChitiet=chiTiet&action=danhgia&chiTiet='.$id.'');
							}
						}
							?>

						<div class=" form-danh-gia ">
							<form action="" method="post">
								<div class="input-sao">
								<span>Chọn số sao: </span>
								<?php
									for ($i=1; $i <= 5; $i++) { 
										?>
										<div class="form-check">
											<input class="form-check-input" type="radio" value="<?php echo $i ?>" name="sao" id="sao">
											<label class="form-check-label" for="sao">
												<?php echo $i  ?>
											</label>
										</div>
										<?php
									}
								?>
								</div>
								<div class="input-danh-gia">
									<div class="search-form">
										<input class="form-control me-2" type="text" placeholder="" name="noidung" id="noidung"	>
										<button class="btn btn-outline-success" type="submit" name="submit" id="submit">Gửi</button>
									</div>
								</div>
							</form>
						</div>
					<?php
					} elseif($action == 'xoadanhgia') {
						$id_xoadanhgia = isset($_GET['id_xoadanhgia']) ? $_GET['id_xoadanhgia'] : '';
						$sql_xoadanhgia = "DELETE FROM chitietdanhgia WHERE id = '".$id_xoadanhgia."'";
						$query_xoadanhgia = mysqli_query($conn, $sql_xoadanhgia);
						header('location: ChiTietSanPham.php?showChitiet=chiTiet&chiTiet='.$_GET['chiTiet'].'');
					}
						
					?>
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
										<a href="Index.php?showSanpham=phantrangloai&id=<?php echo $row_sanphamlienquan['masmaloaisp'] ?>">Tìm kiếm liên quan</a>  
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

