<?php include 'connect.php';?>

<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
<b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View Payment Details</h1></b>
<br><br>
<?php
 $sql="SELECT payment.*, users.* FROM `payment` LEFT JOIN users ON payment.user_id = users.id";
 
$result=$con->query($sql);
if($result->num_rows>0)
{



?>
  <table id="datatable" class="table table-dark">
  <thead>
    <tr>
     
      <th scope="col">Payment Type</th>
      <th scope="col">Account No</th>
      <th scope="col">Patient Name</th>
      <th scope="col">Amount</th>
      <th scope="col">NIC</th>
      <th scope="col">Contact No</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      
      
    </tr>
  </thead>
  <tbody>
  <?php
    //$count=1;
    while($row=mysqli_fetch_assoc($result))
      {
    ?>
    <tr>
      
      
      <td><?php echo $row['payment_type'];?></td>
      <td><?php echo $row['account_no'];?></td>
      <td><?php echo $row['p_name'];?></td>
      <td><?php echo $row['amount'];?></td>
      <td><?php echo $row['nic'];?></td>
      <td><?php echo $row['phone'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['address'];?></td>
      </tr>
      <?php
}
 ?>
  <?php
}
else{
    echo "No result found";
}
?>      
      
    
   
      
  </tbody>
  </table>
</div>
<?php include('includes/footer.php');?>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
 $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>