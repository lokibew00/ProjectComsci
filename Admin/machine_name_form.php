<?php
        //include '../db/database.php';
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
            เพิ่มรายชื่อเครื่องมือ
            <small>เพิ่มรายชื่อเครื่อง</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="machine_name.php"><i class="fa fa-dashboard"></i> รายชื่อเครื่อง</a></li>
            <li class="active">เพิ่มรายชื่อเครื่อง</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">เพิ่มรายชื่อเครื่อง</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              
                <div class="row">
                    <div class="col-md-6">
                        <form id="form1" action="machine_name_insert.php" method="post" class="form">
                            <div class="form-group">
                                <label for="machine_namethai">ชื่อภาษาไทย</label>
                                <input id="machine_namethai" type="text" class="form-control" name="machine_namethai">
                            </div>
                             <div class="form-group">
                                <label for="machine_nameeng">ชื่อภาษาอังกฤษ</label>
                                <input id="machine_nameeng" type="text" class="form-control" name="machine_nameeng">
                            </div>
                            <button type="submit" class="btn btn-default">บันทึก</button>
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
    
    <script>
            $(document).ready(function(){
                $("#machine_namethai").focus();
                $("#form1").on("submit",function(e){
                    if ($("#machine_namethai").val() === '' || $("#machine_nameeng").val() === '') {
                        alert("กรุณากรอกข้อมูลให้ครบ");
                        e.preventDefault();
                    } else {
                        $.post("machine_name_insert.php",{ machine_namethai: $("#machine_namethai").val(), machine_nameeng: $("#machine_nameeng").val() })
                                .done(function( data ) {
                                    if (data.status === "success") {
                                        $.smkAlert({text: data.message , type: data.status});
                                    } else {
                                        $.smkAlert({text: data.message , type: data.status});
                                    }
                                    $('#form1').smkClear();
                                    $("#machine_namethai").focus();
                                });
                        e.preventDefault();
                    }
                    
                });
            });
    </script>

  </body>
</html>
