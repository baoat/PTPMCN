<?php
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/StyleUserInterface.css">
    <!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="Scripts/bootstrap.min.js"></script>
</head>
<body>
    <?php
        include('Connection/Connection.php');
        include('UserInterface/Header.php');
    ?>
    <div class="clearfix donhang">
        <div class="container container-fluid">
            <div class="qua-trinh">
                <a class="" id="item" href="DonHang.php">
                    <span>Tất Cả</span>
                </a>
                <a id="item" href="DonHang.php?quatrinh=0">
                    <span>Đang Giao</span>
                </a>
                <a id="item" href="DonHang.php?quatrinh=1">
                    <span>Đã Giao</span>
                </a>
                <a id="item" href="DonHang.php?trangthai=1">
                    <span>Đã Hủy</span>
                </a>
            </div>
        </div>
        <div class="don-hang">
            <?php
                include('UserInterface/ShowDonHang.php');
            ?>
        </div>
    </div>
    <?php
        include('UserInterface/Footer.php');
    ?>
    
</body>
</html>