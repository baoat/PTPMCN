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
                    <h2>Bảng Quản Lý Khách Hàng<small></small></h2>
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
                            <th class="column-title">ID</th>
                            <th class="column-title">Email</th>
                            <th class="column-title">Số Điện Thoại</th>
                            <th class="column-title">Tên</th>
                            <th class="column-title">Mật Khẩu</th>
                            <th class="column-title">Địa Chỉ</th>
                            <th class="column-title">Giới Tính</th>
                            <th class="column-title">Avata</th>
                            <th class="column-title no-link last"><span class="nobr">Chỉnh sửa</span>
                            </th>
                            <!-- <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th> -->
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $select = "SELECT * FROM user ";
                          $query = mysqli_query($conn, $select);
                          while($row = mysqli_fetch_assoc($query)) {?>
                            <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo $row['id'] ?></td>
                            <td class=" "><?php echo $row['email'] ?></td>
                            <td class=" "><?php echo $row['sodienthoai'] ?></td>
                            <td class=" "><?php echo $row['name'] ?></td>
                            <td class=" "><?php echo $row['password'] ?></td>
                            <td class=" "><?php echo $row['diachi'] ?></td>
                            <td class=" "><?php echo $row['gioitinh'] ?></td>
                            <td class=" "><img src="../images/<?php echo $row['hinhanh'] ?>" alt=""></td>
                            <td>
                              <!-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                              <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> -->
                              <a onclick="return Delete('<?php echo $row['email']; ?>')" href="index.php?QL=deletekhachhang&id=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
             <script>
              function Delete(name) {
                return confirm("Bạn chắc chắn muốn xoá :" +name+ "?");
              }
             </script>
        <!-- /page content -->