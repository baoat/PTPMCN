<?php
ob_start();
if(!isset($_SESSION))
{
    session_start();
}
?>
<?php
	if(isset($_GET['dangxuatAdmin']) && $_GET['dangxuatAdmin'] == 1)
	{
		unset($_SESSION['login_Admin']);

		header('location: ../Login.php'); exit();
	}
?>