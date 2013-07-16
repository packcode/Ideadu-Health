	<?php
$name=$_POST["element_1_1"];


$bg=$_POST["element_4"];
$contact=$_POST["element_5"];

$pincode=$_POST["element_6_5"];




$con=mysqli_connect("localhost","root","12345","trial_DB");
if ($con)
  {
  echo "Connection is succeeded.</br>";

  }
  else {
echo "Connection error";  	
  	}


	$sql="INSERT INTO donors (name,bg,contact,pincode)
         VALUES ('$name','$bg','$contact','$pincode')";
         
         	if (mysqli_query($con,$sql))
  {
  echo "Table persons created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($con);
  }
  
?>
