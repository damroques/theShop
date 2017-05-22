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
      <Center><h1>Update products</h1></Center>
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
   <form action="admin_p_update.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" value="<?php echo $_GET['name'] ?>" required/><br/>
     <label>Price : </label><br/><input type="text" name="price" value="<?php echo $_GET['price'] ?>" required/><br/>
     <label>Category_Id : </label><br/><input type="text" name="catId" value="<?php echo $_GET['category_id'] ?>"required/><br/>
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset">
   </form>
   </div>
 <?php endif; ?>
 <ul>
<?php if (!isset($_GET['id'])): 
$allProducts =  getAllProducts($test);
echo "<div class='middle_bottom'>";
   foreach($allProducts as $key=>$line)
   {
 echo "<li><a href='admin_p_update.php?id=" . $line['id'] . "&name=" . $line['name'] . "&price=" . $line['price'] . "&category_id=" . $line['category_id'] ."'>" . $line['name'] . "</a></li>";
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

if (isset($_GET['id']))
  $_SESSION['p_id'] = $_GET['id'];

$table = getAllProducts($test);

  function update()
  {
    $update_name = $_POST['name'];
    $update_price = $_POST['price'];
    $update_category_id = $_POST['catId'];
    
    $query = "UPDATE Products SET name = '$update_name',
     price = '$update_price',
     category_id = '$update_category_id'
     WHERE id = " . $_SESSION['p_id'] ;

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

 function check_update($update_name, $update_price, $update_catId)
{
$flag = true;

if(!(strlen($update_name)>2 && strlen($update_name)<25))
{
 $flag = false;
 echo("invalid name\n");
}

if($update_price < 0)
{
 $flag = false;
 echo("invalid price\n");}

if($update_catId < 0)
{
 $flag = false;
 echo("invalid category Id\n");
}
return $flag;
}


if (isset($_POST['subBtn']))
{
  $flag_update = check_update($_POST['name'], $_POST['price'], $_POST['catId']);
  if ($flag_update == true)
{
  try
  {
    update();
    echo "Product updated";
  }
  catch (PDOException $e) {
    echo "PDO ERROR: " . $e->getMessage();
}
header('Location: admin_p_update.php');
exit();
}
}
?>
