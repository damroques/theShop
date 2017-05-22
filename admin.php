<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="admin.css">
	<meta charset="utf-8">
<!-- <link rel="stylesheet" href="integration.css"  /> -->
</head>
 <header>
      <Center><h1>Welcome to the Admin management page</h1></Center>
 </header>
<div class="galerie", id="vertical">
	<form action="admin.php" method="post">
	    <div class="boîte">
	    <a href="admin_u_create.php" >Create a client</a><br><br>
		<a href="admin_u_delete.php" >Delete a client</a><br><br>   
		<a href="admin_u_update.php" >Update a client</a><br><br>
		<a href="admin_u_show.php" >Show a client</a>
	    </div>
	    <div class="boîte">
	    <a href="admin_p_create.php" >Create a product</a><br><br>
		<a href="admin_p_delete.php" >Delete a product</a><br><br>   
		<a href="admin_p_update.php" >Update a product</a><br><br>
		<a href="admin_p_show.php" >Show a product</a>
		</div>
		<div class="boîte">
		<a href="admin_p_create_categories.php" >Create new Product Category</a>
	    </div>
	    <hr class="clear" />
	</form>
</div>
<body>
<title><?php echo "Hello " . $_SESSION['name'];?></title>
<footer>  
<div class="foot">
<center><p>Service technique - 06 77 77 77 77 - service_technique@yolo.fr</p></center>
</div>
</footer> 
</body>
</html>
