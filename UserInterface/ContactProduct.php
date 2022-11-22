
	<?php
		if(isset($_GET['showSanpham']))
		{
			$hienthiSanpham = $_GET['showSanpham'];
		}
		else
		{
			$hienthiSanpham = '';
		}
		if($hienthiSanpham == 'phantrangloai'){
			include("AllSanphamLoai.php");
		}
		elseif ($hienthiSanpham == "sanphamtimkiem") {
			include("AllSanphamTimkiem.php");
		}elseif ($hienthiSanpham == "hangsp") {
			include("AllHangSanPham.php");
		}
		elseif ($hienthiSanpham == "loaisp") {
			include("AllProducts.php");
		}
		else
		{
			include("AllProducts.php");
		}
	?>