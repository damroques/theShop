<?php
include_once("login_controller.php");

session_start();
?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
   <title>Welcome</title>
   <link rel="stylesheet" href="integration3.css"  />
   <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
 </head>

 <body >
   <header>
     <header>
     <nav class="transparent" role="navigation">
   <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">La Boulangerie Julien</a>
     <ul class="right hide-on-med-and-down">
       <li><a href="show_p.php" name= "show_p">show products</a></li>
       <li><a href="#" name="logout">logout</a></li>

     </ul>
   </header>
   <!-- <div class='container'> -->
<div id="titre2">
 <h1>viennoiseries sucrees</h1>
 </div>

   </form>

<div class="moncadre">
  <div class="bboite">
<div class="boite2">

  <div class="boite2">
  <a href="#">
  <img src="image/croissantO.jpg"/></a>
  <h5>Le fameux croissant ordinaire: 0,90 euros.</h5>
</div>
</div>
</div>
<footer>
<div class="boite">
   <div class="foot">
     <center><h5>'La Boulangerie Julien' - '06 66 66 66 66' - 'boulangerie_julien@yolo.fr</h5></center>
 </div>
 <!-- <h5>vos envies sont les notres </h5> -->
 <img id="logo" src="image/logo.jpg">


 </div>
    </footer>

 </body>
</html>
<?php
if (isset($_GET['logout']))
{
session_destroy();
header('Location: login.php');
exit();
}
?>
