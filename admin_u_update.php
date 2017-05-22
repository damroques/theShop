<?php
include_once("db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="admin.css">
   <title>Register</title>
 </head>
 <header>
      <Center><h1>Update clien accounts</h1></Center>
 </header>
 <body>
 <?php
$db = new Connection();

if ($db->getPDO() == FALSE) 
{
echo "Unexpected error occured. Please try again.";
return;
}
$test = $db->getPDO();
?>
 <?php if (isset($_GET['id'])): ?>
    <div class='middle_bottom'>
   <form action="admin_u_update.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" value="<?php echo $_GET['name'] ?>" required/><br/>
     <label>Email : </label><br/><input type="email" name="email" value="<?php echo $_GET['email'] ?>" required/><br/>
     <label>Password : </label><br/><input type="password" name="passwd" required/><br/>
     <label>Confirmed password : </label><br/><input type="password" name="check_passwd" required/><br/>
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset">
      <label>IsAdmin :</label><input type="checkbox" name="is_admin"><br/>
   </form>
    </div>
 <?php endif; ?>
 <ul>
<?php if (!isset($_GET['id'])): 
$allUsers =  getAllUsers($test); 
echo "<div class='middle_bottom'>";
   foreach($allUsers as $key=>$line)
   {
 echo "<li><a href='admin_u_update.php?id=" . $line['id'] . "&name=" . $line['name'] . "&email=" . $line['email'] . "'>" . $line['email'] . "</a></li>";
   }
 echo "</div>";
endif; ?>
</ul>  
<footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer> 
 </body>
</html>

<?php

function getAllUsers($test)
{
  $query = "SELECT * FROM Users ORDER BY email;";

try{
  $PDO_query = $test->query($query);

  $row_query = $PDO_query->fetchall();  

if (count($row_query) == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      echo "PDO_query ERROR: " . $e->getMessage() . "\n";
    }
return $row_query;
}

if (isset($_GET['id']))
  $_SESSION['id'] = $_GET['id'];

$table = getAllUsers($test);

  function update()
  {
    $update_name = $_POST['name'];
    $update_email = $_POST['email'];
    $update_password = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
 

  
    if (isset($_POST['is_admin']) && $_POST['is_admin'] == "on") 
    $update_isAdmin = true;
    else
    $update_isAdmin = false;

    
    $query = "UPDATE Users SET name = '$update_name',
     email = '$update_email',
     password = '$update_password',
     is_admin = '$update_isAdmin'
     WHERE id = " . $_SESSION['id'] ;

try{
  $db = new Connection();

  if ($db->getPDO() == FALSE) 
   {
  echo "Unexpected error occured. Please try again.";
  return;
}
$test = $db->getPDO();
  $update = $test->exec($query);

if ($update == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      echo "PDO_query ERROR: " . $e->getMessage();
    }
}

 function check_update($update_name, $update_email, $update_passwd, $update_check_passwd)
{
$flag = true;

if(!(strlen($update_name)>2 && strlen($update_name)<11))
{
 $flag = false;
 echo("invalid name\n");
}

if(!(strlen($update_passwd)>2 && strlen($update_passwd)<11))
{
 $flag = false;
 echo("invalid password\n");}

if($update_passwd != $update_check_passwd)
{
 $flag = false;
 echo("invalid password or password confirmation\n");
}
return $flag;
}



if (isset($_POST['subBtn']))
{
  $flag_update = check_update($_POST['name'], $_POST['email'], $_POST['passwd'], $_POST['check_passwd']);
  if ($flag_update == true)
{
  try
  {
    update();
    echo "Account updated";
  }
  catch (PDOException $e) {
    echo "try PDO ERROR: " . $e->getMessage();
}
header('Location: admin_u_update.php');
exit();
}
}
?>
