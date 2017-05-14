<?php include 'head.php'; ?>

<div class="wrapper">

    <!-- Main Header -->
    <?php include 'header.php'; ?>

    <!-- Left side column. contains the logo and sidebar -->
    <?php include 'leftside.php' ?>;

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ยินดีต้อนรับ
                <small>คุณ <?php echo $s_admin_fullname; ?> [ ID: <?php echo $_SESSION['admin_id']; ?>]</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
                <li class="active">หน้าหลัก</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user-secret"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql_admin = "SELECT COUNT(*) AS count_admin FROM admins";
                            $result_admin = mysqli_query($link, $sql_admin);
                            $count_admin = mysqli_fetch_assoc($result_admin);
                            ?>
                            <span class="info-box-text">จำนวนผู้ใช้งาน</span>
                            <span class="info-box-number"><?= $count_admin['count_admin']; ?>
                                <small>คน</small></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql_user = "SELECT COUNT(*) AS count_user FROM users";
                            $result_user = mysqli_query($link, $sql_user);
                            $count_user = mysqli_fetch_assoc($result_user);
                            ?>
                            <span class="info-box-text">จำนวนผู้ใช้งาน</span>
                            <span class="info-box-number"><?= $count_user['count_user']; ?>
                                <small>คน</small></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-android"></i></span>
                        <div class="info-box-content">
                            <?php
                            $sql_machine = "SELECT COUNT(*) AS count_machine FROM machines";
                            $result_machine = mysqli_query($link, $sql_machine);
                            $count_machine = mysqli_fetch_assoc($result_machine);
                            ?>
                            <span class="info-box-text">จำนวนเครื่อง</span>
                            <span class="info-box-number"><?= $count_machine['count_machine']; ?>
                                <small>เครื่อง</small></span>
                        </div>
                    </div>
                </div>

                <!--                <div class="col-md-3 col-sm-6 col-xs-12">-->
                <!--                    <div class="info-box">-->
                <!--                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>-->
                <!--                        <div class="info-box-content">-->
                <!--                            --><?php
                //                            $sql_cust = "SELECT COUNT(*) AS COUNTCUST FROM customer";
                //                            $result_cust = mysqli_query($link, $sql_cust);
                //                            $count_cust = mysqli_fetch_assoc($result_cust);
                //                            ?>
                <!--                            <span class="info-box-text">จำนวนลูกค้า</span>-->
                <!--                            <span class="info-box-number">-->
                <? //= $count_cust['COUNTCUST']; ?><!-- <small>คน</small></span>-->
                <!--                        </div><!-- /.info-box-content -->
                <!--                    </div><!-- /.info-box -->
                <!--                </div><!-- /.col -->
                <!--            </div><!-- /.row -->
                <!---->
                <!--            <div class="row">-->
                <!--                <div class="col-md-12">-->
                <!--                    <!-- TABLE: LATEST ORDERS -->
                <!--                    <div class="box box-info">-->
                <!--                        <div class="box-header with-border">-->
                <!--                            <h3 class="box-title">รายการสั่งซื้อล่าสุด</h3>-->
                <!--                            <div class="box-tools pull-right">-->
                <!--                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                <!--                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                <!--                            </div>-->
                <!--                        </div><!-- /.box-header -->
                <!--                        <div class="box-body">-->
                <!--                            <div class="table-responsive">-->
                <!--                              --><?php
                //                    $sql = "SELECT
                //`order`.orderID,
                //`order`.orderDate,
                //`order`.orderTotal,
                //`order`.isActive,
                //`order`.custID,
                //customer.custName
                //FROM
                //`order`
                //INNER JOIN customer ON `order`.custID = customer.custID ORDER BY orderID DESC LIMIT 10";
                //                    $result = mysqli_query($link, $sql);
                //
                //              ?>
                <!--              <table class="table table-striped">-->
                <!--                  <tr>-->
                <!--                      <th>รหัส</th>-->
                <!--                      <th>วันที่สั่งซื้อ</th>-->
                <!--                      <th>ราคารวม</th>-->
                <!--                      <th>ชื่อลูกค้า</th>-->
                <!--                      <th>สถานะ</th>-->
                <!--                      <th>เครื่องมือ</th>-->
                <!--                  </tr>-->
                <!--                  --><?php // while ($row = mysqli_fetch_assoc($result)) {  ?>
                <!--                  <tr>-->
                <!--                      <td>-->
                <!--                          --><? //=  $row['orderID']; ?>
                <!--                      </td>-->
                <!--                      <td>-->
                <!--                          --><? //=  $row['orderDate']; ?>
                <!--                      </td>-->
                <!--                      <td>-->
                <!--                          --><? //= number_format($row['orderTotal'],2); ?>
                <!--                      </td>-->
                <!--                      <td>-->
                <!--                          --><? //=  $row['custName']; ?>
                <!--                      </td>-->
                <!--                         <td>-->
                <!--                          --><?php
                //                                if ($row['isActive'] == '0') {
                //                                    echo '<span class="label label-info">รอดำเนินการ...</span>';
                //                                } else if ($row['isActive'] == '1') {
                //                                    echo '<span class="label label-success">ชำระเงินแล้ว</span>';
                //                                } else if ($row['isActive'] == '2') {
                //                                    echo '<span class="label label-warning">กำลังจัดส่ง</span>';
                //                                } else if ($row['isActive'] == '3') {
                //                                    echo '<span class="label label-info">จัดส่งแล้ว</span>';
                //                                }
                //                          ?>
                <!--                      </td>-->
                <!--                      <td>-->
                <!--                          <a href="detail_order.php?orderID=-->
                <? //= $row['orderID']; ?><!--" title="รายละเอียด"><i class="fa fa-eye"></i></a>-->
                <!---->
                <!--                      </td>-->
                <!--                  </tr>-->
                <!--                  --><?php //} ?>
                <!--              </table>-->
                <!--                            </div><!-- /.table-responsive -->
                <!--                        </div><!-- /.box-body -->
                <!--                        <div class="box-footer clearfix">-->
                <!--                            <a href="order.php" class="btn btn-sm btn-default btn-flat pull-right">ดูทั้งหมด</a>-->
                <!--                        </div><!-- /.box-footer -->
                <!--                    </div><!-- /.box -->
                <!--                </div><!-- /.col -->
                <!--            </div>-->
                <!---->
                <!--            <div class="row">-->
                <!--                <div class="col-md-6">-->
                <!--                    <!-- USERS LIST -->
                <!--                    <div class="box box-primary">-->
                <!--                        <div class="box-header with-border">-->
                <!--                            <h3 class="box-title">รายชื่อลูกค้า</h3>-->
                <!--                            <div class="box-tools pull-right">-->
                <!--                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                <!--                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                <!--                            </div>-->
                <!--                        </div><!-- /.box-header -->
                <!--                        <div class="box-body">-->
                <!--                            <div class="table-responsive">-->
                <!--                                --><?php
                //                                $sql = "SELECT * FROM customer ORDER BY custID DESC LIMIT 10";
                //                                $result = mysqli_query($link, $sql);
                //                                ?>
                <!--                                <table class="table no-margin">-->
                <!--                                    <tr>-->
                <!--                                        <th>รหัส</th>-->
                <!--                                        <th>ชื่อ-สกุล</th>-->
                <!--                                        <th>อีเมล</th>-->
                <!--                                        <th>โทรศัพท์</th>-->
                <!--                                        <th>Username</th>-->
                <!--                                    </tr>-->
                <!--                                    --><?php //while ($row = mysqli_fetch_assoc($result)) { ?>
                <!--                                        <tr>-->
                <!--                                            <td>-->
                <!--                                                --><? //= $row['custID']; ?>
                <!--                                            </td>-->
                <!--                                            <td>-->
                <!--                                                --><? //= $row['custName']; ?>
                <!--                                            </td>-->
                <!--                                            <td>-->
                <!--                                                --><? //= $row['custEmail']; ?>
                <!--                                            </td>-->
                <!--                                            <td>-->
                <!--                                                --><? //= $row['custTel']; ?>
                <!--                                            </td>-->
                <!--                                            <td>-->
                <!--                                                --><? //= $row['custUsername']; ?>
                <!--                                            </td>-->
                <!--                                        </tr>-->
                <!--                                    --><?php //} ?>
                <!--                                </table>-->
                <!--                            </div><!-- /.table-responsive -->
                <!--                        </div><!-- /.box-body -->
                <!---->
                <!---->
                <!--                        <div class="box-footer clearfix">-->
                <!--                            <a href="frm_cust.php" class="btn btn-sm btn-info btn-flat pull-left">เพิ่มข้อมูลลูกค้า</a>-->
                <!--                            <a href="user_list.php" class="btn btn-sm btn-default btn-flat pull-right">ดูทั้งหมด</a>-->
                <!--                        </div><!-- /.box-footer -->
                <!--                    </div><!-- /.box -->
                <!--                </div>-->
                <!---->
                <!--                <div class="col-md-6">-->
                <!--                    <!-- TABLE: LATEST ORDERS -->
                <!--                    <div class="box box-default">-->
                <!--                        <div class="box-header with-border">-->
                <!--                            <h3 class="box-title">รายการข่าวสาร</h3>-->
                <!--                            <div class="box-tools pull-right">-->
                <!--                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>-->
                <!--                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                <!--                            </div>-->
                <!--                        </div><!-- /.box-header -->
                <!--                        <div class="box-body">-->
                <!--                            <div class="table-responsive">-->
                <!--                                 --><?php
                //                    $sql = "SELECT * FROM news INNER JOIN user ON news.userID=user.userID ORDER BY newsID DESC";
                //                    $result = mysqli_query($link, $sql);
                //
                //              ?>
                <!--              <table class="table table-striped">-->
                <!--                  <tr>-->
                <!--                      <th>รหัส</th>-->
                <!--                      <th>หัวข้อข่าว</th>-->
                <!--                      <th>วันที่</th>-->
                <!--                  </tr>-->
                <!--                  --><?php // while ($row = mysqli_fetch_assoc($result)) {  ?>
                <!--                  <tr>-->
                <!--                      <td>-->
                <!--                          --><? //=  $row['newsID']; ?>
                <!--                      </td>-->
                <!--                      <td>-->
                <!--                          --><? //=  $row['newsTopic']; ?>
                <!--                      </td>-->
                <!--                      <td>-->
                <!--                          --><? //=  $row['newsDate']; ?>
                <!--                      </td>-->
                <!---->
                <!--                  </tr>-->
                <!--                  --><?php //} ?>
                <!--              </table>-->
                <!--                            </div><!-- /.table-responsive -->
                <!--                        </div><!-- /.box-body -->
                <!--                        <div class="box-footer clearfix">-->
                <!--                            <a href="frm_news.php" class="btn btn-sm btn-info btn-flat pull-left">เพิ่มข่าวใหม่</a>-->
                <!--                            <a href="machine_list.php" class="btn btn-sm btn-default btn-flat pull-right">ดูทั้งหมด</a>-->
                <!--                        </div><!-- /.box-footer -->
                <!--                    </div><!-- /.box -->
                <!--                </div><!-- /.col -->
                <!---->
                <!--            </div>-->
                <!---->
                <!---->
                <!---->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    <!-- Main Footer -->
    <!--    --><?php //include 'footer.php'; ?>


</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
