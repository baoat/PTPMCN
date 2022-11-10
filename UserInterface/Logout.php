<?php
	if(isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1)
	{
		unset($_SESSION['login']);
		header('location: Index.php'); 
	}
?>