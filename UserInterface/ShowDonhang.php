<?php
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
?>
<?php
    include('ContactDonHang.php');
?>
<div class="show-don-hang">
	<div class="container container-fluid">
        <?php
        
        $number_cart = 0;
        while($row = mysqli_fetch_array($query)) {
            $number_cart ++;
            if($number_cart != 0) {
                $sql_cart_detail = "SELECT * FROM cart_detail WHERE ma_hoadon = '".$row['ma_hoadon']."'";
                $query_cart_detail = mysqli_query($conn, $sql_cart_detail);
                ?>
                <div class=" container-fluid phan-loai-don-hang">
                <?php
                while ($row_cart_detail = mysqli_fetch_array($query_cart_detail)) {
                    $sql_sanphanm = "SELECT * FROM sanpham WHERE masp = '".$row_cart_detail['id_sanpham']."'";
                    $query_sanpham = mysqli_query($conn, $sql_sanphanm);
                    $row_sanpham = mysqli_fetch_array($query_sanpham);?>
                    <div class="list-don-hang">
                        <div class="item-don-hang">
                            <a href="" class="san-pham-don-hang">
                                <div class=" row show-san-pham-don-hang">
                                    <div class="img-san-pham-don-hang">
                                        <!-- <img src="<?php echo $row_sanpham['anh'];  ?>" alt=""> -->
                                        <img src="" alt="">
                                    </div>
                                    <div class="thong-tin-san-pham-don-hang">
                                        <div class="ten-san-pham-don-hang">
                                            <span><?php echo $row_sanpham['tensp']; ?></span>
                                        </div>
                                        <div class="so-luong-san-pham-don-hang">
                                            <span>Số lượng: <?php echo $row_cart_detail['soluong']; ?></span>
                                        </div>
                                        <div class="gia-san-pham-don-hang">
                                            <span><?php echo $row_sanpham['giaban'] ?></span><span>VNĐ</span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="huy-don">
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalXoa">
                                Hủy Đơn Hàng
                            </button>
                            
                        </div>
                        <div class="modal fade" id="modalXoa" tabindex="-1" >
                            <div class="modal-dialog modal-dialog-centered" >
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">HỦY ĐƠN HÀNG</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn Có Chắc Chắn Muốn Hủy Đơn Hàng Này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở về</button>
                                        <a class="btn btn-danger" href="DonHang.php?huydon=<?php echo $row['ma_hoadon'] ?>">Hủy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                echo "Chưa có đơn hàng.";
            }
            ?>
                <div class="tong-tien-hoa-don">
                    <div class="show-tong-so-tien-hoa-don">
                        <span>Tổng số tiền: </span>
                        <span class="so"><?php echo $row['thanhtien']; ?></span><span>VNĐ</span>
                    </div>
                </div>
                <div class="lien-he-shop">
                    <a href="" class="btn btn-warning">Liên hệ Shop</a>
                </div>
            </div>
            <?php
        }
        $_SESSION['number_cart'] = $number_cart;
        ?>
    </div>

</div>