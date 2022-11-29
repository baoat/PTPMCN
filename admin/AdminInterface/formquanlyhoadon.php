<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm Kiếm...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Tìm</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="display: block;">

              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bảng Quản Lý Hoá Đơn<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Mã hoá đơn</th>
                            <th class="column-title">Mã khách hàng</th>
                            <th class="column-title">Ngày bán</th>
                            <th class="column-title">Thanh toán</th>
                            <th class="column-title">Họ tên</th>
                            <th class="column-title">Số điện thoại</th>
                            <th class="column-title">Địa chỉ</th>
                            <th class="column-title">Kiểu thanh toán</th>
                            <th class="column-title">Quá Trình</th>
                            <th class="column-title">trạng Thái</th>
                            <th class="column-title no-link last"><span class="nobr">Chỉnh sửa</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <?php
                          $select = "SELECT * FROM cart";
                          $query = mysqli_query($conn, $select);
                        ?>
                        <tbody>
                          <?php
                            while($row = mysqli_fetch_assoc($query)) {?>
                            <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo $row['ma_hoadon'] ?></td>
                            <td class=" "><?php echo $row['ma_khachhang'] ?> </td>
                            <td class=" "><?php echo $row['ngayban'] ?></td>
                            <td class=" "><?php echo $row['thanhtien'] ?></td>
                            <td class=" "><?php echo $row['fullname'] ?></td>
                            <td class=" "><?php echo $row['phone'] ?></td>
                            <td class=" "><?php echo $row['address'] ?></td>
                            <td class=" "><?php echo $row['kieuthanhtoan'] ?></td>
                            <td class=" ">
                              <?php 
                                if($row['quatrinh'] == 1) {
                                  ?>
                                  <a href="index.php?QL=trangthai&trangthai=<?php echo $row['ma_hoadon'] ?>"class="btn btn-sm btn-success">
                                      <i class="fa fa-toggle-on"></i>
                                  </a>
                                  <?php
                                } else {
                                  ?>
                                    <a href="index.php?QL=trangthai&trangthai=<?php echo $row['ma_hoadon'] ?>" class="btn btn-sm btn-danger">
                                        <i class="fa fa-toggle-off"></i>
                                    </a>
                                  <?php
                                }
                              ?>
                              <!-- <?php echo $row['quatrinh'] ?></td> -->
                            <td class=" ">
                            <?php
                              if($row['trangthai'] == 1) {
                                ?>
                                  <a href=""class="btn btn-sm btn-success">
                                  <i class="fa fa-toggle-on"></i>
                                <?php
                              } else {
                                ?>
                                  <a href="" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off"></i>
                                  </a>
                                <?php
                              }
                                ?></td>
                            <td>
                              <a href="index.php?QL=chitietdonhang&chitiet=<?php echo $row['ma_hoadon'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            </td>
                            </td>
                          </tr>
                          <?php  }
                          ?>
                          
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
             
        <!-- /page content -->

        