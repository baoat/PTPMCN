<?php
	session_start();
?>
<?php
	if(isset($_SESSION['cart']))
	{
	
		//Tăng số lượng mua 1 sản phẩm trong giỏ hàng
		// tạo biến $plus bằng biến $_GET['plus']
		$plus = isset($_GET['plus']) ? (int) $_GET['plus'] :'';
		$query = mysqli_query($conn, "SELECT * FROM sanpham WHERE masp = '$plus'");
		$row = mysqli_fetch_array($query);
		//Kiểm tra 
		if($plus)
			{
				$_SESSION['cart'][$plus]['soluong'] +=1;
				if($_SESSION['cart'][$plus]['soluong'] > $row['soluongton']) {
					$_SESSION['cart'][$plus]['soluong'] = $row['soluongton'];
				} elseif($_SESSION['cart'][$plus]['soluong'] >= 100) {
					$_SESSION['cart'][$plus]['soluong'] = 100;
				}
				header('location:GioHang.php?show= '); exit();
			}
		//Giảm số lượng mua 1 sản phẩm trong giỏ hàng
		// tạo biến $minus bằng biến $_GET['minus']
		$minus = isset($_GET['minus']) ? (int) $_GET['minus'] :'';
		//Kiểm tra 
		if($minus)
			{
				if($_SESSION['cart'][$minus]['soluong'] > 1)
				{
					$_SESSION['cart'][$minus]['soluong'] -=1;
					header('location:GioHang.php?show= '); exit();
				}
				elseif($_SESSION['cart'][$minus]['soluong'] == 1)
				{
					if(array_key_exists($minus, $_SESSION['cart']))
					{
						unset($_SESSION['cart'][$minus]);
						header('location:GioHang.php?show= '); exit();
					}
				}
			}
		//xóa sản phẩm
		// tạo biến $delete bằng biến $_GET['delete']
		$delete = isset($_GET['delete']) ? (int)$_GET['delete'] : '';
		//kiểm tra nếu true
		if($delete)
		{
			//kiểm tra key đã cho được thiết lập trong mãng thì trả về TRUE
			if(array_key_exists($delete, $_SESSION['cart']))
			{
				//xóa thông tin session
				unset($_SESSION['cart'][$delete]);
				//session_destroy();
				header('location:GioHang.php?show= '); exit();
			}
		}

	}

?>