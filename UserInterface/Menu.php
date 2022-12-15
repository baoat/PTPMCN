<div class="clearfix header-title">
      <div class="container container-fluid">
        <div class="row imgqc">
          <div class="img-gif">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img height="300" src="https://i.imgur.com/jn0u6q8.png" class="d-block w-100" >
                </div>
                <div class="carousel-item">
                  <img height="300" src="https://vnn-imgs-f.vgcloud.vn/2021/07/09/21/may-giat-1-1.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img height="300" src="https://i1-sohoa.vnecdn.net/2020/05/26/a4-8411-1590471771.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=8Hw7Vvi0VsDBUqc5jFzWqQ" class="d-block w-100">
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class=" img-static">
          <div class="row img-static1">
              <img height="145" src="https://vitrangreview.com/wp-content/uploads/2021/04/kinh-nghiem-chon-mua-bep-ga-duong-2.jpg" alt="">
            </div>
            <div class="row img-static2">
              <img height="145" src="https://khanhvyhome.com.vn/image/catalog/baiviet/chau-rua-chen/chau-rua-chen-02032020-04.png" alt="">
            </div>
          </div>
        </div>
  </div>
</div>
<div class="clearfix menu">
    <div class="container container-fluid">
        <div class="row danhmuc ">
            <div class="container-fluid">
                <div class="row danhmuc-text">
                    <div class="container-fluid ">
                        <span class="text-uppercase font-sine" >Danh mục</span>
                    </div>
                </div>
                <div class="row danhmuc-menu">
                    <?php
                      $query="select * from loaisanpham";
                      $run = mysqli_query($conn, $query);
                      while ($row=mysqli_fetch_assoc($run)) {
                            ?>
                            <div class="show-danhmuc-menu">
                                    <a href="Index.php?id=<?php echo $row['maloaisp'] ?>">
                                        <div class="show-thanhphan ">
                                            <div class="img-danhmuc-muenu">
                                                <img class="logo-menu" src="images/<?php echo $row['hinhanh'] ?> "/>
                                            </div>

                                            <div class="name-danhmuc-menu" style="font-size: 0.84rem"><?php echo $row['tenloaisp'] ?></div>
                                        </div>

                                    </a>
                                </div>
                            <?php
                      }
                    ?>
                                
                </div>
            </div>
        </div>
        <div class="row sanpham">
            <div class="container-fluid">
                <?php
                  include("AllProducts.php");
                ?>
            </div>
        </div>
    </div>
</div>