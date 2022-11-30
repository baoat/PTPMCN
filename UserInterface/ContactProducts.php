<?php
    if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql="select * from loaisanpham where maloaisp ='".$id."'";
		$run=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($run);
		?>
		<div class="row goi-y">
			<span class="text-uppercase"><?php echo $row['tenloaisp'] ?></span>
		</div>
		<?php
		$query="select * from sanpham where maloaisp = $id AND soluongton > 0 limit $phantrang, $sosp1trang";
		$run = mysqli_query($conn, $query);
	} elseif(isset($_POST['search'])) {
        $search = $_POST['san_pham_tim_kiem'];
        ?> 
        <div class="row goi-y">
            <span class="text-uppercase">Sản phẩm liên quan đến "<?php echo "$search"; ?></span>
        </div>
        <?php
        $query="select * from sanpham where tensp like '%$search%' AND soluongton > 0 limit $phantrang, $sosp1trang";
		$run = mysqli_query($conn, $query);
    } elseif(isset($_GET['id'])) {
        $sql="select * from hangsanpham where mahangsp ='".$id."'";
        $run=mysqli_query($conn, $sql);
        $row=mysqli_fetch_array($run);
        ?>
        <div class="row goi-y">
            <span class="text-uppercase"><?php echo $row['tenhangsp'] ?></span>
        </div>
        <?php
        $query="select * from sanpham where mahang = $id AND soluongton > 0 limit $phantrang, $sosp1trang";
		$run = mysqli_query($conn, $query);
    } else {
		?>
		<div class="row goi-y">
			<span class="text-uppercase">Gợi ý cho bạn</span>
		</div>
		<?php
		$query="select * from sanpham WHERE soluongton > 0 limit $phantrang, $sosp1trang ";
		$run = mysqli_query($conn, $query);
	}
?>