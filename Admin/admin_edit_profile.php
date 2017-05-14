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
            ผู้ใช้งานระบบ
            <small>แก้ไขข้อมูลส่วนตัว</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="admin_list.php"><i class="fa fa-dashboard"></i>ผู้ใช้งานระบบ</a></li>
            <li class="active">แก้ไขผู้ใช้งานระบบ</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">แก้ไขผู้ใช้งานระบบ</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              
                <div class="row">
                    <div class="col-md-6">
                        <form id="form1" action="admin_edit.php" method="post" class="form" enctype="multipart/form-data" novalidate>
                            <div class="form-group">
                                <label for="admin_username">Username</label>
                                <input id="admin_username" type="text" class="form-control" name="admin_username" value="<?php echo $s_admin_username; ?>" smk-text="กรุณากรอก Username" required>
                            </div>
                            <div class="form-group">
                                <label for="admin_password">Password</label>
                                <input id="admin_password" type="password" class="form-control" name="admin_password">
                            </div>
                            <div class="form-group">
                                <label for="admin_fullname">ชื่อ-สกุล</label>
                                <input id="admin_fullname" type="text" class="form-control" name="admin_fullname" value="<?php echo $s_admin_fullname; ?>" smk-text="กรุณากรอกชื่อ-สกุล" required>
                            </div>
                             <div class="form-group">
                                <label for="admin_picture">ภาพประจำตัว</label>
                                <input id="admin_picture" type="file" name="admin_picture">
                                <p class="help-block">เลือกไฟล์ภาพนามสกุล .jpg, .png, .gif เท่านั้น</p>
                             </div>
                            <input id="admin_id" type="hidden" name="admin_id" value="<?php echo $session_adminID; ?>">
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
            $( document ).ajaxStart(function() {
                $("#spin").show();
             }).ajaxStop(function() {
                $("#spin").hide(); 
             });
                            
            $(document).ready(function(){
                $("#admin_username").focus();
                
                var spinner = new Spinner().spin();
                $("#spin").append(spinner.el);
                $("#spin").hide();

                $('#form1').on("submit",function(e) {
                    if ($('#form1').smkValidate()) {
                        //upload file via ajax setting
                        $.ajax({
                            url: 'admin_edit.php',
                            type: 'POST',
                            data: new FormData( this ),
                            processData: false,
                            contentType: false,
                            dataType: 'json'
                        }).done(function( data ) {
                            if (data.status === "success") {
                                $.smkAlert({text: data.message , type: data.status});
                            } else {
                                $.smkAlert({text: data.message , type: data.status});
                            }
                            
                        });          
                        e.preventDefault();
                    }
                   e.preventDefault();
                });
                
               
                
            });
    </script>

    
    
  </body>
</html>
