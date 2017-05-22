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
      <Center><h1>Show client account</h1></Center>
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
//...............................................................................


if (!isset($_GET['id'])): 
$allUsers =  getAllUsers($test);
echo "<div class='middle_bottom'>";
   foreach($allUsers as $key=>$line)
   {
 echo "<li><a href='admin_u_show.php?id=" . $line['id'] . "'>" . $line['email'] . "</a></li>";
   }
 echo "</div>";
endif; 


//............................................................................... 

if (isset($_GET['id']))
{ 

 $query = "SELECT * FROM Users WHERE id= '" . $_GET['id'] . "'";
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
<form action="admin_u_show.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" value="<?php echo $row['name'] ?>" /><br/>
     <label>Email : </label><br/><input type="email" name="email" value="<?php echo $row['email'] ?>" /><br/>
     <label>Is-Admin : </label><br/><input type="text" name="is_admin" value="<?php echo $row['is_admin'] ?>"/><br/>
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


 
