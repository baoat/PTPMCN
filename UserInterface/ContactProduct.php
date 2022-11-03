
	<?php
		if(isset($_GET['showSanpham']))
		{
			$hienthiSanpham = $_GET['showSanpham'];
		}
		else
		{
			$hienthiSanpham = '';
		}
<<<<<<< HEAD
		// if($hienthiSanpham == 'phantrangloai')
		// {
		// 	include("AllSanphamLoai.php");
		// }
		// elseif ($hienthiSanpham == 'dangxuat') {
		// 	include("MainGiaoDien/Dangxuat.php");
		// }
		 if ($hienthiSanpham == "sanphamtimkiem") {
			include("AllSanphamTimkiem.php");
		 }
		else
		{
			include("AllProducts.php");
		}
=======
			include("AllProducts.php");
>>>>>>> d952015609277676972e069e816e2df6658a9c3c
	?>