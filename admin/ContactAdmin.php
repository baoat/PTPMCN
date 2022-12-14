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
    }elseif($quanLy == 'addsp'){
        include("AdminInterface/addsp.php");
    }elseif($quanLy == 'editsp'){
        include("AdminInterface/editsp.php");
    }elseif($quanLy == 'deletesp'){
        include("AdminInterface/deletesp.php");
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
    }elseif($quanLy == 'dangxuatAdmin'){
        include("AdminInterface/Process/Logout.php");
    }else{
        include('AdminInterface/formhome.php');
    }
	
?>