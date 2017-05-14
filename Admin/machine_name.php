<?php
        include '../db/database.php';
?>

  <?php include 'head.php';  ?>
  

    <div class="wrapper">

      <!-- Main Header -->
      <?php include 'header.php';  ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?php include 'leftside.php' ?>;

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            ประเภทสินค้า
            <small>จัดการข้อมูลเครื่อง</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> เมนูหลัก</a></li>
            <li class="active">ข้อมูลเครื่อง</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          <a href="machine_name_form.php" class="btn btn-primary">เพิ่มชื่อเครื่อง</a>
          <br>
          <br>
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">รายการข้อมูลเครื่อง</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                <?php
                      $sql_namemac = "SELECT COUNT(*) AS COUNTMAC FROM machines";
                      $result_namemac = mysqli_query($link, $sql_namemac);
                      $count_namemac = mysqli_fetch_assoc($result_namemac);
                ?>
                <span class="label label-primary">ทั้งหมด <?= $count_namemac['COUNTMAC']; ?> ชื่อ</span>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              <?php
                    $sql = "SELECT * FROM machines ORDER BY machine_id ASC";
                    $result = mysqli_query($link, $sql);
                    
              ?>
              <table class="table table-striped">
                  <tr>
                      <th>รหัส</th>
                      <th>ชื่อภาษาไทย</th>
                      <th>ชื่อภาษาอังกฤษ</th>
                      <th>ลบ</th>
                  </tr>
                  <?php  while ($row = mysqli_fetch_row($result)) {  ?>
                  <tr>
                      <td>
                          <?=  $row[0]; ?>
                      </td>
                      <td>
                          <?= $row[1]; ?>
                      </td>
                      <td>
                          <?=  $row[2]; ?>
                      </td>
                      <td>
                          <a href="machine_name_del.php?id=<?= $row[0]; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                  </tr>
                  <?php } ?>
              </table>
                
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- box-footer -->
          </div><!-- /.box -->
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php include 'footer.php'; ?>
      
      
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
