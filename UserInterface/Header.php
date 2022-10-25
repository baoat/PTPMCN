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
                            <li class="nav-item dropdown">
                                <img src="#" width="35" height="35">
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Nguyễn Chí Bảo
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="Index.php?showIndex=thongtinkhachhang">Thông tin tài khoản</a></li>
                                            <li><a class="dropdown-item" href="Index.php?showIndex=doimatkhau">Đổi mật khẩu </a></li>
                                            <li>
                                                <a class="dropdown-item" href="ShowDonhang.php">Đơn hàng</a>
                                            </li>
                                            <li><a class="dropdown-item" href="Index.php?showSanpham=dangxuat&dangxuat=1">Đăng xuất</a></li>
                                        </ul>
                            </li>
                                    <!--<a class="nav-link active border-end" aria-current="page" href="Registration.php">ĐĂNG KÍ</a>
                                    <a class="nav-link active border-end me-2" aria-current="page" href="Login.php">ĐĂNG NHẬP</a>-->

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
                                <div class="navbar-brand">
                                    <a href="Index.php"><img src="https://www.sapo.vn/Themes/Portal/Default/StylesV2/images/logo/Sapo-logo.svg" class="img-fluid" style="width:180px; height:50px;" /></a>
                                </div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a href="Index.php" class="nav-link active">TRANG CHỦ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link active">GIỚI THIỆU</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active">TIN TỨC</a>
                                        </li>
                                    </ul>
                                    <form class="d-flex form-tim-kiem" action="Index.php?showSanpham=sanphamtimkiem" method="post">
                                        <input class="form-control me-2" type="search" placeholder="Nhập từ khóa" name="san_pham_tim_kiem" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit" name="search"><i class="fas fa-search"></i></button>
                                    </form>

                                    <ul class="navbar-nav cart">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="GioHang.php"><i class="fas fa-shopping-cart"></i>
                                            <span class="number-cart">
                                                1
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