<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

</head>
<body>
  
</body>
</html>


<?PHP
include 'connect.php';

?>



<?php include('includes/header.php');?>
<?php include('includes/side_bar.php');?>
<div class="content-wrapper">
<br><br>
  <b><h1 style="text-align:center ; font-family:Arial, Helvetica, sans-serif; font-size:30px;color:cornflowerblue;">View PCR Booking</h1></b>
  <br><br>
 
  <?php
$sql="SELECT * FROM pcr";
$result=$con->query($sql);
if($result->num_rows>0)
{



?>
  <table  id="datatable" class="table  table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email Address</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Booking Date</th>
      <th scope="col">Age</th>
      
      
    </tr>
  </thead>
  <tbody>
    <?php
   // $count=1;
    while($row=mysqli_fetch_assoc($result))
      {
    ?>
    <tr>
      
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row["First_name"];?></td>
      <td><?php echo $row["Last_name"];?></td>
      <td><?php echo $row["Mail"];?></td>
      <td><?php echo $row["Phone"];?></td>
      <td><?php echo $row["date_d"];?></td>
      <td><?php echo $row["Age"];?></td>
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
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
 $(document).ready(function () {
    $('#datatable').DataTable();
});
</script>