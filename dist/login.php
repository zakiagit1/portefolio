<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <title>zakia-Portfolio</title>
</head>

<body id="login-img">
    <?php include 'menu.php';?>
    
    <h1 class="lg-heading">
        LOGIN
        <span class="text-secondary"></span>
    </h1>
    <h2 class="sm-heading">
        Connecter To espace Admin
    </h2>
<div class="login">
    
    <div id="container">
        <!-- zone de connexion -->
    
        <form action="verification.php" method="POST">
            <h1>Connexion</h1>
    
            <label><b>Nom d'utilisateur</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
    
            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
    
            <input type="submit" id='submit' value='LOGIN'>
            <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    ?>
        </form>
    </div>
    <div class="picture"><img src="../dist/img/login-icon.jpg" alt="" ></div>
    </div>






    <script src="js/main.js"></script>
</body>

</html>