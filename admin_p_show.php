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
      <Center><h1>Show products</h1></Center>
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
//...............................................................................
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
//...............................................................................


if (!isset($_GET['id'])): 
$allProducts =  getAllProducts($test);
echo "<div class='middle_bottom'>";
   foreach($allProducts as $key=>$line)
   {
 echo "<li><a href='admin_p_show.php?id=" . $line['id'] . "'>" . $line['name'] . "</a></li>";
   }
echo "</div>";
endif; 

//............................................................................... 

if (isset($_GET['id']))
{ 

 $query = "SELECT * FROM Products WHERE id= '" . $_GET['id'] . "'";
try{
  $PDO_query = $test->query($query);

  $row = $PDO_query->fetch();  

if (count($row) == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      echo "PDO_query ERROR: " . $e->getMessage() . "\n";
    }
}

//...............................................................................
 if (isset($_GET['id'])): ?>
<div class='middle_bottom'>
<form action="admin_p_show.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" value="<?php echo $row['name'] ?>" /><br/>
     <label>Price: </label><br/><input type="text" name="price" value="<?php echo $row['price'] ?>" /><br/>
     <label>Category Id : </label><br/><input type="text" name="category_id" value="<?php echo $row['category_id'] ?>"/><br/>
     <br/>
</form> 
</div>
<?php endif; ?>
<!-- ............................................................................... -->
 <footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer> 
</body>
</html>


 
