<?php
	if(isset($_GET['showIndex']))
	{
		$hienthiIndex = $_GET['showIndex'];
	}
	else
	{
		$hienthiIndex = '';
	}

	if($hienthiIndex == 'thongtinkhachhang')
	{
		include('ThongTinKhachHang.php');
	}
	elseif($hienthiIndex == 'doimatkhau')
	{
		include('DoiMatKhau.php');
	}
	else
	{
		include('Menu.php');
	}
?>