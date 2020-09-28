<?php include "admin_header.php" ?>
<?php require_once "db.php"?>
 <div class="container-fluid">

 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            admin List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>id_user</th> 
                        <th>adminstrateur</th>                                             
                        <th>mot de passe</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM utilisateur";
                            $load_utilisateur_query = mysqli_query($conn,$query);

                            if (!$load_utilisateur_query) {
                                die("QUERY FAILED". mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_array($load_utilisateur_query)) {
                                $id_user = $row['id_user'];
                                $nom_utilisateur = $row['nom_utilisateur'];
                                $mot_de_passe = $row['mot_de_passe'];
                                
                                echo "<tr>";
                                echo "<td>$id_user</td>";
                                echo "<td>$nom_utilisateur</td>";
                                echo "<td>$mot_de_passe</td>";                               
                                echo "<td><a href='admin.php?delete=$id_user'>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            if (isset($_GET['delete'])) {
                                $deleted_id_user = $_GET['delete'];

                                $delete_query = "DELETE FROM utilisateur WHERE id_user = $deleted_id_user";
                                $deleted_utilisateur_query = mysqli_query($conn,$delete_query);

                                header('Location: admin.php');
                            }
                            

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

    <?php include "admin_footer.php" ?>