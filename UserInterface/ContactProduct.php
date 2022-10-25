
	<?php
		if(isset($_GET['showSanpham']))
		{
			$hienthiSanpham = $_GET['showSanpham'];
		}
		else
		{
			$hienthiSanpham = '';
		}
		// if($hienthiSanpham == 'phantrangloai')
		// {
		// 	include("AllSanphamLoai.php");
		// }
		// elseif ($hienthiSanpham == 'dangxuat') {
		// 	include("MainGiaoDien/Dangxuat.php");
		// }
		// elseif ($hienthiSanpham == "sanphamtimkiem") {
		// 	include("AllSanphamTimkiem.php");
		// }
		// else
		//{
			include("AllProducts.php");
		//}
	?>