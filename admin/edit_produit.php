
<?php include("includes/admin_header.php");?>
<?php include("includes/admin_navbar.php");?>

<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">edit Produit</h6>
      </div> 
    </div>

    <div class="card-body">


    <?php
       $con = mysqli_connect("localhost","root","","the_perfect_cup1");
        if(isset($_POST['edit_data_btn'])){
          $id_coffe = $_POST['edit_id'];
          //echo $id;
         $query = "SELECT * FROM produits WHERE id_coffe='$id_coffe'";
         $query_run = mysqli_query($con,$query);
        foreach($query_run as $row) {
    ?>



    <form action="admin_code.php" method="POST" enctype="multipart/from-data" > 
     
       <input type="hidden" name="edit_id" value="<?php echo $row['id_coffe']?>" >
        <div class="form-group">
            <label>Title prodact</label>
            <input type="text"  name="edit_pdt" value="<?php echo $row['pdt_title']?>"  maxlength="25" 
            class="form-control" placeholder="title produit" required> 
        </div>
         
        <div class="form-group ">
            <label>Image prodact</label>
            <input type="file"  name="pdt_image" id="pdt_image"  value="<?php echo $row['pdt_image']?>" maxlength="25" 
            class="form-control" placeholder="image" required>  
        </div>

        <div class="form-group">
            <label>Description produdt</label>
            <input type="text"  name="edit_descrip" id="edit_descrip" value="<?php echo $row['pdt_description']?>" maxlength="25" 
            class="form-control" placeholder="description" required>  
        </div>

        <div class="form-group">
            <label>Prix product</label>
            <input type="text" id="edit_prix" name="edit_prix" value="<?php echo $row['pdt_prix']?>"
             maxlength="25" class="form-control" placeholder="Prix" required>  
        </div>

        <a href="list_produit.php" class="btn btn-danger">Cancel</a>
        <button type="submit" name="pdt_update_btn" class="btn btn-primary"> Update </button>

   </form> 
   
   <?php 
    }}
   ?>
</div>

</div>


























<?php
 include("includes/admin_script.php");
 include("includes/admin_footer.php"); 
 ?>