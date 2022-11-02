
	<?php
		if(isset($_GET['showSanpham']))
		{
			$hienthiSanpham = $_GET['showSanpham'];
		}
		else
		{
			$hienthiSanpham = '';
		}
			include("AllProducts.php");
	?>