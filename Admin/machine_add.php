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
                เครื่องมือ
                <small>เพิ่มเครื่องมือใหม่</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="machine_list.php"><i class="fa fa-dashboard"></i> รายการสินค้า</a></li>
                <li class="active">เพิ่มเครื่องมือใหม่</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">เพิ่มเครื่องใหม่</h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->

                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <form id="form1" action="machine_insert.php" method="post" class="form" enctype="multipart/form-data" novalidate>
<!--                                <div class="form-group">-->
<!--                                    <label for="location_id">สถานที่</label>-->
<!--                                    <select id="location_id"  class="form-control" name="location_id" smk-text="กรุณาเลือกประเภท" required>-->
<!--                                        <option selected value="">กรุณาเลือกสถานที่</option>-->
<!--                                        --><?php
//                                        $sqlt = "SELECT * FROM locations";
//                                        $res_t = mysqli_query($link, $sqlt);
//                                        while ($rows_t = mysqli_fetch_assoc($res_t)) {
//                                            ?>
<!--                                            <option value="--><?php //echo $rows_t['location_id'] ?><!--">--><?php //echo $rows_t['location_room'] ?><!--</option>-->
<!--                                        --><?php //} ?>
<!--                                    </select>-->
<!--                                </div>-->
                                <div class="form-group">
                                    <label for="machine_namethai">ชื่อเครื่องภาษาไทย</label>
                                    <input id="machine_namethai" type="text" class="form-control" name="machine_namethai" smk-text="กรุณากรอกรหัสสินค้า" required>
                                </div>
                                <div class="form-group">
                                    <label for="machine_nameeng">ชื่อสินค้าภาษาอังกฤษ</label>
                                    <input id="machine_nameeng" type="text" class="form-control" name="machine_nameeng" smk-text="กรุณากรอกชื่อสินค้า" required>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label for="location_room">สถานที่</label>-->
<!--                                    <input id="location_room" type="text" class="form-control" name="location_room" smk-text="กรุณากรอกยอดคงเหลือ" required>-->
<!--                                </div>-->
                                <div class="form-group">
                                    <label for="machine_picture">ภาพเครื่อง</label>
                                    <input id="machine_picture" type="file" name="machine_picture">
                                    <p class="help-block">เลือกไฟล์ภาพนามสกุล .jpg, .png, .gif เท่านั้น</p>
                                </div>
                                <button id="btn1" type="submit" class="btn btn-primary">บันทึก</button>
                            </form>
                        </div>
                    </div>


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

<script src="bootstrap/js/spin.min.js"></script>


<script>
    $(document).ajaxStart(function () {
        $("#spin").show();
    }).ajaxStop(function () {
        $("#spin").hide();
    });

    $(document).ready(function () {
        $("#location_id").focus();

        //select2


        var spinner = new Spinner().spin();
        $("#spin").append(spinner.el);
        $("#spin").hide();

        $('#form1').on("submit", function (e) {
            if ($('#form1').smkValidate()) {
                //upload file via ajax setting
                $.ajax({
                    url: 'machine_insert.php',
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    dataType: 'json'
                }).done(function (data) {
                    if (data.status === "success") {
                        $.smkAlert({text: data.message, type: data.status});
                    } else {
                        $.smkAlert({text: data.message, type: data.status});
                    }
                    $("#form1").smkClear();
                    $("#location_id").focus();
                });
                e.preventDefault();
            }
            e.preventDefault();
        });



    });
</script>



</body>
</html>
