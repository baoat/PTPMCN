<?php 
if(isset($_GET['id']))
{
    $id_hangspdelete = $_GET['id'];
}

$sql="DELETE from hangsanpham where mahangsp ='$id_hangspdelete'";
$query =mysqli_query($conn,$sql);
header('location:index.php?QL=QLHangSp');

?>