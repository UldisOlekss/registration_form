<?php
// Basic database connection
class Database {

  public $connection;

  private $dbName = 'localdb';
  private $dbHost = 'localhost';
  private $dbUsername = 'root';
  private $dbUserPassword = '';

  public function __construct() 
  {
    $this->connection = new PDO('mysql:host='.$this->dbHost.';'.'dbname='.$this->dbName, $this->dbUsername, $this->dbUserPassword);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getRecords() 
  {
    $sql = 'SELECT name, phone, address, message FROM localdata ORDER BY id DESC';
    
    return $this
      ->connection
      ->query($sql)
      ->fetchAll(PDO::FETCH_ASSOC);
  }

  public function setRecord($name, $phone, $address, $message) 
  {
    $sql = "INSERT INTO localdata (name, phone, address, message) values (?, ?, ?, ?)";
    $q = $this->connection->prepare($sql);
    $q->execute(array($name, $phone, $address, $message));
  }

  public function setNewUser($email, $password) 
  {
    $userID = 0;
    $sql = "INSERT INTO user_reg (email, password, userID) values (?, ?, ?)";
    $q = $this->connection->prepare($sql);
    $q->execute(array($email, $password, $userID));
  }
}
