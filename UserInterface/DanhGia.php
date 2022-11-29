<?php
    $sql_danhgia = "SELECT * FROM danhgia WHERE masp = '".$id."'";
    $querr_danhgia = mysqli_query($conn, $sql_danhgia);
    $tong_gia_tri = 0;
    $count = 0;
    while ($row_danhgia = mysqli_fetch_array($querr_danhgia)) {
        $tong_gia_tri += $row_danhgia['tongsao'];
        $count ++;
    }
    $rating = $tong_gia_tri/$count;
    $rating = round($rating);
    ?>
    <ul class="list-inline rating" title="Average Rating">
        <?php 
        for ($i=1; $i <= 5; $i++) { 
            if($i<=$rating)
            {
                $color = 'color:#ffcc00;';
            }else{
                $color = 'color:#ccc;';
            }
            ?>
            <li style="cursor:pointer;<?php echo $color; ?>">
                &#9733;
            </li>
            <?php
        }
        ?>
    </ul>