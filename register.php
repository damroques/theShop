<?php
include_once("user_controller.php");
?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
    <link rel="stylesheet" href="integration1.css"  />
   <title>Register</title>
 </head>
 <header>
<center><p>Welcome to your favorite Bakery !</center></p>
 </header>
 <body>
   <div class="middle">
   <form action="register.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" required/><br/>
     <label>Email : </label><br/><input type="email" name="email" required/><br/>
     <label>Password : </label><br/><input type="password" name="passwd" required/><br/>
     <label>Confirmed password : </label><br/><input type="password" name="check_passwd" required/><br/>
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset">
   <a href="login.php" >Login</a>
   </form>
   </div>

 <footer>  
<div class="boite">
<div class="foot">
<center><p>'La Boulangerie Julien' - '06 66 66 66 66' - 'boulangerie_julien@yolo.fr</p></center>
</div>
<img id="logo" src="logo.jpg">
</div>
</footer> 
 </body>
</html>

<?php

function verify_register($r_name, $r_email, $r_passwd, $check_passwd)
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

$flag_register = verify_register($r_name, $r_email, $r_passwd, $check_passwd);

if ($flag_register == true ) 
{
$r_passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
$user = new User($r_name, $r_email, $r_passwd);
}
}

?>