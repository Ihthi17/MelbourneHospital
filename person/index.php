
<?php session_start();
  $type = $_SESSION["type"];

  if($type=="doctor")
  {
    header('location:doctor');
  }
    else if($type == "admin"){
    header('location:admin');
  }
?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
  <?php include('dashboard.php');?>
  
  
</div>
<?php include('includes/footer.php');?>