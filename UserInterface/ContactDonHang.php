<?php
	if(isset($_GET['showDonHang']))
	{
		$hienthiDonHang = $_GET['showDonHang'];
	}
	else
	{
		$hienthiDonHang = '';
	}
        include('ShowDonhang.php');
?>