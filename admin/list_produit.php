
<?php include("includes/admin_header.php");?>
<?php include("includes/admin_navbar.php");?>




<!-- Modal -->
<div class="modal fade" id="produitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="admin_code.php" method="Post" enctype="multipart/form-data">
      <div class="modal-body">
         
          <div class="form-group">
            <label>Produit titre</label>
             <input type="text" name="pdt_title" class="form-control" placeholder="entrer titre produit" required> 
          </div>
          <div class="form-group">
            <label>Uploade image</label>
             <input type="file" name="pdt_image" class="form-control" id="pdt_image" required>
          </div>
          <div class="form-group">
            <label>Produit description</label>
             <input type="text" name="pdt_description" class="form-control" placeholder="entrer produit description" required> 
          </div>
          <div class="form-group">
            <label>Produit Prix</label>
             <input type="text" name="pdt_prix" class="form-control" placeholder="entrer produit Prix" required> 
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save_produit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>



<div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">liste produits
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#produitModal">
  Add produits
</button>
      </h6>
 </div>
 <div class="card-body">

 
<?php

if(isset($_SESSION['success']) && $_SESSION['success'] !='')
{
  echo '<h2 class="bg_primary" text-white> '.$_SESSION['success'].' </h2>';
  unset ($_SESSION['success']);
}
if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
  echo '<h2 class="bg_danger" text-white> '.$_SESSION['status'].' </h2>';
  unset ($_SESSION['status']);
}

?>


   <div class="table-responsive">
<?php

$con = mysqli_connect("localhost","root","","the_perfect_cup1");

$query = "SELECT * FROM produits";
$query_run = mysqli_query($con, $query);

if(mysqli_num_rows($query_run) > 0){
     
?>


   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
     <thead>
       <tr>
         <th>Id</th>
         <th>pdt_title</th>
         <th>pdt_image</th>
         <th>pdt_description</th>
         <th>pdt_prix</th>
         <th>EDIT</th>
         <th>DELETE</th>
       </tr>
     </thead>

     <tbody>

     <?php
        while($row = mysqli_fetch_assoc($query_run)){
           
       ?>

       <tr>
       <td><?php echo $row['id_coffe']; ?></td>
       <td><?php echo $row['pdt_title']; ?></td>
       <!--<td></td>-->
       <td><?php echo '<img class="img-responsive" src="./upload/'.$row['pdt_image'].' " width="100px;" height="100px;" alt="Image">'?></td>
       <td><?php echo $row['pdt_description']; ?></td>
       <td><?php echo $row['pdt_prix']; ?></td>
         <td>
         <form action="edit_produit.php" method="POST">
           <input type="hidden" name="edit_id" value="<?php echo $row['id_coffe'];?>">
           <button type="submit" name="edit_data_btn"  class="btn btn-success">EDIT</button>
         </form> 
         </td>
         <td> 
         <form action="admin_code.php" method="POST">
           <input type="hidden" name="delete_id" value="<?php echo $row['id_coffe'];?>">
           <button type="submit" name="delete_pdt_btn"  class="btn btn-success">DELETE</button>
         </form> 
        </td>
       </tr>
        <?php
         } }
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