<!--doctor dashboard-->
    <?php include 'connect.php';?>
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- Content Header (Page header) -->
  <br>
  <!--Main contents Start-->
  
  
  <section class="content ">
  <div class="box box-primary">
            <div class="box-body box-profile">
             <center><img  class=" img-thumbnail" src="../admin/<?php echo  $_SESSION["photo"] ; ?>" alt="User profile picture" width="400px" height="300px"></center> 

              <h3 class="profile-username text-center"><?php echo $_SESSION['First_Name'] ;?> <?php echo $_SESSION['Last_Name'] ;?></h3>

              <p class="text-muted text-center"><?php echo $_SESSION["Specelist"]; ?></p>
              <p class="text-muted text-center"><?php echo $_SESSION["email"]; ?></p>
              <p class="text-muted text-center"><?php echo $_SESSION["phone"]; ?></p>
             


              

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <?php

