<?php 
if(isset($_GET['quatrinh']))
{
    
	$quatrinh = $_GET['quatrinh'];
    $sql = "SELECT * FROM cart WHERE ma_khachhang = '".$_SESSION['ma_user']."'AND quatrinh = '".$quatrinh."' AND trangthai = 0";
    $query = mysqli_query($conn, $sql);
    
} elseif(isset($_GET['trangthai'])) {
    $trangthai = $_GET['trangthai'];
    $sql = "SELECT * FROM cart WHERE ma_khachhang = '".$_SESSION['ma_user']."'AND quatrinh = 0 AND trangthai = '".$trangthai."'";
    $query = mysqli_query($conn, $sql);
} elseif(isset($_GET['huydon'])) {
    include('HuyDon.php');
} else {
    $sql = "SELECT * FROM cart WHERE ma_khachhang = '".$_SESSION['ma_user']."' AND trangthai = 0";
    $query = mysqli_query($conn, $sql);
}
?>