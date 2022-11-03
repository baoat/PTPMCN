<?php
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
// if(isset($_SESSION['login']))
// {
?>
    <div class="clearfix giohang">
        <div class="container container-fluid">
            <?php
            $thanhtien = 0;
            $tongtien =0;
            // if(isset($_SESSION['cart']) && $_SESSION['number_cart'] != 0)
            // {
                ?>
                <div class="row giohang-title">
                    <div class="check">
                        <input type="checkbox" />
                    </div>
                    <div class="sanpham">
                        Sản phẩm
                    </div>
                    <div class="Dongia">
                        Đơn giá
                    </div>
                    <div class="soluong">
                        Số Lượng
                    </div>
                    <div class="sotien">
                        Số tiền
                    </div>
                    <div class="thaotac">
                        Thao tác
                    </div>
                </div>
                <?php
                foreach ($_SESSION['cart'] as $key => $value) {
                    $sql = "SELECT * FROM sanpham WHERE masp = '".$key."'";
                    $run = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_array($run);
                    $tongtien = $value['soluong'] * $row['giaban'];
                    $thanhtien += $tongtien;
                    ?>
                    <div class="row giohang-sanpham">
                        <div class="check">
                            <input type="checkbox" />
                        </div>
                        <div class="sanpham">
                            <a href=""><img src="<?php echo $row['anh'] ?>" width="80" height="80" /></a>
                            <a href=""><?php echo $row['tensp'] ?></a>
                        </div>
                        <div class="Dongia">
                            <?php echo number_format($row['giaban']); echo"VNĐ"?>
                        </div>
                        <div class="soluong">
                            <div class="input-soluong">
                                <a href="GioHang.php?show=update&minus=<?=$key?>" class="giam">
                                    <i class="fas fa-minus"></i>
                                </a>
                                <input type="text" class="valuesoluong" value="<?php echo number_format($value['soluong'])?>" />
                                <a href="GioHang.php?show=update&plus=<?=$key?>" class="them">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="sotien">
                            <?php echo number_format($tongtien); echo"VNĐ"?>
                        </div>
                        <div class="thaotac">
                            <!-- Xóa sản phẩm khỏi giỏ hàng -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalXoa">
                                Xóa
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalXoa" tabindex="-1" >
                                <div class="modal-dialog modal-dialog-centered" >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa sản phẩm khỏi giỏ hàng</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sản phẩm nè sẽ bị xóa khỏi giỏ hàng
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở về</button>
                                            <a href="GioHang.php?show=update&delete=<?=$key?>" class="btn btn-danger">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Hết modal-->
                        </div>
                    </div>
                    <?php
                }
                ?>   
            </div>
        </div>

        <div class="row giohang-thanhtien">
            <div class="show-thanhtien">
                <?php
                $_SESSION['thanhtien'] = $thanhtien;
                ?> 
                <span><strong>Tổng thanh toán: </strong><span class="text-warning" style="font-size: 25px;"><?php echo number_format($_SESSION['thanhtien']); echo"KVNĐ"?></span></span>
            </div>

            <div class="btn-thanhtoan">
                <?php 
                ?>
                <?php
                ?>
            </div>
            <a href="GioHang.php?show=thanhtoan" class="btn btn-warning">Thanh toán</a>
        </div>
    </div>
    <?php
// }
// else
// {
    ?>
    <!-- <div class="row giohang-trong">
        <div class="text-center">
            <img src="https://drive.gianhangvn.com/image/empty-cart.jpg" class="img-fluid" width="250" height="250" />
            <p><h5><strong>Giỏ hàng của bạn còn trống</strong></h5></p>
            <a href="Index.php" class="btn btn-warning">Mua hàng ngay</a>
        </div>
    </div> -->
    <?php
// }
?>
</div>
</div>
<?php
// }
// else
// {
//     header('location: Login.php');
// }
?>


