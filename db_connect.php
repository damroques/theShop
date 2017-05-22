<?php
class Connection
{

private $PDO_user;


function getPDO()
{

  return $this->PDO_user;
}

function connect_db($host, $username, $passwd, $port, $db)
  {

    $dsn = "mysql:host=" . $host . ';port=' . $port . ';dbname=' . $db;

    try {
      $dbh = new PDO($dsn, $username, $passwd);
      return $dbh;

    } catch (PDOException $e) {
      echo "PDO ERROR: " . $e->getMessage();
    }
  }

function __construct()
{
$this->PDO_user = $this->connect_db("localhost", "root", "toto2", "3306", "my_shop");
}


function __destruct()
{
}

}
?>
