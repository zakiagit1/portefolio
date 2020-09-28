<?php include "admin_header.php"; ?>
<?php  require_once "db.php"; ?>





            <div class="container-fluid">
<h2 class="intro-text text-center">
    
       </h2>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Projet liste
                        </h1>
                    </div>

                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Titre</th>                       
                        <th>Image</th>
                        <th>Url</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM projets";
                            $load_projets_query = mysqli_query($conn,$query);

                            if (!$load_projets_query) {
                                die("QUERY FAILED". mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_array($load_projets_query)) {
                                $id = $row['id'];
                                $projet_titre= $row['projet_titre'];
                                $projet_image = $row['projet_image'];
                                $projet_url = $row['projet_url'];
                                echo "<tr>";
                                echo "<td>$id</td>";
                                echo "<td>$projet_titre</td>";
                                echo "<td><img class= 'img-responsive' src='$projet_image' alt=''></td>";
                                echo "<td>$projet_url</td>";
                                echo "<td> <a href='edit_projet.php?edit=$id'>Edit</a></td>";
                                echo "<td><a href='view_projet.php?delete=$id'>Delete</a></td>";
                                echo "</tr>";
                            }

                            if (isset($_GET['delete'])) {
                                $deleted_id = $_GET['delete'];

                                $delete_query = "DELETE FROM projets WHERE id = $deleted_id";
                                $deleted_projet_query = mysqli_query($conn,$delete_query);

                                header('Location: view_projet.php');
                            }

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>