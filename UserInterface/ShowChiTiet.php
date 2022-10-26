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
					<img src="<?php echo $row['anh'] ?>" class="img-1">
				</div>
			</div>
			<div class="chi-tiet-san-pham">
				<div class="thong-tin-chi-tiet">
					<div class="ten-san-pham">
						<span><?php echo $row['tensp'] ?></span>
					</div>
					
					<div class="gia-san-pham">
						<?php $_SESSION['giaban'] = $row['giaban']; ?>
						<span><?php echo $row['giaban']; ?>đ</span>
					</div>
					<div class="thanh-phan">
						<div class="chi-tiet-thanh-phan">
							<span><?php echo $row['mota'] ?></span>
						</div>
					</div>
					<div class="dat-mua">
						
						<!-- <a href="GioHang.php?show=giohang&giohang=<?php echo $row['id_sanpham'] ?>" class="btn btn-warning">Thêm vào giỏ hàng</a> -->
                        <a class="btn btn-warning">Them gio hang</a>
						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#muangay">Mua ngay</button>
						<!-- Xử lý sự kiện cho nút mua ngay -->
						<?php 
						if(isset($_POST['hoanthanh']))
						{
							$ngayban = date('y/m/d');
							$ma_khachhang = $_SESSION['ma_khachhang'];
							$thanhtien = $_SESSION['dongia'];
							$tennguoinhan = $_POST['tennguoinhan'];
							$sđt = $_POST['sđt'];
							$address = $_POST['address'];
							$kieuthanhtoan = $_POST['pay'];

							$query = mysqli_query($conn, "INSERT INTO cart(ngayban, ma_khachhang, thanhtien, fullname, phone, address, kieuthanhtoan) VALUES ('$ngayban', '$ma_khachhang', '$thanhtien', '$tennguoinhan', '$sđt', '$address', '$kieuthanhtoan')");
							if($query)
							{
            				//Lấy mã hóa đơn trong bảng cart
								$ma_hoadon = mysqli_insert_id($conn);

								foreach ($_SESSION['cart'] as $key => $value) {
									mysqli_query($conn, "INSERT INTO cart_detail(ma_hoadon, id_sanpham, dongia, soluong) VALUES('$ma_hoadon', '$key', '$value[dongia]', '$value[soluong]')");
								}


							}
							unset($_SESSION['cart']);
							header('location:GioHang.php?show=camon');
						}
						?>
						<?php
						// if(isset($_SESSION['login'])){
						// 	$id = $_SESSION['ma_khachhang'];
						// }
						

						// $sql_khachhang = "SELECT * FROM tkkhachhang WHERE ma_khachhang = '".$id."'";
						// $run_khachhang = mysqli_query($conn, $sql_khachhang);
						// $row_khachhang = mysqli_fetch_array($run_khachhang);
						// ?>
						<!-- Modal -->
						<div class="modal fade" id="muangay" tabindex="-1" >
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Thanh toán</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="" method="POST">
											<div class="row">
												<div class="mb-3 tennguoinhan">
													<label class="form-label">Họ tên người nhận</label>
													<input type="text" class="form-control" name="tennguoinhan" value="<?php echo $row_khachhang['hoten'] ?>">
												</div>
												<div class="mb-3 password">
													<label  class="form-label">Số điện thoại người nhận</label>
													<input type="text" class="form-control" name="sđt" value="<?php echo $row_khachhang['sđt'] ?>">
												</div>
											</div>
											<div class="row address">
												<div class="mb-3 address">
													<label class="form-label">Địa chỉ người nhận</label>
													<input type="text" class="form-control" name="address" value="<?php echo $row_khachhang['diachi']?>">
												</div>
											</div>
											<div class="row">
												<div class="mb-3 kieuthanhtoan">
													<label class="form-label">Kiểu thanh toán</label>
													<select class="form-select" name="pay">
														<option value="">Chọn kiểu thanh toán</option>
														<option value="athmoe">Thanh toán tại nhà</option>
														<option value="credit">Thanh toán bằng thẻ tính dụng </option>
													</select>
												</div>
											</div>
											<div class="modal-footer">
												<a href="ChiTietSanPham.php?showChitiet=chiTiet&chiTiet=<?php echo $row['id_sanpham'] ?>" class="btn btn-secondary"><i class="fas fa-chevron-left"></i>Trở về</a>
												<button type="submit" name="hoanthanh" class="btn btn-warning">Hoàn thành</button>
											</div>
										</form>

									</div>
								</div>
							</div>
						</div>
						<!-- Kết thúc Modal -->
						<!-- kết thúc sự kiện của nút mú ngay -->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dattruoc">Đặt trước</button>
						<!-- Xử lý sự kiện nút đặt trước -->
						<!-- Kết thúc sự kiện nút đặt trước -->
					</div>
				</div>
			</div>
		</div>
		<div class="flex lien-quan ">
			<div class="container-fluid">
				<div class="san-pham-lien-quan">
					<span>SẢN PHẨM LIÊN QUAN</span>
				</div>
				<!-- <div class="show-san-pham-lien-quan">
					<?php
					$sql_sanphamlienquan = "SELECT * FROM sanpham WHERE id_loainuoc = '".$row['id_loainuoc']."'";
					$query_sanphamlienquan = mysqli_query($conn, $sql_sanphamlienquan);
					while($row_sanphamlienquan = mysqli_fetch_array($query_sanphamlienquan))
					{
						?>
						<div class="san-pham">
							<a href="ChiTietSanPham.php?showChitiet=chiTiet&chiTiet=<?php echo $row_sanphamlienquan['id_sanpham'] ?>">
								<div class="show-san-pham">
									<div class="img-san-pham-lien-quan">
										<img src="<?php echo $row_sanphamlienquan['hinhanh'] ?>" width="100px" height="100px">
									</div>
									<div class="thong-tin-san-pham-lien-quan">
										<div class="ten-san-pham-lien-quan">
											<span><?php echo $row_sanphamlienquan['tensanpham'] ?></span>
										</div>
										<div class="danh-gia-san-pham-lien-quan">
											<?php
											$sql_danhgia_splq = "SELECT * FROM danhgia WHERE id_sanpham = '".$row_sanphamlienquan['id_sanpham']."'";
											$querr_danhgia_splq = mysqli_query($conn, $sql_danhgia_splq);
											$tong_gia_tri_splq = 0;
											$count_splq = 0;
											while ($row_danhgia_splq = mysqli_fetch_array($querr_danhgia_splq)) {
												$tong_gia_tri_splq += $row_danhgia_splq['danhgia'];
												$count_splq ++;
											}
											$rating_splq = $tong_gia_tri_splq/$count_splq;
											$rating_splq = round($rating_splq);
											?>
											<ul class="list-inline rating" title="Average Rating">
												<?php 
												for ($i=1; $i <= 5; $i++) { 
													if($i<=$rating_splq)
													{
														$color = 'color:#ffcc00;';
													}else{
														$color = 'color:#ccc;';
													}
													?>
													<li style="cursor:pointer;<?php echo $color; ?> font-size: 30px;">
														&#9733;
													</li>
													<?php
												}
												?>
											</ul>
										</div>
										<div class="gia-san-pham-lien-quan">
											<span><?php echo $row_sanphamlienquan['dongia'] ?>.000đ</span>
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
		</div> -->
	</div>
</div>

