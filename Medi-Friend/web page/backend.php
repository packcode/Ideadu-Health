	<?php
$name=$_POST["element_1_1"];


$bg=$_POST["element_4"];
$email=$_POST["element_7"];
$contact=$_POST["element_5"];

$pincode=$_POST["element_6_5"];




$con=mysqli_connect("localhost","****","****","****");
/*
if ($con)
  {
  echo "Connection is succeeded.</br>";

  }
  else {
echo "Connection error";  	
  	}

*/
	$sql="INSERT INTO donors (name,bg,email,contact,pincode)
         VALUES ('$name','$bg','$email','$contact','$pincode')";
         
         	if (mysqli_query($con,$sql))
  {
  echo "You have baan added to our Data Base. We will contact you in need !";
  }
else
  {
  echo "SORRY ! Something went wrong! :(";
//echo "SORRY ! Something went wrong! :(". mysqli_error($con);  
}
  
?>
