<?php
// ob_start();
// if(!isset($_SESSION))
// {
//     session_start();
// }
// if(isset($_SESSION['login']))
// {
?>
    <div class="clearfix giohang">
        <div class="container container-fluid">
            <?php
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
                        $mysql = "SELECT * FROM sanpham WHERE masp = '2'";
                        $run = mysqli_query($conn, $mysql);
                        $row = mysqli_fetch_array($run);
                    ?>
                    <div class="row giohang-sanpham">
                        <div class="check">
                            <input type="checkbox" />
                        </div>
                        <div class="sanpham">
                            <a href=""><img src="images/<?php echo $row['anh'] ?>" width="80" height="80" /></a>
                            <a href=""><?php echo $row['tensp'] ?></a>
                        </div>
                        <div class="Dongia">
                            <?php echo number_format($row['giaban']); echo"K"?>
                        </div>
                        <div class="soluong">
                            <div class="input-soluong">
                                <a href="GioHang.php" class="giam">
                                    <i class="fas fa-minus"></i>
                                </a>
                                <input type="text" class="valuesoluong" value=" 1 <?php
                                //echo number_format($value['soluong'])
                                ?>" />
                                <a href="GioHang.php" class="them">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="sotien">
                            <?php
                                echo number_format($row ['giaban']) 
                             ?>
                        </div>
                        <div class="thaotac">
                            <!-- Xóa sản phẩm khỏi giỏ hàng -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalXoa">
                                Xóa
                            </button>
                        </div>
                    </div>
                    <?php
                //}
                ?>   
            </div>
        </div>

        <div class="row giohang-thanhtien">
            <div class="show-thanhtien">
                <?php
                //$_SESSION['thanhtien'] = $thanhtien;
                ?> 
                <span><strong>Tổng thanh toán: </strong><span class="text-warning" style="font-size: 25px;"><?php echo number_format($row['giaban'])  ?></span></span>
            </div>

            <div class="btn-thanhtoan">
                <!-- Modal -->
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#thanhToan" >Thanh toán</button>
                
            </div>
            <!--<a href="GioHang.php?show=thanhtoan" class="btn btn-warning">Thanh toán</a>-->
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


