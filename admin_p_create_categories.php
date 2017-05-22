<?php
include_once("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="admin.css">
</head>
 <header>
      <Center><h1>Create new product categories</h1></Center>
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
function getAllCategories($test)
{
  $query = "SELECT * FROM Category ORDER BY parent_id;";

try{
  $PDO_query = $test->query($query);

  $table = $PDO_query->fetchall();  

if (count($table) == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      echo "PDO_query ERROR: " . $e->getMessage() . "\n";
    }
return $table;
}

//...............................................................................

function print_categories(&$list, $parent_id = 0)
{
    $flag = false;
    for( $i=0, $c = count($list); $i<$c ;$i++ )
    {
        if( $list[$i]['parent_id'] == $parent_id )
        {
            if( $flag == false )
            {
                echo '<ul>';
                $flag = true;
            }
           echo "<li><a href='admin_p_create_categories.php?id=" . $list[$i]['id'] . "'>" . $list[$i]['name'] . "</a></li>";
             if ($list[$i]['childs'])
                print_categories($list[$i]['childs'], $list[$i]['id']);
        }
    }
    if( $flag)
    {
        echo '</ul>';
    }

}

//...............................................................................

function make_categories(&$list,$parent_id = 0)
{
    $result = array();
    for( $i=0,$c=count($list);$i<$c;$i++ )
    {
        if( $list[$i]['parent_id'] == $parent_id )
        {
            $list[$i]['childs'] = make_categories($list, $list[$i]['id']);
            $result[] = $list[$i];
        }
    }
    return $result;
}
//..........................................................................................................

$list = array();
$list = getAllCategories($test);
$result = array();
$result = make_categories($list);
echo '<pre>';
print_categories($result);
echo '</pre>';

//..........................................................................................................

if (isset($_POST['subBtn']))
{
$name = $_POST['name'];
$parent_id = $_POST['parent_id'];

$query = "INSERT INTO Category (name, parent_id) VALUES ('$name', '$parent_id')";
try{
  $PDO_query = $test->exec($query);

if ($PDO_query == 0)
     throw new PDOException();
}
catch (PDOException $e) {
      echo "PDO_query ERROR: " . $e->getMessage() . "\n";
    }

header('Location: admin_p_create_categories.php');
exit();
}
?>

<?php if (isset($_GET['id'])): ?>
   <form action="admin_p_create_categories.php" method="post">
     <label>Name : </label><br/><input type="text" name="name" required/><br/>
     <label>Parent Id : </label><br/><input type="text" name="parent_id" value="<?php echo $_GET['id'] ?>" required/><br/>
     <br/>
     <input type="submit" value="Submit" name="subBtn" >
     <input type="reset">
   </form>
 <?php endif; ?>
<!--  <footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer>  -->
</body>
</html>