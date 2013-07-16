
<?php
$var=0;
$con=mysqli_connect("localhost","root","12345","trial_DB");
/*

//check for DB connection
if ($con)
  {
  echo "Connection is succeeded.</br>";
  }
  else {
	echo "Connection error";  	
  	}
  */	
		  
  
  
$blg=$_POST["element_2"];
$pc=$_POST["element_4_5"];
	$sql="SELECT * FROM donors WHERE pincode=$pc";
	
    $result= mysqli_query($con,$sql);    

while($row = mysqli_fetch_array($result))
{
	
	if($blg==$row['bg'])
	{
			$var++;
if($var==1) {

				
	echo "<table border='1' align='center'>
	
<tr>
<th>Donor Name</th>
<th>Blood Group</th>
<th>Contact</th>
</tr>";

}
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['bg'] . "</td>";
  echo "<td>" . $row['contact'] . "</td>";
  echo "</tr>";
	
	}

	
	}
	echo "</table>";
				if($var==0) {
										
					echo "Sorry no donor is available for your blood :( ";
					}
			
?>

