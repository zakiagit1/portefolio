<?php 
session_start();
include("includes/admin_header.php");
 include("includes/admin_navbar.php");
 ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add admin data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


 <form role="form" action="admin_code.php" method="post">
                  
    <div class="modal-bady">
        <div class="form-group">
            <label>Your Name</label>
            <input type="text" id="username" name="username" maxlength="25" class="form-control" placeholder="Enter name" required> 
        </div>
        
        <div class="form-group ">
            <label>Email Address</label>
            <input type="email" id="email" name="email" maxlength="25" class="form-control" placeholder="Enter Email" required>  
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" id="password" name="password" maxlength="25" class="form-control" placeholder="Enter Password" required>  
        </div>
       
       <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" id="confirm" name="confirm" maxlength="25" class="form-control" placeholder="Enter ConfirmPassword" required>
        </div>
    </div>
       
   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="registerbtn">Save changes</button>
      </div>
</form>
   
    </div>
  </div>
</div>

<div class="container-fluid">
  <!--DataTales Exemple--->
  <div class="card shdow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Admin Profil
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
  Add Admin Profile 
</button>
      </h6>
 </div>
 <div class="card-body">

<?php

if(isset($_SESSION['success']) && $_SESSION['success'] !='')
{
  echo '<h2 class="bg_primary"> '.$_SESSION['success'].' </h2>';
  unset ($_SESSION['success']);
}
if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
  echo '<h2 class="bg_danger"> '.$_SESSION['status'].' </h2>';
  unset ($_SESSION['status']);
}

?>



   <div class="table-responsive">
<?php
$con = mysqli_connect("localhost","root","","the_perfect_cup1");

$query = "SELECT * FROM user ";
$query_run = mysqli_query($con, $query);
?>



   <table class="table table-bordered" id="DataTable" width="100%" cellspacing="0">
     <thead>
       <tr>
         <th>Id</th>
         <th>Username</th>
         <th>Email</th>
         <th>Password</th>
         <th>EDIT</th>
         <th>DELETE</th>
       </tr>
     </thead>

     <tbody>
       <?php
       if(mysqli_num_rows($query_run) > 0){
         while ($row = mysqli_fetch_assoc($query_run)) {
           
          ?>
         
       <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['username'];?></td>
         <td><?php echo $row['email']; ?></td>
         <td><?php echo $row['password'];?></td>
         <td>
           <form action="register_edit.php" method="POST">
             <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
           <button type="submit" name="edit_btn"  class="btn btn-success">EDIT</button>
         </form>
         </td>
         <td>
         <form action="admin_code.php" method="POST">
             <input type="hidden" name="delete_id" value="<?php echo $row['id'];?>">
            <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
         </form>
        
         </td>
       </tr>
       
       <?php
         }
        }else{
             //echo "No Record Found";
            }
       
       ?>
     </tbody>

   </table>

   </div>
</div>
</div>
</div>
  


<?php
 include("includes/admin_script.php");
 include("includes/admin_footer.php");

 ?>