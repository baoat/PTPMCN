<?php 
if(isset($_GET['id']))
{
    $id_spdelete = $_GET['id'];
}

$sql="DELETE from sanpham where masp ='$id_spdelete'";
$query =mysqli_query($conn,$sql);
header('location:index.php?QL=QLHangHoa');

?>