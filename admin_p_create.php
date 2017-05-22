<?php
include_once("product_controller.php");
?>

<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" type="text/css" href="admin.css">
   <meta charset="utf-8">
   <title>Register</title>
 </head>
 <header>
      <Center><h1>Create a new product</h1></Center>
 </header>
 <body>
 <div class="middle">
   <form action="admin_p_create.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" required/><br/>
     <label>Price : </label><br/><input type="text" name="price" required/><br/>
     <label>Category_id : </label><br/><input type="text" name="catId" required/><br/>
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset"> 
   </form>
   </div>
   <footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer> 
 </body>
</html>

<?php

function admin_register($r_name, $r_price, $r_catId)
{
$flag = true;

if(!(strlen($r_name)>2 && strlen($r_name)<25))
{
 $flag = false;
 echo("invalid name\n");
}

if($r_price < 0)
{
 $flag = false;
 echo("invalid price\n");}

if($r_catId < 0)
{
 $flag = false;
 echo("invalid category Id\n");
}
return $flag;
}

if (isset($_POST['subBtn']))
{
$r_name = $_POST['name'];
$r_price = $_POST['price'];
$r_catId = $_POST['catId'];


$flag_register = admin_register($r_name, $r_price, $r_catId);

if ($flag_register == true ) 
{
$product = new Product($r_name, $r_price, $r_catId);
}
}

?>