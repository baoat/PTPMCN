<?php
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
?>

<div class="clearfix donhang">
    <div class="container container-fluid">
        <div class="qua-trinh">
            <a href="Index.php?showDonHang=alldonhang">
                <span>Tất Cả</span>
            </a>
            <a href="#">
                <span>Đang Giao</span>
            </a>
            <a href="#">
                <span>Đã Giao</span>
            </a>
        </div>
    </div>
    <div class="don-hang">
        <?php
            include('ContactDonHang.php');
        ?>
    </div>
</div>