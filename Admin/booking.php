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
                รายการจอง
                <small>จัดการข้อมูลการจอง</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> เมนูหลัก</a></li>
                <li class="active">รายการจอง</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <a href="frm_product.php" class="btn btn-primary">เพิ่มรายการ</a>

            <br><br>

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <button id="remove" class="btn btn-danger" disabled>
                            <i class="glyphicon glyphicon-remove"></i> ลบรายการ
                        </button>
                    </h3>
                    <div class="box-tools pull-right">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <?php
                        $sql_event = "SELECT COUNT(*) AS count_event FROM events";
                        $result_event = mysqli_query($link, $sql_event);
                        $count_event = mysqli_fetch_assoc($result_event);
                        ?>
                        <span class="label label-primary">ทั้งหมด <?= $count_event['count_event']; ?> รายการ</span>
                    </div><!-- /.box-tools -->

                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php

                    $sql = "SELECT * FROM events LEFT JOIN machines ON events.machine_id=machines.machine_id 
LEFT JOIN users ON events.user_id = users.user_id";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <table id="table" data-toggle="table"
                           data-url="http://localhost/Admin/booking_json.php"
                           data-pagination="true"
                           data-page-size="10"
                           data-page-list="[10, 25, 50, 100, ALL]"
                           data-search="true"
                           data-height="400"
                           data-toolbar="#remove"
                           data-toolbar="#toolbar"
                           data-show-refresh="true"
                           data-show-toggle="true"
                           data-show-columns="true"
                           data-id-field="event_id">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true"></th>
                            <th data-field="event_id" data-align="right" data-sortable="true">รหัสการจอง</th>
                            <th data-field="machine_namethai" data-align="center" data-sortable="true">ชื่อเครื่อง</th>
                            <th data-field="name" data-align="center" data-sortable="true">ชื่อผู้จอง</th>
                            <th data-field="เวลาที่เริ่ม" data-align="center" data-sortable="true">เวลาที่เริ่ม</th>
                            <th data-field="เวลาที่สิ้นสุด" data-align="center" data-sortable="true">เวลาที่สิ้นสุด</th>

                            <!--                            <th data-field="prodTypeName" data-sortable="true">ประเภทสินค้า</th>-->
                            <!--                            <th data-field="operate" data-align="center" data-events="operateEvents"-->
                            <!--                                data-formatter="operateFormatter">เครื่องมือ-->
                            <!--                            </th>-->
                        </tr>

                        </thead>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td>

                                </td>
                                <td>
                                    <?= $row['event_id']; ?>
                                </td>
                                <td>
                                    <?= $row['machine_namethai']; ?>
                                </td>
                                <td>
                                    <?= $row['name']; ?>
                                </td>
                                <td>
                                    <?= $row['start_date']; ?>
                                </td>
                                <td>
                                    <?= $row['end_date']; ?>
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

<script src="bootstrap/js/smoke.min.js"></script>

<script src="bootstraptable/bootstrap-table.min.js"></script>

<script>

    var $table = $('#table'),
        $remove = $('#remove');


    $(function () {
        $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
        });
        $remove.click(function () {
            $.smkConfirm({text: 'แน่ใจว่าต้องการลบข้อมูล ?', accept: 'ตกลง', cancel: 'ยกเลิก'}, function (e) {
                if (e) {
                    var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                        return row.prodID;
                    });
                    //alert(ids);

                    //ajax delete
                    $.get("del_product.php", {"prodID[]": ids})
                        .done(function (data) {
                            if (data.status === "success") {
                                $.smkAlert({text: data.message, type: data.status});
                            } else {
                                $.smkAlert({text: data.message, type: data.status});
                            }
                            $table.bootstrapTable('refresh');
                        });


                    $remove.prop('disabled', true);
                    //uncheck
                    $table.bootstrapTable('togglePagination').bootstrapTable('uncheckAll').bootstrapTable('togglePagination');
                }
            });
        });
    });

    function priceFormatter(value) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        ;
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="view" href="javascript:void(0)" title="ดูรายละเอียด">',
            '<i class="glyphicon glyphicon-eye-open"></i>',
            '</a>  ',
            '<a class="edit" href="javascript:void(0)" title="แก้ไข">',
            '<i class="glyphicon glyphicon-pencil"></i>',
            '</a>  '
        ].join('');
    }

    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            var prodID = [row.prodID];
            //alert('You click like action, row: ' + row.prodID);
            $(location).attr('href', 'frm_product_edit.php?prodID=' + prodID); //redirect to your url

        },
        'click .view': function (e, value, row, index) {
            var prodID = [row.prodID];
            //alert('You click like action, row: ' + row.prodID);
            $(location).attr('href', 'show_product.php?prodID=' + prodID); //redirect to your url

        }

    };

</script>
</body>
</html>
