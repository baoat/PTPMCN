<?php
    if(isset($_GET['huydon']))
    {
        $huydon = $_GET['huydon'];
        $sql = "UPDATE cart SET trangthai = 1 WHERE ma_hoadon = '".$huydon."'";
        $query = mysqli_query($conn, $sql);
        header('location:DonHang.php?'); exit();
    }
?>