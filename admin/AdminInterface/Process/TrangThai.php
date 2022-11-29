
<?php
    if(isset($_GET['trangthai'])) {
        $ma_hoadon = $_GET['trangthai'];
    }

    $select_hoadon = "SELECT * FROM cart WHERE ma_hoadon = '".$ma_hoadon."'";
    $query_hoadon = mysqli_query($conn, $select_hoadon);
    $row_hoadon = mysqli_fetch_assoc($query_hoadon);
    
    if($row_hoadon['quatrinh'] == 0) {
        $select_update_hoadon = "UPDATE cart SET quatrinh = 1 WHERE ma_hoadon = '".$ma_hoadon."'";
        $query_update_hoadon = mysqli_query($conn, $select_update_hoadon);

        header('location:index.php?QL=QLHoaDon');
        ob_end_flush();
    } else {
        $select_update_hoadon = "UPDATE cart SET quatrinh = 0 WHERE ma_hoadon = '".$ma_hoadon."'";
        $query_update_hoadon = mysqli_query($conn, $select_update_hoadon);

        header('location:index.php?QL=QLHoaDon'); 
        ob_end_flush();
        exit();
    }
?>