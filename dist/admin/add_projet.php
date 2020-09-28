<?php include "admin_header.php"; ?>
<?php  require_once "db.php"; ?>
<?php 

if (isset($_POST['add_projet'])) {
    $projet_titre = $_POST['projet_titre'];
    $projet_image = $_FILES['image']['name'];
    $projet_image_temp = $_FILES['image']['tmp_name'];
    $projet_url = $_POST['projet_url'];
   

 move_uploaded_file($projet_image_temp,"$projet_image");

    $projet_titre = mysqli_real_escape_string($conn,$projet_titre);
    $projet_image = mysqli_real_escape_string($conn,$projet_image);
    $projet_url = mysqli_real_escape_string($conn,$projet_url);
   

    $query = "INSERT INTO projets (projet_titre,projet_image,projet_url) VALUES ('$projet_titre','$projet_image','$projet_url')";
    $add_projet_query = mysqli_query($conn,$query);

    if (!$add_projet_query) {
        die("QUERY FAILED". mysqli_error($conn));
    }
}

?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add a projet
                            
                           
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
             <form action="add_projet.php" method="post" enctype="multipart/form-data">    
     
     
                    <div class="form-group">
                        <label for="titre">Projet Titre</label>
                        <input type="text" class="form-control" name="projet_titre">
                    </div>

                    <!-- <div class="form-group">
                        <select name="post_status" id="">
                            <option value="draft">Post Status</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div> -->
      
      
      
                    <div class="form-group">
                        <label for="projet_image"> Image Projet</label>
                        <input type="file"  name="image" accept="image/png, image/jpg">
                    </div>

                    
                    <div class="form-group">
                        <label for="projet_url">projet_url</label>
                        <textarea class="form-control "name="projet_url" id="" cols="30" rows="5">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="add_projet" value="Add projet">
                    </div>


            </form>


            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>