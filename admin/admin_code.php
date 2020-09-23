
<?php

//include("cbd.php");
//include("security.php");
session_start();
$con = mysqli_connect("localhost","root","","the_perfect_cup1");
//$dbconfig = mysqli_select_db($con,$db);



if (isset($_POST['save_produit'])){

    $pdt_title = $_POST["pdt_title"]; 
    $pdt_image = $_FILES["pdt_image"]["name"];  
    $pdt_description = $_POST["pdt_description"]; 
    $pdt_prix = $_POST["pdt_prix"];

    if(file_exists("upload/" .$_FILES["pdt_image"]["name"])){

        $store = $_FILES["pdt_image"]["name"];
        $_SESSION['status'] = "Image already existe. '.$store.'";
        header("location: list_produit.php");

    
    }else {

    $query = "INSERT INTO produits (`pdt_title`,`pdt_image`,`pdt_description`,`pdt_prix`)
              VALUES ('$pdt_title','$pdt_image','$pdt_description','$pdt_prix')";

    $query_run = mysqli_query($con, $query);
    
      if($query_run){

        move_uploaded_file($_FILES["pdt_image"]["tmp_name"], "upload/".$_FILES["pdt_image"]["name"]);
         //echo "Saved";
         $_SESSION['success'] = "new product Added";
         header('location: list_produit.php');   

      }
      else{
        $_SESSION['success'] = "new product is not Added";
        header('location: list_produit.php');
      }
    }

              
}

   


////update produit//////////

if(isset($_POST['pdt_update_btn'])) {

    $edit_id = $_POST["edit_id"];
    $edit_pdt = $_POST["edit_pdt"];
    $pdt_image = $_FILES["pdt_image"]["name"];
    $edit_descrip = $_POST["edit_descrip"];
    $edit_prix = $_POST["edit_prix"];
   /// $image_prod_tmp = $_FILES['image']['tmp_name'];///////////

    $query= "UPDATE produits SET pdt_title='$edit_pdt', pdt_image='$pdt_image' , pdt_description='$edit_descrip' , 
                   pdt_prix='$edit_prix' WHERE id_coffe = '$edit_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run){
        //move_uploaded_file($image_prod_temp, "../img/$image_prod");
        

        move_uploaded_file($_FILES["pdt_image"]["tmp_name"], "upload/".$_FILES["pdt_image"]["name"]);
        //echo "Saved";
        $_SESSION['success'] = "product Updated";
        header('location: list_produit.php');


    }
else{
    $_SESSION['success'] = "product is not Updated";
    header('location: list_produit.php'); 
}


}


////delete produit/////////


if(isset($_POST['delete_pdt_btn']))
{
$id_coffe = $_POST['delete_id'];

$check_query= "SELECT * FROM produits WHERE id_coffe='$id_coffe' ";
$check_query_run = mysqli_query($con, $check_query);
foreach ($check_query_run  as $rows) 
{
  
if($img_path = "upload/".$row['images'])
{
    $query= "DELETE FROM produits WHERE id_coffe='$id' ";
    $query_run = mysqli_query($con, $query);

  if($query_run)
  {

   unlink($img_path);
   $_SESSION['success'] = "Your Data is Deleted";
   header('location: list_produit.php');
  }
  else
   {
    $_SESSION['status'] = "Your Data is Not  Deleted";
    header('location: list_produit.php');
   }


}

}

}

















///////////register admin///////


if (isset($_POST['registerbtn'])) {

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm = $_POST["confirm"];

if($password === $confirm){

    $query = "INSERT INTO user (username,email,password) VALUES ('$username','$email','$password') ";
    $query_run = mysqli_query($con, $query);
    
    if($query_run){
       // echo "Saved";
        $_SESSION["success"] = "Admin Profil Added";
        header("location: admin_register.php");
    
    }
    else{
       // echo "Notsaved";
        $_SESSION["status"] = "Admin Profil Not Added";
        header("location: admin_register.php");
    }
}
else{
    $_SESSION["status"] = "Password And Confirm Password Not Match";
    header("location: admin_register.php");
}

}
?>

<?php

///update btn

if(isset($_POST["update_btn"]))
{
$id = $_POST['edit_id'];
$username = $_POST['edit_username'];
$email = $_POST['edit_email'];
$password = $_POST['edit_password'];

$query= "UPDATE user SET username='$username', email='$email' , password='$password' WHERE id='$id' ";
$query_run = mysqli_query($con, $query);

if($query_run){

    $_SESSION['success'] = "Your Data is Update";
    header('location: admin_register.php');
}
else{
    $_SESSION['status'] = "Your Data is Not  Update";
    header('location: admin_register.php');
}
}


?>


<?php
///delete btn

if(isset($_POST['delete_btn']))
{
$id = $_POST['delete_id'];

$query= "DELETE FROM user WHERE id='$id' ";
$query_run = mysqli_query($con, $query);

if($query_run){

    $_SESSION['success'] = "Your Data is Deleted";
    header('location: admin_register.php');
}
else{
    $_SESSION['status'] = "Your Data is Not  Deleted";
    header('location: admin_register.php');
}
}




?>

