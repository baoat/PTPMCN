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
		include('UserInterface/ThongTinKhachHang.php');
	}
	elseif($hienthiIndex == 'doimatkhau')
	{
		include('UserInterface/DoiMatKhau.php');
	}
	else
	{
		include('UserInterface/Menu.php');
	}
?>