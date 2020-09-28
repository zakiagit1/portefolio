<?php include "admin_header.php" ?>
<?require_once "db.php";?>
<?php 

if (isset($_GET['edit'])) {
    $id = $_GET['edit']; 
}

$edit_query = "SELECT * FROM projets WHERE id = $id ";
$load_projets_query = mysqli_query($conn,$edit_query);

while($row = mysqli_fetch_array($load_projets_query)){
$id = $row['id'];
$projet_titre = $row['projet_titre'];
$projet_image = $row['projet_image'];
$projet_url = $row['projet_url'];
}

if (isset($_POST['edit_projet'])) {
   @ $projet_titre = $_POST['projet_titre'];
    $projet_image = $_FILES['image']['name'];
    $projet_image_temp = $_FILES['image']['tmp_name'];
    @$projet_url = $_POST['projet_url'];

    move_uploaded_file($projet_image_temp, "$projet_image");

    $projet_titre = mysqli_real_escape_string($conn,$projet_titre);
    $projet_image = mysqli_real_escape_string($conn,$projet_image);
    $projet_url = mysqli_real_escape_string($conn,$projet_url);

    $query = "UPDATE projets SET projet_titre = '$projet_titre' ,projet_image ='$projet_image',projet_url = '$projet_url'  WHERE id = $id ";
    $edit_projets_query = mysqli_query($conn,$query);

    if (!$edit_projets_query) {
        die("QUERY FAILED". mysqli_error($conn));
    }

    
}

?>


<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Edit projet
        </h1>
    </div>
</div>
<!-- /.row -->
<form action="edit_projet.php?edit=<?php echo $id ?>" method="post" enctype="multipart/form-data">    


    <div class="form-group">
        <label for="titre">projet Titre</label>
        <input type="text" value = "<?php echo $projet_titre ?>" class="form-control" name="projet_titre">
    </div>

    <!-- <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div> -->



    <div class="form-group">
        <label for="projet_image">projet Image</label>
        <input type="file"  name="image">
    </div>

    
    <div class="form-group">
        <label for="projet_url">Projet url</label>
        <textarea class="form-control" name="projet_url" id="" cols="30" rows="5"><?php echo $projet_url ?></textarea>
    </div>
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_projet" value="Edit projet">
    </div>


</form>


</div>
<!-- /.container-fluid -->



<?php include "admin_footer.php" ?>