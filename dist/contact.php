<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css' />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


  <link rel="stylesheet" href="css/main.css">
  <title>Contact Me</title>
</head>

<body>
   <?php include 'menu.php';?>

  <main id="contact">
   


  <h1 class="lg-heading">
    Contact
    <span class="text-secondary">Me</span>
  </h1>
  <h2 class="sm-heading">
   
  </h2>
  



    <!--Section: Contact v.2-->
    <section class="mb-4">



      <div class="frame">
        <div id="button_open_envelope">
          Email me
        </div>
        <div class="message">
          <form method="post" action="mail.php">
            <input type="text" name="name" id="name" placeholder=" Name* " required>

            <input type="email" name="email" id="email" placeholder=" Email* " required
              pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$">

            <input type="text" name="subject" id="subject" placeholder=" Subject* " autofocus>

            <textarea name="message" id="messarea" placeholder=" Message* " required></textarea>

            <input type="text" name="address" id="address" style="display: none;">
            <input type="submit" value="Send" id="send">
          </form>
        </div>
        <div class="bottom"></div>
        <div class="left"></div>
        <div class="right"></div>
        <div class="top"></div>

      </div>


<div class="boxes">
  <div>
    <span class="text-secondary">Email: </span> zakia.antary@gmail.com
  </div>
  <div>
    <span class="text-secondary">Phone: </span> (+212) 06-54-50-35-14
  </div>
 
</div>





 
  </main>

  <footer id="main-footer">
    Copyright &copy; 2020 Zakia Antary
  </footer>

  <script src="js/main.js"></script>
</body>

</html>