<?php
	if(isset($_GET['showDonHang']))
	{
		$hienthiDonHang = $_GET['showDonHang'];
	}
	else
	{
		$hienthiDonHang = '';
	}
	if($hienthiDonHang == 'alldonhang') {
		include('ShowDonhang.php');
	}else{
		include('ShowDonhang.php');
	}
        
?>