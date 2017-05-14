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
            เพิ่มข้อมูลลูกค้า
            <small>เพิ่มรายการข้อมูลลูกค้า</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="user_list.php"><i class="fa fa-dashboard"></i>ข้อมูลลูกค้า</a></li>
            <li class="active">เพิ่มรายการข้อมูลลูกค้า</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Your Page Content Here -->
          
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">เพิ่มข้อมูลลูกค้า</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              
                <div class="row">
                    <div class="col-md-6">
                        <form id="form1" action="user_insert.php" method="post" class="form" novalidate>
                            <div class="form-group">
                                <label>ชื่อสกุล</label>
                                <input id="name" type="text" class="form-control" name="name" smk-text="กรุณากรอกชื่อ-สกุล" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input id="username" type="text" class="form-control" name="username" smk-text="กรุณากรอก Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" smk-text="กรุณากรอก Password อย่างน้อย 4 ตัวอักษร" required>
                            </div>
                                                     
                            
                            <button id="btn1" type="button" class="btn btn-default">บันทึก</button>
                        </form>
                    </div>
                </div>
              
                
            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div><!-- box-footer -->
          </div><!-- /.box -->
          
          <div id="spin"></div>

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
                $("#custName").focus();
                
                var spinner = new Spinner().spin();
                $("#spin").append(spinner.el);
                $("#spin").hide();

                $('#btn1').on("click",function(e) {
                    if ($('#form1').smkValidate()) {
                        $.post("user_insert.php", $("#form1").serialize() )
                                .done(function( data ) {
                                    if (data.status === "success") {
                                        $.smkAlert({text: data.message , type: data.status});
                                    } else {
                                        $.smkAlert({text: data.message , type: data.status});
                                    }
                                    $('#form1').smkClear();
                                    $("#name").focus();
                                });
                                               
                        e.preventDefault();
                    }
                   e.preventDefault();
                });
                
                $("#username").on("blur",function(e) {
                     $.get("check_username.php",{username: $("#username").val()})
                             .done(function( data ) {
                                 if ( data.status === "active") {
                                     alert(data.message);
                                     $("#username").val('');
                                     $("#username").focus();
                                 }
                             });
                     e.preventDefault();
                });
               
            });
    </script>
    
    

  </body>
</html>
