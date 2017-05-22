<?php

include_once("db_connect.php");

class User
{
protected $name;
protected $email;
protected $passwd; 
private $query;
private $connect;


function register($name, $email, $passwd, $isAdmin)
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

$query = "INSERT INTO Users (name, email, password, is_admin) VALUES ('$name', '$email', '$passwd', '$isAdmin')";

$check = $connect->exec($query);
    if ($check == 0)
     throw new PDOException();
}

catch (PDOException $e) 
{
      echo "PDO ERROR: " . $e->getMessage();
}

echo "Your profile has been saved.";
}



function __construct($name, $email, $passwd, $isAdmin = 0)
{
$this->name = $name;
$this->email = $email;
$this->passwd = $passwd;

$this->register($name, $email, $passwd, $isAdmin);
}


function __destruct()
{
}

}
?>