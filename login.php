<?php
include_once("login_controller.php");
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
     <link rel="stylesheet" href="integration1.css"  />
 </head>
 <header>
<center><p>Welcome to your favorite Bakery !</center></p>
 </header>
 <body>
   <div class="middle">
   <form action="login.php" method="post">
     <label>Email : </label><br/><input type="email" name="email" required/><br/>
     <label>Password : </label><br/><input type="password" name="passwd" required/><br/>   
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset">
     <label>Remember me :</label><input type="checkbox" name="remember"><br/>
       <a href="register.php" >Register</a>
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

function verify_login($l_email, $l_passwd)
{
$flag = true;

if(!(strlen($l_passwd)>2 && strlen($l_passwd)<11))
{
 $flag = false;
 echo("invalid password\n");
}

return $flag;
}

if (isset($_POST['subBtn']))
{

// if (isset($_POST["remember"]))
// {
//  $params = session_get_cookie_params();
//  setcookie(session_name(), $_COOKIE[session_name()], time() + 3600, $params["path"], $params["secure"], $params["httponly"]);
// }

$l_email = $_POST['email'];	
$l_passwd = $_POST['passwd'];	

$flag_login = verify_login($l_email, $l_passwd);

if ($flag_login == true ) 
{
$login = new Login($l_email, $l_passwd);
}
}
?>