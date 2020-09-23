<?php
session_start();
//inclaude("cbd.php");
//$host = "localhost";
//$user = "root";
//$pw = "";
//$db = "the_perfect_cup1";//
$con = mysqli_connect("localhost","root","","the_perfect_cup1");
$dbconfig = mysqli_select_db($con,$db);
if($dbconfig){

echo "database connected";

}
else{
    header("location: admin_code.php");
}
if(!$_SESSION['username'])
{
    header("location: admin_register.php");
}

?>