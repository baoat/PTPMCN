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
	elseif($hienthi == 'showgiohang'){
		include('ShowGioHang.php');
	}else{
		include('ShowGioHang.php');
	}
	
?>