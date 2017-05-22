<?php
include_once("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
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

function getProducts_byName($test)
{
  if (isset($_POST['price']) && !isset($_POST['name']))
$query = "SELECT * FROM Products WHERE name ='".$_POST['search']."' ORDER BY price " . $_POST['price'];
  
  else if (isset($_POST['name']) && !isset($_POST['price']))
$query = "SELECT * FROM Products WHERE name ='" .$_POST['search']. "' ORDER BY name " . $_POST['name'];

  else if (isset($_POST['name']) && isset($_POST['price']))
$query = "SELECT * FROM Products WHERE name ='" .$_POST['search']. "' ORDER BY name " . $_POST['name'] . ", price " . $_POST['price'] ;

else 
$query = "SELECT * FROM Products WHERE name ='" . $_POST['search'] . "'";

try{
  $PDO_query = $test->query($query);

  $table = $PDO_query->fetchall();  

if (count($table) == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      // echo "PDO_query ERROR: " . $e->getMessage() . "\n";
  echo "Unexpected error occured, please try again later on.";
    }
return $table;
}
//...............................................................................
function getProducts_byPrice($test)
{
  if (isset($_POST['price']) && !isset($_POST['name']))
$query = "SELECT * FROM Products WHERE price ='" .$_POST['search']. "' ORDER BY price " . $_POST['price'];
  
  else if (isset($_POST['name']) && !isset($_POST['price']))
$query = "SELECT * FROM Products WHERE price ='" .$_POST['search']. "' ORDER BY name " . $_POST['name'];

  else if (isset($_POST['name']) && isset($_POST['price']))
$query = "SELECT * FROM Products WHERE price ='" .$_POST['search']. "' ORDER BY name " . $_POST['name'] . ", price " . $_POST['price'] ;

else 
$query = "SELECT * FROM Products WHERE price ='" .$_POST['search'] . "'";

try{
  $PDO_query = $test->query($query);

  $table = $PDO_query->fetchall();  

if (count($table) == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      // echo "PDO_query ERROR: " . $e->getMessage() . "\n";
   echo "Unexpected error occured, please try again later on.";
    }
return $table;
}

//...............................................................................

function getProducts_byCategory($test)
{

  if (isset($_POST['price']) && !isset($_POST['name']))
$query = "SELECT * FROM Products LEFT JOIN Category on Products.category_id = Category.id where Category.name= '" . $_POST['search'] . "' ORDER BY price " . $_POST['price'];

  
  else if (isset($_POST['name']) && !isset($_POST['price']))
$query = "SELECT * FROM Products LEFT JOIN Category on Products.category_id = Category.id where Category.name= '" . $_POST['search'] . "' ORDER BY price " . $_POST['name'];


  else if (isset($_POST['name']) && isset($_POST['price']))
$query = "SELECT * FROM Products LEFT JOIN Category on Products.category_id = Category.id where Category.name= '" . $_POST['search'] . "' ORDER BY name " . $_POST['price'] . ", price " . $_POST['price'] ;

else 
$query = "SELECT * FROM Products LEFT JOIN Category on Products.category_id = Category.id where Category.name= '" . $_POST['search'] . "'";

try{
  $PDO_query = $test->query($query);

  $table = $PDO_query->fetchAll( PDO::FETCH_UNIQUE );  

if (count($table) == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      // echo "PDO_query ERROR: " . $e->getMessage() . "\n";
  echo "Unexpected error occured, please try again later on.";
    }
return $table;
}

//...............................................................................
$_SESSION['flag'] = false;
if (isset($_POST['subBtn']))
{
$result = null;
if ($_POST['Type'] == "Name")
{
$result = getProducts_byName($test);
}
else if ($_POST['Type'] == "Price")
{
$result = getProducts_byPrice($test);
}
else if ($_POST['Type'] == "Category")
{
$result = getProducts_byCategory($test);
$_SESSION['flag'] = true;
}
$_SESSION['result'] = $result;
// var_dump($_SESSION['result']);
}
if (isset($_GET['id']))
{
header('Location: index.'.$_GET['id'].'.php');
exit();
}
?>

<?php if (!isset($result)): ?>
	<div class="moncadre">
  <form action="search_tool.php" method="post">
	   <label><STRONG>Find product</STRONG> :</label><br/><input type="text" name="search" required/>
	  <SELECT name="Type" size="1">
    <OPTION selected="selected">Name</OPTION>
    <OPTION>Price</OPTION>
    <OPTION>Category</OPTION>
    </SELECT><br>
    <STRONG>Price </STRONG>: 
    <INPUT type="radio" name="price" value="ASC">Up</INPUT>
    <INPUT type="radio" name="price" value="DESC">Down</INPUT><br>
    <STRONG>Name </STRONG>: 
    <INPUT type="radio" name="name" value="ASC">Up</INPUT>
    <INPUT type="radio" name="name" value="DESC">Down</INPUT><br>    
   <input type="submit" value="Submit" name="subBtn" >
  </form>
  </div>
  <?php endif; ?>
<?php if (isset($result)): ?>
<ul>
<?php
   foreach($_SESSION['result'] as $key=>$line)
   {
    if ($_SESSION['flag'] == false)
 echo "<li><a href='search_tool.php?id=" . $line['id'] . "'>" . $line['name'] . "</a></li>";
   else
 echo "<li><a href='search_tool.php?id=" . $line['id'] . "'>" . $line[0] . "</a></li>";
   }
?>
</ul>
<?php endif; ?>

</body>
</html>