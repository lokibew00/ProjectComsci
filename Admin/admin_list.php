<?php
include '../db/database.php';
?>

<html>
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
                ผู้ดูแลระบบ
                <small>จัดการข้อมูลผู้ดูแลระบบ</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> เมนูหลัก</a></li>
                <li class="active">ผู้ใช้งานระบบ</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <a href="admin_add.php" class="btn btn-primary">เพิ่มรายการ</a>
            <br><br>
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ผู้ดูแลระบบ</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <?php
                        $sql_admin = "SELECT COUNT(*) AS count_admin FROM admins";
                        $result_admin = mysqli_query($link, $sql_admin);
                        $count_admin = mysqli_fetch_assoc($result_admin);
                        ?>
                        <span class="label label-primary">ทั้งหมด <?= $count_admin['count_admin']; ?> รายการ</span>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    $sql = "SELECT * FROM admins ORDER BY admin_id ASC ";
                    $result = mysqli_query($link, $sql);

                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>รหัส</th>
                            <th>ชื่อ-สกุล</th>
                            <th>Username</th>
                            <th>ภาพประจำตัว</th>
                            <th>ลบ</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_row($result)) { ?>
                            <tr>
                                <td>
                                    <?= $row[0]; ?>
                                </td>
                                <td>
                                    <?= $row[3]; ?>
                                </td>
                                <td>
                                    <?= $row[1]; ?>
                                </td>
                                <td>
                                    <img src="dist/img/<?= $row[4]; ?>" class="img-circle" width="32px" height="32px"
                                         alt="<?= $row[1]; ?> ?>">
                                </td>
                                <td>
                                    <a href="admin_delete.php?id=<?= $row[0]; ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
<!--                    <pre>-->
<!--                    --><?php //echo print_r($row['admin_name']) ?>
<!--                    </pre>-->
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

<script src="bootstrap/js/smoke.min.js"></script>

<script>
    $(document).ready(function () {
        $(".btn_del").on("click", function (e) {
            //delete confirm
            $.smkConfirm({text: 'แน่ใจว่าต้องการลบข้อมูล ?', accept: 'ตกลง', cancel: 'ยกเลิก'}, function (e) {
                if (e) {
                    var del_data = $(this).attr('id');
                    alert(del_data);
                    $(location).attr('href', 'admin_delete.php?id=' + del_data); //redirect to your url
                }
            });
            e.preventDefault();
        });
    });
</script>

</body>
</html>
