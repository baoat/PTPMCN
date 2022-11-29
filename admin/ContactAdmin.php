<?php
	if(isset($_GET['QL']))
	{
		$quanLy = $_GET['QL'];
	}
	else
	{
		$quanLy = '';
	}
    if($quanLy == 'QLHangHoa'){
        include("AdminInterface/formquanlyhanghoa.php");
    }elseif($quanLy == 'QLLoaiHangHoa'){
        include("AdminInterface/formquanlyloaisp.php");
    }elseif($quanLy == 'editloaisp'){
        include("AdminInterface/editloaisp.php");
    }elseif($quanLy == 'QLHoaDon'){
        include("AdminInterface/formquanlyhoadon.php");
    }elseif($quanLy == 'QLKhach'){
        include("AdminInterface/formquanlykhach.php");
    }elseif($quanLy == 'chitietdonhang'){
        include("AdminInterface/formchitietdonhang.php");
    }elseif($quanLy == 'trangthai'){
        include("AdminInterface/Process/TrangThai.php");
    }elseif($quanLy == 'QLHangSp'){
        include("AdminInterface/formquanlyhangsp.php");
    }else{
        include('AdminInterface/formhome.php');
    }
	
?>