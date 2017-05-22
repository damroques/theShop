<?php
session_start();
include_once("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="admin.css">
</head>
 <header>
      <Center><h1>Delete a client account</h1></Center>
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

// ............................................................................. 

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
// ............................................................................. 

if(isset($_GET['id']) && $_GET['id'] != null)
{

$remove = "DELETE from Users where id = " . $_GET['id'] . " AND is_admin != 1";
$PDO_remove = $test->exec($remove);
 
if($PDO_remove == 0)
  echo " You can’t delete an administrator";
else
header('Location: admin_u_delete.php');
}

?>
<ul>
<?php
$allUsers =  getAllUsers($test);
echo "<div class='middle_bottom'>";
   foreach($allUsers as $key=>$line)
   {
 echo "<li><a href='admin_u_delete.php?id=" . $line['id'] . "'>" . $line['email'] . "</a></li>";
   }
echo "</div>";
?>
</ul>
 <footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer> 
</body>
</html>