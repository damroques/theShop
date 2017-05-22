<?php

include_once("db_connect.php");


class Login
{
protected $email;
protected $passwd; 
private $query;
private $connect;

function login($email, $passwd)
{

$db = new Connection();

if ($db->getPDO() == FALSE) 
{
echo "Unexpected error occured. Please try again.";
return;
}
$connect = $db->getPDO();

$query = "SELECT * FROM Users where email='" . $email . "'";

$result = $connect->query($query);

$row = $result->fetch(); 

if ( count($row) > 0 && password_verify($passwd, $row['password']))
{
$_SESSION['name'] = $row['name'];
$_SESSION['email'] = $row['email'];
$_SESSION['login'] = true;
header('Location: index.php');
exit();
}
}

function __construct($email, $passwd)
{
session_start();
$this->email = $email;
$this->passwd = $passwd;
$_SESSION['login'] = false;
$this->login($email, $passwd);
}


function __destruct()
{
}

}

?>