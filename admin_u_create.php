<?php
include_once("user_controller.php");
?>

<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" type="text/css" href="admin.css">
   <meta charset="utf-8">
   <title>Register</title>
 </head>
  <header>
      <Center><h1>Create a new client account</h1></Center>
 </header>
 <body>
  <div class="middle">
   <form action="admin_u_create.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" required/><br/>
     <label>Email : </label><br/><input type="email" name="email" required/><br/>
     <label>Password : </label><br/><input type="password" name="passwd" required/><br/>
     <label>Confirmed password : </label><br/><input type="password" name="check_passwd" required/><br/>
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset">
       <label>IsAdmin :</label><input type="checkbox" name="is_admin"><br>
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

function admin_register($r_name, $r_email, $r_passwd, $check_passwd)
{
$flag = true;

if(!(strlen($r_name)>2 && strlen($r_name)<11))
{
 $flag = false;
 echo("invalid name\n");
}

if(!(strlen($r_passwd)>2 && strlen($r_passwd)<11))
{
 $flag = false;
 echo("invalid password\n");}

if($r_passwd != $check_passwd)
{
 $flag = false;
 echo("invalid password or password confirmation\n");
}
return $flag;
}

if (isset($_POST['subBtn']))
{
$r_name = $_POST['name'];
$r_email = $_POST['email'];
$r_passwd = $_POST['passwd'];
$check_passwd = $_POST['check_passwd'];

if ($_POST['is_admin'] == "on")
  $r_isAdmin = true;
else
  $r_isAdmin = false;

$flag_register = admin_register($r_name, $r_email, $r_passwd, $check_passwd);

if ($flag_register == true ) 
{
$r_passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
$user = new User($r_name, $r_email, $r_passwd, $r_isAdmin);
}
}

?>