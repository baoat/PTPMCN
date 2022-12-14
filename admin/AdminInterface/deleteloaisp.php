<?php 
if(isset($_GET['id']))
{
    $id_loaispdelete = $_GET['id'];
}

$sql="DELETE from loaisanpham where maloaisp ='$id_loaispdelete'";
$query =mysqli_query($conn,$sql);
header('location:index.php?QL=QLLoaiHangHoa');

?>