<?php 
session_start();
include("includes/admin_header.php");
 include("includes/admin_navbar.php");

 ?>


<div class="container-fluid">
  <!--DataTales Exemple--->
  <div class="card shdow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profil </h6>

 </div>
 <div class="card-body">


<?php
$con = mysqli_connect("localhost","root","","the_perfect_cup1");
 if(isset($_POST['edit_btn'])){
    $id = $_POST['edit_id'];
    //echo $id;
    $query = "SELECT * FROM user WHERE id='$id'";
    $query_run = mysqli_query($con,$query);
    foreach($query_run as $row) {
     ?>


   <form action="admin_register.php" method="POST"> 
     <div class="modal-bady">
       <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>" >
        <div class="form-group">
            <label>Your Name</label>
            <input type="text" id="edit_username" name="edit_username" value="<?php echo $row['username'] ?>"  maxlength="25" class="form-control" placeholder="Enter name" required> 
        </div>
        
        <div class="form-group ">
            <label>Email Address</label>
            <input type="email" id="edit_email" name="edit_email" maxlength="25" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Enter Email" required>  
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" id="edit_password" name="edit_password" value="<?php echo $row['password'] ?>" maxlength="25" class="form-control" placeholder="Enter Password" required>  
        </div>

        <a href="admin_register.php" class="btn btn-danger">CANCEL</a>
        <button type="submit" name="update_btn" class="btn btn-primary"> Update </button>


        <?php
    }

}
?>
      
    </div>
       


   





 </div>
</div>
</div>
</div>
  


















<?php
 include("includes/admin_script.php");
 include("includes/admin_footer.php");

 ?>