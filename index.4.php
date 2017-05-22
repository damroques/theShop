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
   <link rel="stylesheet" href="integration4.css"  />
   <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
 </head>

 <body >
   <header>
     <header>
     <nav class="transparent" role="navigation">
   <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">La Boulangerie Julien</a>
     <ul class="right hide-on-med-and-down">
       <li><a href="show_p.php" name= "show_p">back to products</a></li>
       <li><a href="#" name="logout">logout</a></li>

     </ul>

   <!-- <div class='container'> -->
<!-- <div id="titre2">
 <h1>La Parisienne</h1>
 </div> -->
    </header>

   </form>
   <div class="enbas">
   <li><a href=?buton=set name="buton"color="red"><strong>La petite histoire</strong></a></li>
  </div>
 <?php if(isset($_GET["buton"])): ?>
   <iframe
   width="1000"
   height="540"
   src="https://fr.wikipedia.org/wiki/Baguette_%28pain%29">
 </iframe>
 <p>la belle histoire</p>
 <?php else: ?>
   <div id="titre2">
    <h1>La Parisienne: 1 euros.</h1>
  </div>
   <div class="moncadre">
     <div class="bboite">
   <div class="boite2">
     <a href="#">
     <img src="image/b_pains4.jpg"/></a>
     <h5>Parisienne</h5>
     <div class="boite3">
       <!-- <p>L'histoire de la parisienne est l'histoire ...</p> -->
 </div>



 <?php endif; ?>



  </div>
  </div>

   <footer>
   <div class="boite">
      <div class="foot">
        <center><h5>'La Boulangerie Julien' - '06 66 66 66 66' - 'boulangerie_julien@yolo.fr</h5></center>
    </div>

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
