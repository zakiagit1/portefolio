<?php
   

$host = "localhost";
$user = "root";
$pw = "";
$db = "the_perfect_cup1";//

$con = mysqli_connect($host,$user,$pw,$db);
 if($con){
  echo"connected";
 }else{
  echo"no connected";}


if(isset($_POST["submit"])){
	
	$fname = $_POST["fname"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm = $_POST["confirm"];	
	 
	$sql = "INSERT INTO `user` (name,email,password,confirm) VALUES ('$fname','$email','$password','$confirm')";
	if (mysqli_query($con, $sql)) {
		  echo "<h2><font color=blue> New record added to database.</font></h2>";
	} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);

	header('location:register.php');
}

?>