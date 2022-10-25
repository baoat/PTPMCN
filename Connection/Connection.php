<?php
	//Kết nối đến CSDL mySql
	$conn = mysqli_connect ("localhost", "root", "", "csdlwebdogiadung") or die("Không kết nối được với CSDL");
	mysqli_set_charset($conn, "utf-8");
?>