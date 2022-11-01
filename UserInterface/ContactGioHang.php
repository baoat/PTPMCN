<?php
	if(isset($_GET['show']))
	{
		$hienthi = $_GET['show'];
	}
	else
	{
		$hienthi = '';
	}
		include('ShowGioHang.php');
?>