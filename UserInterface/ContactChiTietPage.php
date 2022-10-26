<?php
	if(isset($_GET['showChitiet']))
	{
		$hienthiChitiet = $_GET['showChitiet'];
	}
	else
	{
		$hienthiChitiet = '';
	}

	if($hienthiChitiet == "chiTiet")
	{
		include('ShowChiTiet.php');
	}
?>