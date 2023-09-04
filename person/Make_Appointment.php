 <!--appointment page-->
 <?php 
   session_start();
        include 'connect.php';
       
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
        
        if(isset($_POST['appointment']))
        {
            require 'vendor/autoload.php';
            $mail = new PHPMailer(true);
            try {
              //$mail->SMTPDebug = 4; \
              //$mail->SMTPDebug = 4;
              $mail->isSMTP();
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'mohamedihthisham17@gmail.com';                     //SMTP username
              $mail->Password   = 'ptfgwpjzhlslglrm';                               //SMTP password
              $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
              $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
              //Recipients
              $mail->setFrom('mohamedihthisham17@gmail.com', 'Melbourne Hospital');
              $mail->addAddress($_SESSION["email"] ,$_SESSION["p_name"]);     //Add a recipient
             
            
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Doctor Appointment';
              $mail->Body    = "Dear  " .$_SESSION['p_name']. " <br> you successfully booking for the doctor.<br>
                                Your appointment date is  "   .$_SESSION['date']. "  please come before half an hour .<br> if you want to cancel your appointment please click delete button in your view appointment history <br>Thank You... <br>  <br>
                                Doctor:   " .$_SESSION['Last_Name']."<br>
                                Specelist:  ".$_SESSION['Specelist']."<br>
                                Symtoms: ".$_POST['symptom']."";
             // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
              $mail->send();
              //echo 'Message has been sent';
            } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
          
           
          
           $symtoms=$_POST['symptom'];
           $user_id=$_SESSION['id'];
           $doctor_id=$_SESSION['user_id'];
           $tmsid=$_SESSION['tmsid'];

          

              $sql="INSERT into appointment(`user_id`, `doctor_id`, `time_schedule_id`, `symtoms`)VALUES('$user_id','$doctor_id','$tmsid','$symtoms')";
        
          
           
            if($con->query($sql)==TRUE)
       
       
            {
             
                $_SESSION["success"]='Your appointment is stored successfully check your email';

                //echo '<script language="javascript">alert(" Your Information Successfully Stored");</script> ';
               
            }
        }    



      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/dist/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>



<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
<b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">  Make Appointment</h1></b>
<br><br>
<!--search-->

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form  method="post">
                        <div class="input-group">
                            <input type="search"  name="name"class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default"  id="search"name="search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                   
                </div>
               
            </div>
       

   <div class="row">
    <div class="col-md-12">
        <br><br>
       <table class="table">
        <tr>
        
            <th>Doctor Name</th>
            <th>Specelist</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End time</th>
            <th>Appointment</th>
        </tr>
        <?php
        if(isset($_POST['search']))
        {
            $name=$_POST['name'];


            //`id`, `user_id`, `date`, `start_time`, `end_time` 
            $sql="SELECT time_schedule.id as tmsid,time_schedule.*, users.* FROM `time_schedule` 
            LEFT JOIN users ON time_schedule.user_id = users.id 
            WHERE users.Last_Name ='$name' and `type`='doctor'";
            $result=$con->query($sql);
           
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
           
            {
                $_SESSION["date"]=$row['date'];
                $_SESSION["start_time"]=$row['start_time'];
                $_SESSION["end_time"]=$row['end_time'];
                $_SESSION["Last_Name"]=$row['Last_Name'];
                $_SESSION["Specelist"]=$row['Specelist'];
                $_SESSION["user_id"]=$row['user_id'];
               
                $_SESSION["tmsid"]=$row['tmsid'];
              

                
                
               

                ?>
                      <tr>
                       <td name="name" value="<?php echo  $row['Last_Name'];?>"><?php echo  $row['Last_Name'];?></td>
                        <td name="specelist" value="<?php echo $row['Specelist'];?>"><?php echo $row['Specelist'];?></td>
                        <td name="date"><?php echo $row['date'];?></td>
                        <td name="start_time"><?php echo $row['start_time'];?></td>
                        <td name="end_time"><?php echo $row['end_time'];?></td>
                        <td><button id="click" class="btn btn-info rounded-circle data-bs-toggle=" data-bs-toggle="modal" data-bs-target="#exampleModal" name="appoint"><i class="fa-sharp fa-solid fa-calendar-check"></i></button></td>
                      </tr>
                      
                <?php
            }
        }
       
          ?>
       </table>
    </div>
</div>
</div>



</div>
<!--<div class="app">-->
    <!--mode lstart-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Doctor Appointment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <!--model close-->
   
    
<?php
     $sql="SELECT time_schedule.*, users.* FROM `time_schedule` 
     LEFT JOIN users ON time_schedule.user_id = users.id 
     WHERE users.id =".$_SESSION['user_id']."";
     
     $result=$con->query($sql);
    
     $result=mysqli_query($con,$sql);
     while($row=mysqli_fetch_assoc($result))
    
     {
        ?>
    
<!--<span class="close_btn7"><i class="fa fa-window-close" aria-hidden="true"></i></span><br>-->
<form id="frm"  action="Make_Appointment.php" method="post" class="form" role="form"   accept-charset="UTF-8">
											<div class="panel panel-default">
												<div style="color:black" class="panel-heading">Patient Information</div>
                                               
												<div style="color:black"class="panel-body">
													
													Patient Name: <?php echo $_SESSION['p_name']; ?><br>
                                                    Email: <?php echo  $_SESSION['email'];?>
                                                   
												</div>
											</div>
                                     
                                            <hr>
											<div class="panel panel-default">
												<div style="color:black" class="panel-heading">Appointment Information</div>
												<div style="color:black"class="panel-body">
										            Date:  <?php echo $row['date']; ?><br>
													Start Time:  <?php echo $row['start_time']; ?><br>
                                                    End Time:  <?php echo $row['end_time']; ?> <br>

												</div>
                                                <hr>
											</div>
                                           		
                                                   <div class="panel panel-default">
												<div style="color:black" class="panel-heading">Doctor Information</div>
												<div style="color:black"class="panel-body">
										          Doctor: <?php echo $row['Last_Name']; ?>  <br>
												  Specelist:<?php echo $row['Specelist']; ?><br>
                                                  

												</div>
											</div>
                                                <hr>		
											<div class="form-group">
												<label style="color:black" for="recipient-name" class="control-label">Symptom:</label>
												<input type="text" class="form-control" name="symptom" required>
											</div>
											
											<div class="form-group">
											<!--	<input type="submit" name="appointment" id="submit" class="btn btn-primary" value="Make Appointment">-->
											</div>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="appointment" class="btn btn-dark">Book Now</button>
        </form>
      </div>
    </div>
  </div>
</div>
                                        
      
                                                  
                <?php
           }
        
       
          ?>


</div>
<?php include('includes/footer.php');?>

 <script>
    $(document).ready(function(){
        $("#click").click(function(){
            $(".app").show(500);
      
      })
      $(".close_btn7").click(function(){
        $(".app").hide(500);
        })
    })
$(document).on('click','#click',function(){
    var this_=$(this);
     var name=this_.closest("table").find('td[name="name"]').text();
    $(".doctor_m").text(name);
    //console.log(name);
    var name=this_.closest("table").find('td[name="specelist"]').text();
    $(".specelist").text(name);
})
    </script>
<!--sweet alert start-->

    <?php
    if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "Apooint successfully!",
  icon: "success",
  button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
?>