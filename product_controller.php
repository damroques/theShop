<?php

include_once("db_connect.php");

class Product
{
protected $name;
protected $price;
protected $catId; 
private $query;
private $connect;


function register($name, $price, $catId)
{

try
{
$db = new Connection();

if ($db->getPDO() == FALSE) 
{
echo "Unexpected error occured. Please try again.";
return;
}
$connect = $db->getPDO();

$query = "INSERT INTO Products (name, price, category_id) VALUES ('$name', '$price', '$catId')";

$check = $connect->exec($query);
    if ($check == 0)
     throw new PDOException();
}

catch (PDOException $e) 
{
      echo "PDO ERROR: " . $e->getMessage();
}

echo "Your product has been saved.";
}



function __construct($name, $price, $catId)
{
$this->name = $name;
$this->price = $price;
$this->catId = $catId;

$this->register($name, $price, $catId);
}

function __destruct()
{
}

}
?>