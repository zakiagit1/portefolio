<?php include "includes/admin_header.php" ?>
<?php require_once "bd.php";?>
<?php session_start(); ?>

<?php 
    //getting the session id
    if (isset($_SESSION['id'])) {
        $id_client = $_SESSION['id'];
    }
    //getting the item id
    if (isset($_GET['articl'])) {
        $articl_id = $_GET['articl'];
        //getting all items from cart table
    $cart_query = "SELECT * FROM carte WHERE id_pdt = '$articl_id' AND id_coffe = '$id_client'";
    $cart_search_query = mysqli_query($con,$cart_query);
    if (!$cart_search_query) {
        die("QUERY FAILED" . mysqli_error($con));
    }
    while ($row = mysqli_fetch_array($cart_search_query)) {
        $articl_id = $row['id_pdt'];
        $articl_title = $row['article_name'];
        $articl_image = $row['image'];
        $articl_price = $row['prix'];
        $articl_quantity = $row['quantité'];
       
    }
    $row_count = mysqli_num_rows($cart_search_query);

    if($row_count > 0){
        $update_query = "UPDATE carte SET quantité = '$articl_quantity+1' WHERE id_pdt = '$articl_id' AND id_coffe = '$id_client'";
        $update_articl_query = mysqli_query($con,$update_query);
        header('Location: panier.php');

    }else{
         //getting the item infos from products table
        $articl_query = "SELECT * FROM produits WHERE id_coffe = '$articl_id'";
        $articl_search_query = mysqli_query($con,$articl_query);

        while ($row = mysqli_fetch_array($articl_search_query)) {
          
            $articl_title = $row['pdt_title'];
            $articl_image = $row['pdt_image'];
            $articl_price = $row['pdt_prix'];
            
            
         
        }

        if (!$articl_search_query) {
            die("QUERY FAILED" . mysqli_error($con));
        }

         //adding the item to cart if it doesn't already exist
        $add_query = "INSERT  INTO carte (id_pdt,id_coffe,article_name,image,prix) VALUES ('$articl_id','$id_client','$articl_title','$articl_image','$articl_price')";
        $add_to_cart_query = mysqli_query($con,$add_query);

        if (!$add_to_cart_query) {
            die("QUERY FAILED" . mysqli_error($con));
        }

        header('Location: panier.php');
    }
    }
?>

           <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Cart
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Add</th>
                        <th>Reduce</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            
                            $cart_query = "SELECT * FROM carte WHERE id_coffe = '$id_client'";
                            $cart_search_query = mysqli_query($con,$cart_query);
                            while ($row = mysqli_fetch_array($cart_search_query)) {
                                
                                $articl_id = $row['id_pdt'];
                                $articl_title = $row['article_name'];
                                $articl_image = $row['image'];
                                $articl_price = $row['prix'];
                                $articl_quantity = $row['quantité'];

                                $total =$articl_quantity * $articl_price  ;

                                echo "<tr>";
                                echo "<td>$articl_id</td>";
                                echo "<td>$articl_title</td>";
                                echo "<td><img class= 'img-responsive' src='../img/$articl_image' alt=''></td>";
                                echo "<td>$articl_price</td>";
                                echo "<td>$articl_quantity</td>";
                                echo "<td>$total</td>";
                                echo "<td><a href='panier.php?add=$articl_id&user=$id_client'>Add</a></td>";
                                echo "<td><a href='panier.php?reduce=$articl_id&user=$id_client'>Reduce</a></td>";
                                echo "<td><a href='panier.php?remove=$articl_id&user=$id_client'>Remove</a></td>";
                                echo "</tr>";

                            }

                                
                            if (isset($_GET['remove'])) {
                                $removed_articl_id = $_GET['remove'];

                                $remove_query = "DELETE FROM carte WHERE id_pdt = '$removed_articl_id' AND id_coffe = '$id_client'";
                                $removed_articl_query = mysqli_query($con,$remove_query);

                                header('Location: panier.php');
                            }
                            if (isset($_GET['add'])) {
                                $added_articl_id = $_GET['add'];

                                $add_articl_query = "UPDATE carte SET quantité = '$articl_quantity' + 1 WHERE id_pdt = '$added_articl_id' AND id_coffe = '$id_client'";
                                $added_articl_query = mysqli_query($con,$add_articl_query);

                                header('Location: panier.php');
                            }

                            if (isset($_GET['reduce'])) {
                                $reduced_articl_id = $_GET['reduce'];

                                $check_query = "SELECT * FROM carte WHERE id_pdt = '$reduced_articl_id' AND id_coffe = '$id_client'";
                                $check_quantity_query = mysqli_query($con,$check_query);
                                $check_row = mysqli_fetch_array($check_quantity_query);
                                $quantity = $check_row['articl_quantity'];

                                if ($quantity == 1 ) {
                                    $reduce_articl_query = "DELETE FROM carte WHERE id_pdt = '$reduced_articl_id' AND id_coffe = '$id_client'";
                                    $reduced_articl_query = mysqli_query($con,$reduce_articl_query);
                                }else{
                                    $reduce_articl_query = "UPDATE carte SET quantité = '$articl_quantity' - 1 WHERE id_pdt = '$reduced_articl_id' AND id_coffe = '$id_client'";
                                    $reduced_articl_query = mysqli_query($con,$reduce_articl_query);
                                }

                                

                                header('Location: panier.php');
                            }
                            

                            
                        ?>

                      </tbody>
            </table>
            <a href = "../blog.php" class="btn btn-success btn-lg" data-dismiss="modal">Back to store</a>
            <a href = "#" class="btn btn-success btn-lg" data-dismiss="modal">Proceed to checkout</a>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "includes/admin_footer.php" ?>