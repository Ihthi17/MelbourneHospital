<!--payment page interface-->
<?php session_start();
include 'connect.php'; ?>
<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
  
</body>
</html>
<div class="content-wrapper">
<br><br>
<b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">  Payments portal</h1></b>
<br><br>
<table class="table">
   <form class="form1" action="Payment.php" method="post" id="form">
    <input type="hidden" name="id">
   <div class="row jumbotron">
   <div class="col-sm-6 form-group">
                <label for="Blood Group">Payment Type / ගෙවීම් වර්ගය / கட்டண வகை*</label>
                <select class="form-control custom-select browser-default" name="p_type" required>
                    <option value="Select Payment Type">Select Payment Type</option>
<option value="Video Consultant">video Consultant</option>
<option value="Audio Consultant">Audio Consultant</option>
<option value="Channeling">Channeling</option>
<option value="Final Bill">Final Bill</option>
<option value="Other">Other</option>

                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-f">Account No. / ගිණුම් අංකය / கணக்கு எண்*</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="Enter Account No." required>
            </div>
           
            <div class="col-sm-6 form-group">
                <label for="email">Amount / මුදල / தொகை*</label>
                <input type="number" class="form-control" name="money" id="money" placeholder="1000.00" required>
            </div>
            
            <br><br><br><br>
           <div class="form-group">
               
            </div>
            <div class="col-sm-6 form-group">
                <label for="">NIC  / හැඳුනුම්පත  / தேசிய அடையாள அட்டை  இல* </label>
                <input type="text" class="form-control" name="nic" id="nic" placeholder="Enter the NIC No." required>
            </div>
            <div class="form-group">
                
            </div>
            <div class=" form-group">
                
            </div>
            <div class="col-sm-6 form-group">
            <label for="">Address / ලිපිනය / முகவரி* </label>
               <textarea name="address" id="address" cols="80" rows="2"></textarea>
            </div>
               
           
           
            <div class="col-sm-12">
          <center> <button class="btn btn-warning" id="submit" name="pay"  type="submit" ><i class="fa-sharp fa-solid fa-file-invoice-dollar"></i> Pay Now</button></center> 
            
        </div>
   </form>
   </table>


<?php 
//payment method php code
if(isset($_POST['pay']))
{
    $payment_type=$_POST['p_type'];
    $number=$_POST['number'];
     $money=$_POST['money'];
     $nic=$_POST['nic'];
    $address=$_POST['address'];
    $id=$_SESSION['id'];

   
   
     $sql="INSERT INTO payment(`user_id`,`payment_type`,`account_no`,`amount`,`nic`,`address`)VALUES('$id','$payment_type','$number','$money','$nic','$address')";
    //print_r($sql);die();
//die;

    if($con->query($sql)==TRUE)
    {
        $_SESSION["success"]='You Successfully pay to the hospital';




       // echo '<script language="javascript">alert("Pay Successfully");</script>'; 
    }
   
}









$sql="SELECT  payment.id as paid, payment.*, users.* FROM `payment`
 LEFT JOIN users ON payment.user_id = users.id
WHERE users.id =".$_SESSION['id']."";
$result=$con->query($sql);


//print_r($result);die;
if($result->num_rows>0)
{



?>
<table id="datatable" class="table table-dark">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Payment_type</th>
      <th scope="col">Account_no</th>
      <th scope="col">Patient_name</th>
      <th scope="col">Amount</th>
      <th scope="col">NIC</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
    
    while($row=mysqli_fetch_assoc($result))
      {
        $_SESSION['id']=$row['user_id'];
        $row['paid'];
    ?>
    <tr>
     
    <td><?php echo $row['paid'];?></td>
      <td><?php echo $row['payment_type'];?></td>
      <td><?php echo $row['account_no'];?></td>
      <td><?php echo $row['p_name'];?></td>
      <td><?php echo $row['amount'];?></td>
      <td><?php echo $row['nic'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['address'];?></td>
      
      
      <?php
}
 ?>
  <?php
}
else{
    echo "No result found";
}

?>     
    </tr>
    
      
  </tbody>
</table>
</div>
<?php include('includes/footer.php');?>
<!--retrive value-->
<!--sweet alert start-->

<?php
    if(isset($_SESSION['success'])&& $_SESSION['success']!='')
{
?>
<script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  text: "pay successfully!",
  icon: "success",
  button: "done!",
});
</script>
<?php
unset($_SESSION['success']);
}
?>
<script>
  
 $(document).ready(function () {
    $('#datatable').DataTable();
  
    
});

