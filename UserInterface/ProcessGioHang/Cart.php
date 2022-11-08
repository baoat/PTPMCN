<?php
	ob_start();
	if(!isset($_SESSION))
	{
		session_start();
	}
?>
<?php
	//Lấy giá trị của masp của $_GET['giohang'] gán cho $id
	$id = isset($_GET['giohang']) ? (int) $_GET['giohang'] :'';
	//Truy vấn all sản phẩm khi masp = $id
	$sql="select * from sanpham where masp=$id";
	$run = mysqli_query($conn, $sql);
	while ( $row = mysqli_fetch_array($run)) {
		if(isset($_SESSION['cart']))
		{	
			if(isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]['soluong'] +=1; 
			}
			else{
				$_SESSION['cart'][$id]['soluong'] =1; 
				
			}
			$_SESSION['cart'][$id]['tensp'] = $row['tensp'];
			$_SESSION['cart'][$id]['giaban'] = $row['giaban'];

			header('location:GioHang.php?show= '); exit();
		
		}else
		{
				$_SESSION['cart'][$id]['soluong'] = 1;
				$_SESSION['cart'][$id]['tensp'] = $row['tensp'];
				$_SESSION['cart'][$id]['giaban'] = $row['giaban'];
			('location:GioHang.php?show=showgiohang'); exit();
		}
	}
?>
