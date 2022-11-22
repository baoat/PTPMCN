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
	}elseif($hienthiIndex == 'dangxuat') {
		include('Logout.php');
	}elseif($hienthiIndex == 'donhang') {
		include('DonHang.php');
	}
	else
	{
		include('Menu.php');
	}