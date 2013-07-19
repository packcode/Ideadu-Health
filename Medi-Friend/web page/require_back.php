<?php



echo "<!DOCTYPE html>";
echo "<html>";
echo "<br><br>	<br>";
echo "<body bgcolor=#D1FFD1></body>";
echo "</html>";



$var=0;
$con=mysqli_connect("localhost","****","***","****");
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
<th bgcolor=#7094DB>Donor Name</th>
<th bgcolor=#7094DB>Blood Group</th>
<th bgcolor=#7094DB>Contact</th>
</tr>";

}
  echo "<tr>";
  echo "<td bgcolor=#FF9933>" . $row['name'] . "</td>";
  echo "<td bgcolor=#CC99FF>" . $row['bg'] . "</td>";
  echo "<td bgcolor=#99FF33>" . $row['contact'] . "</td>";
  echo "</tr>";
	
	}

	
	}
	echo "</table>";
				if($var==0) {
										
					echo "Sorry no donor is available for your blood :( ";
					}
			
?>

