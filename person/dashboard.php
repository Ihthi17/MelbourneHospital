<!--person dashboard-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/dist/css/style.css">
</head>
<body>
  
</body>
</html>


<?php 

    include 'connect.php';
    
   
?>
    
    
    
    <div class="content-header">
      <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
          <a href="Make_Appointment.php"><button class="btn btn-primary">Make Appointment</button></a>
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
  <!--button-->
 <center><marquee style="background-color:orange;color:white;" direction="left"><p style="font-size:20px ;">If you continue to receive treatment at our hospital, click the Button and  fill the form bellow. Other wise click the make appointmnet button and fill the form </p></marquee></center>
  <br><br>
 <section class="content ">
  <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center"><?php echo $_SESSION['p_name'] ;?></h3>

              
              <p class="text-muted text-center"><?php echo $_SESSION["email"]; ?></p>
              <p class="text-muted text-center"><?php echo $_SESSION["phone"]; ?></p>
             
                      <br><br>
                  <center><p> <a href="patient.php"><button class="btn btn-outline-info">Continus Treatement</button></a></p></center>    

              

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<!--patient form-->

 
