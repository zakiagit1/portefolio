<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "zakia-portfolio";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if($conn){
        echo "Connection ok";
          
      }else{
        die(' not Connect :' .mysqli_connect_error());
      }


?>