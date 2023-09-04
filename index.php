<?php
//user registration php code 
session_start();
$con=mysqli_connect("localhost","root","","hospital");
if(!$con)
{
    die("error".mysqli_connect_error());
}
if(isset($_POST['register']))
{
$p_name=$_POST['p_name'];
$c_number=$_POST['c_number'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$type=$_POST['type'];

if(filter_var($mail,FILTER_VALIDATE_EMAIL))
{
  $sql="SELECT * FROM users where email='$mail'";
  $run=mysqli_query($con,$sql);
  $num=mysqli_num_rows($run);
  if($num>=1) 
  {
    $_SESSION["warning"]='You Already Registred Please login';
  }
  else{
    $sql="INSERT INTO users(`p_name`,`phone`,`email`,`password`,`type`)values('$p_name','$c_number,','$mail','$pass','$type')";
    if( $con->query($sql)==true)
    {
      $_SESSION["success"]='Data Insert Successfully';
     // echo '<script language="javascript">alert(" You Registred Successfully Please login..");</script> ';
    
          
      }
      else{
        $_SESSION["error"]='Data Insert Successfully';
      }
  }
}


}
//users login php function
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password1'];

$sql="SELECT * FROM users WHERE `email`='$username' and `password`='$password' " ;
//print_r($sql);die;

    $result = mysqli_query($con,$sql);
   if(mysqli_num_rows($result)==0)
   {
    $_SESSION["error"]='Your User/Mail Or Password is wrong';
   // echo '<script language="javascript">alert(" Your username/Mail or Password is Wrong");</script> ';
   
      
       
   }
   else{
    while($row = $result->fetch_assoc()) {
         print_r( $row);
        $type = $row['type'];

       
 $_SESSION["p_name"] =$row['p_name'];     
 $_SESSION["email"] = $row['email'];
 $_SESSION["type"] = $row ['type'];
 $_SESSION["Last_Name"]=$row['Last_Name'];
 $_SESSION["photo"] = $row['photo'];
 $_SESSION["First_Name"]=$row['First_Name'];
 $_SESSION["Specelist"]=$row['Specelist'];
 $_SESSION["phone"]=$row['phone'];
 $_SESSION['id']=$row['id'];

 

 
        if($type =='admin'){

    
            header("location:admin/index.php");

        } else if($type =='doctor'){

    
    header("location:doctor/index.php") ;

        } else if($type =='patient'){

    
            header("location:person/index.php");
        }      
    }  
    $_SESSION["username"] =$username;
   }
}
//pcr booking php code
//pcr book

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit']))
{
//mailer
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
  $mail->addAddress($_POST["mail"] ,$_POST["last_name"]);     //Add a recipient
 

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'PCR TEST';
  $mail->Body    = "Dear  " .$_POST['last_name']. " <br> you successfully book for pcr test<br>"
                       .$_POST['date']. "  In this date you check pcr test and get report at the time <br>Thank You... <br> melbournehospital@info.com";
 // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  //echo 'Message has been sent';
} catch (Exception $e) {
 // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


 $first_name=$_POST["first_name"];
  $last_name=$_POST["last_name"];
  $mail=$_POST["mail"];
  $phone=$_POST["phone"];
  $date=$_POST["date"];
  $age=$_POST["age"];

 $sql="INSERT INTO pcr(`First_name`,`Last_name`,`Mail`,`Phone`,`date_d`,`Age`) values('$first_name','$last_name','$mail','$phone','$date','$age')";
    if($con->query($sql)==TRUE)
    {
      $_SESSION["success"]='Data Inserted Successfully';
      //echo '<script language="javascript">alert("Your Details Send Sucessfully ");</script>';
    
        
    }
    else{
      echo "error";
    }

  }
  
 

?>

<?php 
    
  
    
    

?>


<!--inter face start-->
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <title> Melbourne </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
    footer a {
      color: #6c757d !important;
    }

    .consult:hover {
      background-color: #fff !important;
      color: #178066 !important;
    }
    form .error {
  color: #ff0000;
}
  </style>

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <img src="images/hero-bg.png" alt="">
    </div>

    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Melbourne
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#3">Contact Us</a>
              </li>
             
                    <!--drop down box-->
                    <div class="dropdown">
                      <button type="button" class="btn btn-#178066 dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user" aria-hidden="true"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" id="signup">SignUp </a>
                        <a class="dropdown-item" href="#" id="signin">SignIn </a>
                       
                    </div>
                    <button type="button" class="btn btn-#178066" id="search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <!--drop down box-->
                  
               
              
            </ul>
          </div>
        </nav>
      </div>
    </header>
   
  
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
         
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <h1>
                      PCR COVID
                    </h1>
                    <p>
                      The nose swab PCR test for COVID-19 is an accurate and reliable test for diagnosing COVID-19.
                    </p>
                    <div class="btn-box">
                      <a onclick="myFunction()" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="2" class="active"></li>
          <!-- <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li> -->
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- department section -->

  <section class="department_section layout_padding">
    <div class="department_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our Departments
          </h2>
          <p>
            We have brought together the best talents in the healthcare industry to provide you with superior and world
            class medical service.
          </p>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="images/s1.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Cardiology
                </h5>
                <p>
                Cardiology is a branch of medicine that deals with disorders of the heart and the cardiovascular system. The field includes medical diagnosis and treatment ...
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="images/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Diagnosis
                </h5>
                <p>
                to recognize and name the exact character of a disease or a problem, by examining it: The specialist diagnosed cancer. His condition was diagnosed as some type of blood disorder.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="images/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Surgery
                </h5>
                <p>
                Surgery is a medical specialty that uses operative manual and instrumental techniques on a person to investigate or treat a pathological condition.                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box ">
              <div class="img-box">
                <img src="images/s4.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  First Aid
                </h5>
                <p>
                First aid is the first and immediate assistance given to any person with either a minor or serious illness or injury, with care provided to preserve life, ...                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="btn-box">
          <a href="">
            View All
          </a>
        </div> -->
      </div>
    </div>
  </section>

  <!-- end department section -->

  <section class="about_section layout_margin-bottom">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/emergency.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Emergency
              </h2>
            </div>
            <p>
              A medical ambulance is waiting for your call, aware of the urgent need.
            </p>
            <a href="tel:1970" onclick="document.getElementById('call_button').click()">
              Call
            </a>
            <form action="tel:917387084384" hidden><button type="button" id="call_button"></button></form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about_section layout_margin-bottom text-white pt-5 pb-5" style="background-color: #178066;">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Doctors
              </h2>
            </div>
            <p>
              We believe that we can know your exact requirement and give you the right advice and our service will make
              you satisfied.
            </p>
           <!-- <a href="" class="consult">
              Consult
            </a>-->
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/doctor.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="about_section layout_margin-bottom pcr_convaid">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/pcr.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                PCR
              </h2>
            </div>
            <p>
              The nose swab PCR test for COVID-19 is an accurate and reliable test for diagnosing COVID-19. A positive
              test means you likely have COVID-19. A negative test means you probably did not have COVID-19 at the time
              of the test. Get tested if you have symptoms of COVID-19 or have been exposed to someone who tested
              positive for COVID-19.
            </p>
           <a href="#"id="book">
             Book
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- doctor section -->

  <section class="doctor_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Doctors
        </h2>
        <p class="col-md-10 mx-auto px-0">
          Our service will be able to give you the right advice.
        </p>
      </div>
     
      
      <div class="row">
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/d1.jpg" alt="">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
                Elina Josh
              </h5>
              <h6 class="">
                Doctor
              </h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/d2.jpg" alt="">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
                Adam View
              </h5>
              <h6 class="">
                Doctor
              </h6>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/d3.jpg" alt="">
            </div>
            <div class="detail-box">
              <div class="social_box">
                <a href="">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-youtube" aria-hidden="true"></i>
                </a>
                <a href="">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </div>
              <h5>
                Mia Mike
              </h5>
              <h6 class="">
                Doctor
              </h6>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="btn-box">
        <a href="">
          View All
        </a>
      </div> -->
    </div>
  </section>

  <!-- end doctor section -->

  <!-- footer section -->
<div id="3">
  <footer class="footer_section text-secondary" style="background: none;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer_col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span class="">
                  No:20, Main street colombo
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  melbournehospital@info.com
                </span>
              </a>
            </div>
          </div>
          <div class="footer_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto footer_col">
          <div class="footer_link_box">
            <h4>
              Links
            </h4>
            <div class="footer_links">
              <a class="active" href="index.php">
                Home
              </a>
              <a class="" href="about.php">
                About
              </a>
              <a class="" href="#3">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer_col ">
          <h4>
            Newsletter
          </h4>
          <form action="#">
            <input type="email" placeholder="Enter email" style="border:1px solid #178066;" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
      <div class="footer-info">
        <p style="color: #6c757d !important">
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Melbourne Hospital</a>
        </p>
      </div>
    </div>
  </footer>
</div>
  <!-- footer section -->
   <!--register form start-->
   <div class="register">
    <h3 style="text-align: center; color:black;">Register Here..</h3>
    <span class="close_btn1"><i class="fa fa-window-close" aria-hidden="true"></i></span><br>
<form class="form-group" id="frm" action="index.php " method="POST"  name="registration" >
<div class="alert">

  <div class="form-group">
        
    <label for="">Name</label>
    <input type="text" class="form-control" name="p_name" id="pname"  placeholder="Patient Name" required autofocus autocomplete="off">
    
    <input type="hidden" class="form-control" id="name" name="type" value="patient">

    <span class="help-block"> </span>
    
  </div>
  <div class="form-group">
        
    <label for="">Phone Number</label>
    <input type="tel" class="form-control" id="phone" name="c_number" placeholder="+94 7xxxxxx" required autofocus autocomplete="off">
     
    <span class="help-block"></span>
    
  </div>
   
    <div class="form-group">
        
      <label for=""> Mail Address</label>
      <input type="email" class="form-control" id="email" name="mail" placeholder="Mail Address" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" autofocus autocomplete="off">
      
      <span class="help-block"></span>
      
    </div>
    <div class="form-group">

      <label for="">Password</label>
      <input type="password" class="form-control" id="password" name="pass" placeholder="Password" name="password" required autofocus autocomplete="off">    
      <i id="eye" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>

      <span class="help-block"></span>

      </div>
      
      <br>
  
    <button type="submit" name="register" id="submit"  class="btn btn-primary">Register</button>
    </form>
   
 </div>
</div>
        </div>  

  <!--register form close-->
  
 
  <!--login form start-->
    <div class="login">
    <h3 style="text-align: center; color: black;">LogIn Here..</h3>
    <span class="close_btn2"><i class="fa fa-window-close" aria-hidden="true"></i></span><br>
    <form class="form-group" action="index.php" method="post" id="registration">
   
    <div class="form-group">
        
      <label for="">User Name/Email Address</label>
      <input type="email" class="form-control" name="username" id="mail_address" placeholder="Mail Address" required autofocus autocomplete="off">
      <input type="hidden" class="form-control" name="login" id="mail_address" placeholder="Mail Address" required autofocus autocomplete="off">
      <span class="help-block"></span>
      
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" class="form-control" name="password1" id="password1" placeholder="Password" required autofocus autocomplete="off">
      <i id="dot" class="fa-solid fa-eye-slash" style="color:black ; margin-left:-32px;cursor:pointer; float: right;
    top: -25px;
    right: 10px;
    position: relative;"></i>
      <span class="help-block"></span>
      </div>
      <br>
  
    <button class="btn btn-success" id="login" name="login" type="submit">Log-In</button>

    </form>
   
</div>
</div>
    <!--login form close-->
    <!--search start-->
    <div class="search">
      <h3 style="text-align: center; color: black;">Search Here..</h3>
      <span class="close_btn3"><i class="fa fa-window-close" aria-hidden="true"></i></span><br>
      <form method="post" class="form-group">
     
      <div class="form-group">
          
        
        <input type="text" class="form-control" name="search" id="txt"  placeholder="search docotr" required autofocus autocomplete="off">
        <span class="help-block"></span>
        
      </div>
      
      </form>
      
  <div id="box">
   
  </div>
     
  </div>

  </div>
 
    <!--search close-->
<!--pcr booking start-->
<div class="pcr">
<div class="row">
  <div class="col-md">

<h3 style="text-align:center ; color:black;">Online PCR Book</h3>
<span class="close_btn4"><i class="fa fa-window-close" aria-hidden="true"></i></span><br>
<form action="index.php" method="post" id="form">
<form class="form-group" >

<div class="form-group">
<label for="first_name">First Name</label>
<input type="text" class="form-control" id="first_name"  name="first_name"placeholder="First Name" required autofocus autocomplete="on">
<span class="help-block"></span>
</div>
<div class="form-group">
<label for="last_name">Last Name</label>
<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required autofocus autocomplete="on">
<span class="help-block"></span>
</div>  
<div class="form-group">
<label for="email_address">Email Address</label>
<input type="email" class="form-control" id="email_addr" name="mail" placeholder="Email address"   required >
<span class="help-block"></span>
</div>

<div class="form-group">
<label for="phone_number">Phone Number</label>
<input type="tel" class="form-control" id="phone_number" name="phone" placeholder="+94 77 854 3215" required>
<span class="help-block"></span>
</div>
<div class="form-group">
<label for="dob">Booking Date</label>
<input type="date" class="form-control" id="date" name="date">
<span class="help-block"></span>
</div>
<div class="form-group">
<label for="age">Age</label>
<input type="number" class="form-control" id="age" placeholder="Age" min="1" max="110"  name="age"   required>
<span class="help-block"></span>
</div>     <br>
<button class="btn btn-warning" id="appoint1" name="submit" type="submit">Booking PCR</button>
</form>
</div>
</div>
</div>
<!--pcr booking close-->


  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="js/style.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
  <!-- End Google Map -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
<!-- jquery-validation -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" ></script>

  <script>
    //js function
    function myFunction() {
      $("html, body").animate({ scrollTop: 2040 }, "slow");
      return false;
    }
 $(document).ready(function(){
  $("#txt").keyup(function(){
    //alert("hello");
    var txt=$(this).val();
    var search = 'search';
    if(txt != "")
    {
      $.post("function.php",{value:txt,search:search},function(data){
        $("#box").html(data);
      })
    }
  })
 })
 
    </script>
    

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>
<script>
  //register show password
  $(document).ready(function(){
    $('#eye').click(function(){
       
       if($(this).hasClass('fa-eye-slash')){
          
         $(this).removeClass('fa-eye-slash');
         
         $(this).addClass('fa-eye');
         
         $('#password').attr('type','text');
           
       }else{
        
         $(this).removeClass('fa-eye');
         
         $(this).addClass('fa-eye-slash');  
         
         $('#password').attr('type','password');
       }
   });
//login show password
  });
  $(document).ready(function(){
    $('#dot').click(function(){
       
       if($(this).hasClass('fa-eye-slash')){
          
         $(this).removeClass('fa-eye-slash');
         
         $(this).addClass('fa-eye');
        
         $('#password1').attr('type','text');
           
       }else{
        
         $(this).removeClass('fa-eye');
         console.log('hello');
         $(this).addClass('fa-eye-slash');  
         
         $('#password1').attr('type','password');
       }
   });

  });

 //validation
 $(document).ready(function(){
  
    
  
  var $form = $("form"),
  $successMsg = $(".alert");
$.validator.addMethod("letters", function(value, element) {
  return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
});

  $("form[id='frm']").validate({
 
  rules: {
    
    p_name:
    {
     required: true,
     letters:true,
     
      
   },

    mail: {
      required: true,
      
     email: true
    },
    c_number: {
            required: true,
            digits:true,
            maxlength:10,
            minlength:10
          },
      
    
    pass: {
      required: true,
      minlength:5,
    },
    
   
    
  },
  
  messages: {
    p_name: "Please enter the patient name",
    lastname: "Please enter your lastname",
    
    pass: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
   mail: "Please enter a valid email address",
   c_number:"Please enter your contact number",
 
   
  },
  
  submitHandler: function(form) {
    form.submit();
  }
});

})

//login form validate
$("form[id='registration']").validate({
  
  rules: {
    first_name: {
            required:true,
            letters: true,
    },
    last_name: {
            required:true,
            letters: true,
    },
    mail:{
            required:true,
            email:true,
    },
    phone:{
          required:true,
          digits:true,
          maxlength:10,
          minlength:10
    },
    
    date:{
      required:true,
    },
    age:{
      required:true,
      digits:true
    },
    
   
    username: {
      required: true,
      // Specify that email should be validated
      // by the built-in "email" rule
      email: true,
    },
    
      
    
    password1: {
      required: true,
      minlength:5,
    }
    
  },
  
  messages: {
    first_name: "Please enter your first name",
    last_name: "Please enter your last name",
    lettersonly:"Please enter characters only",
    password1: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
  username: "Please enter a valid email address",
   
  },
  
  submitHandler: function(form) {
    form.submit();
  }
});
//pcr validation
$(document).ready(function(){


var $form = $("form"),
  $successMsg = $(".alert");
$.validator.addMethod("letters", function(value, element) {
  return this.optional(element) || value == value.match(/^[a-zA-Z\s]*$/);
});


  $("form[id='form']").validate({
   

  
  rules: {
    first_name: {
            required:true,
            letters:true,
            
    },
    last_name: {
            required:true,
            letters:true,
            
    },
    mail:{
            required:true,
            email:true,
            
           
    },
    phone:{
          required:true,
          digits:true,
          maxlength:10,
          minlength:10
    },
    
    date:{
      required:true,
      
      
     
    },
    age:{
      required:true,
      digits:true
    },
    },
  
  messages: {
    first_name: "Please enter your first name",
    last_name: "Please enter your last name",
    
  mail: "Please enter a valid email address",
  phone:"Please enter your phone number",
 
  age:"Please enter your age",
   
  },
  
  
  submitHandler: function(form) {
    form.submit();

  }
 
});


})

</script>
 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>

 
  <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 <script src="js/validate/jquery.validate.js"></script>
 <script src="js/validate/jquery.js"></script>
<!---- sweet alert fnuction-->
<?php 
if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "inserted successfully!",
  icon: "success",
  button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
 ?>

<?php 
if(isset($_SESSION['error'])&& $_SESSION['error']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['error']; ?>",
  text: "Wrong Data!",
  icon: "error",
  button: "done!",
});
</script>
<?php
unset($_SESSION['error']);
}
 ?>
 <?php 
if(isset($_SESSION['warning'])&& $_SESSION['warning']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['warning']; ?>",
  text: "You Already Registred!",
  icon: "warning",
  button: "ok!",
});
</script>
<?php
unset($_SESSION['warning']);
}
 ?>

 <!--validation link rules and message-->
 <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
 
</body>

</html>