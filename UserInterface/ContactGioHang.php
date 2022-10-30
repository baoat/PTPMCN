<?php
	if(isset($_GET['show']))
	{
		$hienthi = $_GET['show'];
	}
	else
	{
		$hienthi = '';
	}
	if($hienthi == 'giohang'){
		include('MainGiaoDien/Cart.php');
	}
	elseif($hienthi == 'update'){
		include('MainGiaoDien/Update_cart.php');
	}
	elseif($hienthi == 'thanhtoan'){
		include('MainGiaoDien/Thanhtoan.php');
	}
	elseif($hienthi == 'showgiohang'){
		include('ShowGioHang.php');
	}
	elseif($hienthi == 'camon'){
		include('Camon.php');
	}
	else
	{
		include('ShowGioHang.php');
	}
?>