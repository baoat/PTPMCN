<?php 
if(isset($_GET['quatrinh']))
{
	$quatrinh = $_GET['quatrinh'];
    $sql = "SELECT * FROM cart WHERE ma_khachhang = '".$_SESSION['ma_user']."'AND quatrinh = '".$quatrinh."'";
    $query = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM cart WHERE ma_khachhang = '".$_SESSION['ma_user']."'";
    $query = mysqli_query($conn, $sql);
}
?>