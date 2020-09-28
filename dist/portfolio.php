
<?php include 'db.php';

'op_start()';

 session_start(); 
  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <title>View My Work</title>
</head>

<body>
     <?php include 'menu.php';?>


    <main id="work">
        <h1 class="lg-heading">
            Mes Réalisations
            <span class="text-secondary"></span>
        </h1>
        <h2 class="sm-heading">
           Découvrez quelques-uns de mes projets ..
        </h2>
        <div class="projects">

 
                    <?php 
                    
                            $query = "SELECT * FROM projets";
                            $load_projets_query = mysqli_query($con,$query);

                            if (!$load_projets_query) {
                                die("QUERY FAILED". mysqli_error($con));
                            }

                            while ($row = mysqli_fetch_array($load_projets_query)) {
                                $id = $row['id'];
                                $projet_titre = $row['projet_titre'];
                                $projet_image = $row['projet_image'];
                                $projet_url = $row['projet_url'];
                               
                             

                                ?>


           <div class="item">
                
                    <h1><?php echo $projet_titre ?></h1>
             <a href="#">
                    <img src="admin/<?php echo $projet_image ?>" alt="img">
                </a>
                <a href="<?php echo $projet_url ?>" class="btn-light">
                    <i class="fas fa-eye"></i> Project
                </a>
                <a href="#" class="btn-dark">
                    <i class="fab fa-github"></i> Github
                </a>
            </div>
            

                      <?php
                            }
                            ?>

        </div>
    </main>
 <h2 class="intro-text text-center">
           Merci. Click here to <a href="index.php" tite="Logout">Logout.
       </h2>
                    


    <footer id="main-footer">
        Copyright &copy; 2020 Zakia Antary
    </footer>

    <script src="js/main.js"></script>
</body>

</html>



