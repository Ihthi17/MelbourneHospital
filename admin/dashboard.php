   <?php
include 'connect.php';
   ?>
   
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    </style>
   </head>
   <body>
    
   </body>
   </html>
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
  <div id="">
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php $sql = "SELECT * from users where type= 'patient'";

if ($result = mysqli_query($con, $sql)) {

   
    $rowcount = mysqli_num_rows( $result );
  
    // Display result
    printf($rowcount);
 }?></h3>

                <p>Total Registration</p>
              </div>
              <div class="icon">
              <i class="fa-regular fa-user"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php $sql = "SELECT * from appointment";

if ($result = mysqli_query($con, $sql)) {

   
    $rowcount = mysqli_num_rows( $result );
  
    // Display result
    printf($rowcount);
 }?></h3>

                <p>Doctor Appointment</p>
              </div>
              <div class="icon">
              <i class="fa-regular fa-calendar-check"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php $sql = "SELECT * from users where type= 'doctor'";

if ($result = mysqli_query($con, $sql)) {

   
    $rowcount = mysqli_num_rows( $result );
  
    // Display result
   ?><span style="color:white"> <?php printf($rowcount);?></span>
<?php }?></h3>

                <p style="color:white">Total Doctors</p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-user-doctor"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="row ">
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php $sql = "SELECT * from pcr";

if ($result = mysqli_query($con, $sql)) {

   
    $rowcount = mysqli_num_rows( $result );
  
    // Display result
    printf( $rowcount);
 }?></h3>

                <p>Online PCR Travalers</p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-vial"></i>
              </div>
            </div>
          </div>
          <!--col-->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?php $sql = "SELECT * from time_schedule";

if ($result = mysqli_query($con, $sql)) {

   
    $rowcount = mysqli_num_rows( $result );
  
    // Display result
    printf( $rowcount);
 }?></h3>

                <p>Time Schedule</p>
              </div>
              <div class="icon">
              <i class="fa-solid fa-business-time"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php $sql = "SELECT * from patient";

if ($result = mysqli_query($con, $sql)) {

   
    $rowcount = mysqli_num_rows( $result );
  
    // Display result
    printf( $rowcount);
 }?></h3>

                <p>Total patient</p>
              </div>
              <div class="icon">
              <i class="fa-sharp fa-solid fa-bed"></i>
              </div>
            </div>
          </div>
        </div>
        </div>
  </div>