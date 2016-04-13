<?php
require 'db_connection.php';

class User{
  var $Manger;
  var $db;
  function User() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function check($user, $password){
    $sql = $this->db->prepare("SELECT *  FROM users WHERE name = ? AND password = ?");
    $sql->bindParam(1, $user);
    $sql->bindParam(2, $password);
    $sql->execute();
    return $sql->fetchAll();
  }
}
?>
