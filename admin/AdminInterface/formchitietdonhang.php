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
                    <h2>Chi Tiết Đơn Hàng<small></small></h2>
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
                            <th class="column-title">Mã Hóa Đơn</th>
                            <th class="column-title">Mã Sản Phẩm</th>
                            <th class="column-title">Giá Bán</th>
                            <th class="column-title">Số Lượng</th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($_GET['chitiet'])) {
                                $ma_hoadon = $_GET['chitiet'];
                            }
                          $select = "SELECT * FROM cart_detail WHERE ma_hoadon = '".$ma_hoadon."' ";
                          $query = mysqli_query($conn, $select);
                          while($row = mysqli_fetch_assoc($query)) {?>
                            <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo $row['ma_hoadon'] ?></td>
                            <td class=" "><?php echo $row['id_sanpham'] ?></td>
                            <td class=" "><?php echo $row['giaban'] ?></td>
                            <td class=" "><?php echo $row['soluong'] ?></td>
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