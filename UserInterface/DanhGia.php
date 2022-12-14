<?php
    $ sql_danhgia = " SELECT * FROM danhgia WHERE masp = ' ". $ id ." ' ";
    $ querr_danhgia = mysqli_query( $ conn , $ sql_danhgia );
    $ tong_gia_tri = 0 ;
    số đếm = 0 ;
    while ( $ row_danhgia = mysqli_fetch_array( $ querr_danhgia )) {
        $ tong_gia_tri += $ row_danhgia [ 'tongsao' ];
        $ đếm ++;
    }
    $ rating = $ tong_gia_tri / $ count ;
    $ xếp hạng = vòng( $ xếp hạng );
    ?>
    < ul  class =" xếp hạng trong danh sách " title =" Xếp hạng trung bình " >
        <?php 
        for ( $ i = 1 ; $ i <= 5 ; $ i ++) {
            nếu ( $ i <= $ xếp hạng )
            {
                $ color = 'màu:#ffcc00;' ;
            } khác {
                $ color = 'màu:#ccc;' ;
            }
            ?>
            < li  style =" con trỏ: con trỏ; <?php  echo  $ color ; ?> " >
                ★
            </li> _ _
            <?php
        }
        ?>
    </ ul >