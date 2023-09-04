<?php
//search doctor php code ...!
session_start();
$con=mysqli_connect("localhost","root","","hospital");
if(!$con)
{
    die("error".mysqli_connect_error());
}

//search

if(isset($_POST['search']))
{
  $sql="SELECT time_schedule.*, users.* FROM `time_schedule` 
  LEFT JOIN users ON time_schedule.user_id = users.id 
  WHERE users.Last_Name LIKE'%{$_POST["value"]}%'";
  //$sql="SELECT * FROM `time_schedule` WHERE `name` LIKE'%{$_POST["value"]}%'";

$result=$con->query($sql);
$response ='';
$response .=  "
         <table class='table'>
         <tr>
         <th> Name </th>
         <th> Speciality </th>
         <th>  Date </th>
         <th> Start Time </th>
         <th> End Time </th>
         </tr>

";
if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
    
$response .=  ' 
           <tr>
           <td>'.$row["Last_Name"].'</td>
           <td>'.$row["Specelist"].'</td>
           <td>'.$row["date"].'</td>
           <td>'.$row["start_time"].'</td>
           <td>'.$row["end_time"].'</td>
           </tr>
    ';
  }
  $response .= "</table>";
}
echo $response;
}

?>

<?php 

//make appointment
$con=mysqli_connect("localhost","root","","hospital");
if(!$con)
{
    die("error".mysqli_connect_error());
}


 

?> 
<?php 
 



 ?>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/sweet_alert.js"></script>


  <script>



        
            
   

</script>


 