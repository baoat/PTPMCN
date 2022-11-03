<?php
	//Kết nối đến CSDL mySql
	$conn = mysqli_connect ("localhost", "root", "", "dogiadung") or die("Không kết nối được với CSDL");
	// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
  }
   mysqli_character_set_name($conn);
  
  // Change character set to utf8
  mysqli_set_charset($conn,"utf8"); mysqli_character_set_name($conn);
?>