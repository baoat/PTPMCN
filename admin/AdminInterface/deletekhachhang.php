<?php 
if(isset($_GET['id']))
{
    $id_khachhangdelete = $_GET['id'];
}

$sql="DELETE from user where id = ' $id_khachhangdelete'";
$query =mysqli_query($conn,$sql);
header('location:index.php?QL=QLKhach');

?>