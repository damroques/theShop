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
      <Center><h1>Delete a product</h1></Center>
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

function getAllProducts($test)
{
  $query = "SELECT * FROM Products ORDER BY name;";

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

$remove = "DELETE from Products where id = " . $_GET['id'];
$PDO_remove = $test->exec($remove);
 
header('Location: admin_p_delete.php');
}

?>
<ul>
<?php
$allProducts =  getAllProducts($test);
echo "<div class='middle_bottom'>";
   foreach($allProducts as $key=>$line)
   {
 echo "<li><a href='admin_p_delete.php?id=" . $line['id'] . "'>" . $line['name'] . "</a></li>";
   }
echo "<div>";
?>
</ul>
 <footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer> 
</body>
</html>