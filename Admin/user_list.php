<?php
include '../db/database.php';
?>
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
                ลูกค้า
                <small>จัดการข้อมูลลูกค้า</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> เมนูหลัก</a></li>
                <li class="active">จัดการข้อมูลลูกค้า</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <a href="user_add.php" class="btn btn-primary">เพิ่มรายการ</a>
            <br><br>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">รายการข้อมูลลูกค้า</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <?php
                        $sql_user = "SELECT COUNT(*) AS COUNTUSER FROM users";
                        $result_user = mysqli_query($link, $sql_user);
                        $count_user = mysqli_fetch_assoc($result_user);
                        ?>
                        <span class="label label-primary">ทั้งหมด <?= $count_user['COUNTUSER']; ?> รายการ</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    $sql = "SELECT * FROM users ORDER BY user_id ASC";
                    $result = mysqli_query($link, $sql);

                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>username</th>
                            <th>created at</th>
                            <th>updated at</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td>
                                    <?= $row['user_id']; ?>
                                </td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                                <td>
                                    <?= $row['username']; ?>
                                </td>
                                <td>
                                    <?= $row['created_at']; ?>
                                </td>
                                <td>
                                    <?= $row['updated_at']; ?>
                                </td>
                                <td>
                                    <a href="user_delete.php?id=<?= $row['user_id']; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
<!--                   -->
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
