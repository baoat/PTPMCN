<?php
ob_start();
session_start();
?>
<!--Header-->
<div class="clearfix header">
    <div class="container container-fluid">
        <div class="row header-static">
            <div class="container container-fluid">
                <!--Header Kết nối-->
                <div class="row header-trangchu">
                    <div class="container-fluid navbar">
                        <div class="cach">

                        </div>
                        <div class="taikhoan-ketnoi">
                            <?php
                                if(isset($_SESSION['login'])) {
                                    ?>
                                    <li class="nav-item dropdown">
                                <img src="<?php echo $_SESSION['avata']; ?>" width="35" height="35">
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php
                                            echo $_SESSION['login'];
                                            ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="Index.php?showIndex=thongtinkhachhang">Thông tin tài khoản</a></li>
                                            <li><a class="dropdown-item" href="Index.php?showIndex=doimatkhau">Đổi mật khẩu </a></li>
                                            <li>
                                                <a class="dropdown-item" href="DonHang.php">Đơn hàng</a>
                                            </li>
                                            <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                                        </ul>
                            </li>
                                    <?php
                                }else{
                                    ?>
                                    <a class="nav-link active border-end" aria-current="page" href="Registration.php">ĐĂNG KÍ</a>
                                    <a class="nav-link active border-end me-2" aria-current="page" href="Login.php">ĐĂNG NHẬP</a>
                                    <?php
                                }
                            ?>
                                    

                                <p class=" me-2 ">KẾT NỐI</p>
                                <a class="nav-link active" href="#"><i class="fab fa-facebook"></i></a>
                                <a class="nav-link active" href="#"><i class="fab fa-google-plus"></i></a>
                                <a class="nav-link active" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="nav-link active" href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Header Trang chủ-->
                <div class="row header-menu bg-warning">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light ">
                            <div class="container-fluid">
                                <div class="navbar-brand logo">
                                    <a href="Index.php"><img src="https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/logo/Sapo-logo.svg" class="img-fluid" style="width:180px; height:50px;" /></a>
                                </div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div class="search-hang form-tim-kiem">
                                        <div class="search-form">
                                            <form class="d-flex " action="Index.php?showSanpham=sanphamtimkiem" method="post">
                                                <input class="form-control me-2" type="search" placeholder="Nhập từ khóa" name="san_pham_tim_kiem" aria-label="Search">
                                                <button class="btn btn-outline-success" type="submit" name="search"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                        <div class="hang">
                                        <?php
                                            $select = "SELECT * FROM hangsanpham";
                                            $query = mysqli_query($conn, $select);
                                            while($row = mysqli_fetch_array($query)) {
                                        ?>
                                            
                                                <a href="Index.php?showSanpham=hangsp&id_hangsp=<?php echo $row['mahangsp'] ?>"><?php echo $row['tenhangsp'] ?></a>
                                            
                                        <?php    
                                            }
                                        ?>
                                        </div>
                                    </div>
                                    

                                    <ul class="navbar-nav cart">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="GioHang.php"><i class="fas fa-shopping-cart"></i>
                                            <?php
                                                if(isset($_SESSION['login']))
                                                {   
                                                    if(isset($_SESSION['cart']))
                                                    {
                                                        $number_cart = 0;
                                                        foreach ($_SESSION['cart'] as $key => $value) {
                                                            $number_cart ++;
                                                        }
                                                        $_SESSION['number_cart'] = $number_cart;
                                                    }
                                                    else
                                                    {
                                                       $_SESSION['number_cart'] = 0;
                                                    }
                                               } else {
                                                $_SESSION['number_cart'] = 0;
                                                }
                                            ?>
                                            <span class="number-cart">
                                                <?php echo $_SESSION['number_cart']; ?>
                                            </span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>