<?php
$con=mysqli_connect("localhost","root","12345","trial_DB");

if($_POST) {
	
	$output = "";
	$mobile=$_POST["name"];
	$blg=$_POST["bg"];
	$pc=$_POST["zip"];
	
	$sql="INSERT INTO Emergency_track (mobile,bg,pincode)
         VALUES ('$name','$blg','$pc')";

mysqli_query($con,$sql);

$sql="SELECT * FROM donors WHERE pincode=$pc or $pc-1 or $pc+1 or $pc-2 or $pc+2 or $pc-3 or $pc+3 or $pc+4 or $pc-4";
	
$result= mysqli_query($con,$sql);    

while($row = mysqli_fetch_array($result))
{
	
	if($blg==$row['bg'])
	{
			$var++;
if($var==1) {

				
	$output .=  "<table class='bloodresult'>";
	
	$output .=  "<th>Donor Name</th>";
	/* $output .= "<div class='field-right>" . $row['name'] . "</div>"; */
	$output .=  "<th>Blood Group</th>";
	/*  $output .= "<div class='field-right>" . $row['bg'] . "</div>"; */
	$output .=  "<th>Contact</th>";
	/* $output .= "<div class='field-right>" . $row['contact'] . "</div>"; */

 
}
  $output .= "<tr>";
  $output .= "<td align='center'>" . $row['name'] . "</td>";
  $output .= "<td align='center'>" . $row['bg'] . "</td>";
  $output .= "<td align='center'>" . $row['contact'] . "</td>";
 
 }

 }
	
	$output .= "</table>";
	
	if($var==0) 
	{
 $output .= "Sorry no donor is available for your blood!";
	}

}

?>




<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Medi-Friend</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/bootstrap-responsive.css" />
		</noscript>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim for IE backwards compatibility -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!--Form Validation-->
    <script type="text/javascript"> 
    
function validateForm(){
 
  var mobile = document.getElementById('name');
  var pin = document.getElementById('zip');

  var x=document.forms["register"]["bg"].value;
  
 


    
  var uInput = mobile.value;
  if(uInput.length < 10 || uInput.length > 10){
  //  return true;
 // }else{
    alert("Please enter a mobile number of 10 digits and without country code");
    mobile.focus();
    return false;
  }
//}
//function isNumeric(elem, helperMsg){
  var numericExpression = /^[0-9]+$/;
  if(!mobile.value.match(numericExpression)){
 //   return true;
 /// }else{
    alert("Please enter a valid Mobile Number");
    mobile.focus();
    return false;
  }        


    
      var uInput = pin.value;
  if(uInput.length < 6 || uInput.length > 6){
  //  return true;
 // }else{
    alert("Please enter a  pincode of 6 digits");
    pin.focus();
    return false;
  }
  
  
          


  var numericExpression = /^[0-9]+$/;
  if(!pin.value.match(numericExpression)){
     alert("Please enter a valid PIN code");
    pin.focus();
    return false;
    }       





//function bloodgrpalert(elem,helperMsg)
//{
if (x==null || x==""){
    alert("Please Enter Your Blood Group");
 // }
 // else{
    return false;
    }
//}   
    
}


</script> 


</head>
<body>
<div>
	<div id="header-wrapper">
				<header class="container-fluid" id="site-header">
					<div class="row">
						<div class="12u">
							<div id="logo">
				<h1>MEDI-FRIEND</h1>
							</div>
							<nav id="nav">
								<ul>
									<li class="current_page_item"><a href="index.html">HOMEPAGE</a></li>
									<li><a href="bloodbank.html">BLOOD BANK</a></li>
									<li><a href="healthtips.html">HEALTH TIPS</a></li>
									<li><a href="about.html">ABOUT</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>
			</div>
			</div>
			<br>
<div class="row-fluid">
 <div class="container">
   <div class="well">    
   <?php if($_POST): ?>
   <a href="index.html" class="mycenterbutton">GO TO HOME</a> <br> <br>
   	<?php print $output; ?>
   
   	<?php else: ?>
      <form id="register" name="register" onsubmit="return validateForm()" class="form-horizontal" method="post" action="">
		    <legend>Find Donor</legend>		
		     <div class="control-group">
	     <label class="control-label">Enter 10 digit mobile No:</label>
			 <div class="controls">
			    <div class="input-prepend">
				    <span class="add-on"><i class="icon-user"></i></span>
					<input type="text" class="input-medium" id="name" name="mobile" placeholder="Mobile No" required="true">
				</div>
			</div>
		</div>
		<div class="control-group">
	        <label class="control-label">Blood Group Needed</label>
			<div class="controls">
			    <div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
					<select id="bg" name="bg" class=" span7">
       <option>  </option>
       <option>A+</option>
       <option>A-</option>
       <option>B+</option>
       <option>B-</option>
       <option>AB+</option>
       <option>AB-</option>
       <option>O+</option>
       <option>O-</option>
     </select>
				</div>
			</div>
		</div>
		<div class="control-group ">
	        <label class="control-label">Hospital's Postal/Zip Code</label>
			<div class="controls">
			    <div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" class="input-small" id="zip" name="zip" placeholder="Postal/Zip code" required="true">
				</div>
			</div>
		</div>
		<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-success" rel="tooltip" title="first tooltip">Submit</button>
	       
	      </div>
	
	</div>
	
	  </form>
<?php endif; ?>
   </div>
</div>  
    </div>
         
</body>


</html>
