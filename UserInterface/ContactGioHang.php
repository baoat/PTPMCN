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
		include("ProcessGioHang/Cart.php");
	}
	elseif($hienthi == 'update'){
		include('ProcessGioHang/Update_cart.php');
	}
	elseif($hienthi == 'showgiohang'){
		include('ShowGioHang.php');
	}
	elseif($hienthi == 'thanhtoan'){
		include('ProcessGioHang/ThanhToan.php');
	}
	elseif($hienthi == 'camon'){
		include('Camon.php');
	}
	else{
		include('ShowGioHang.php');
	}
	
?>