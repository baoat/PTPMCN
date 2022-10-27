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
                  <img height="300" src="" class="d-block w-100">
                </div>
                <div class="carousel-item">
                  <img height="300" src="" class="d-block w-100">
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
              <img height="145" src="" alt="">
            </div>
            <div class="row img-static2">
              <img height="145" src="" alt="">
            </div>
          </div>
        </div>
  </div>
</div>
<div class="clearfix menu">
    <div class="container container-fluid">
        <div class="row danhmuc ">
            <div class="container-fluid">
                <div class="row text-center danhmuc-text">
                    <div class="container-fluid ">
                        <h4>DANH MỤC</h4>
                    </div>
                </div>
                <div class="row danhmuc-menu">
                    <?php
                      $query="select * from hangsanpham";
                      $run = mysqli_query($conn, $query);
                      while ($row=mysqli_fetch_assoc($run)) {
                            ?>
                            <div class="show-danhmuc-menu">
                                    <a href="">
                                        <div class="show-thanhphan ">
                                            <div class="img-danhmuc-muenu">
                                                <img class="logo-menu" src=""/>
                                            </div>

                                            <div class="name-danhmuc-menu"><strong><?php echo $row['tenhangsp'] ?></strong></div>
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
                include("ContactProduct.php");
                ?>
            </div>
        </div>
    </div>
</div>