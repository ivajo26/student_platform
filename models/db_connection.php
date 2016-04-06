<?php
class DBManager{
  var $type_db;
  var $user_db;
  var $password_db;
  var $name_db;
  var $host_db;
  var $Connet;

  function DBManager(){
    require 'config.php';
    $this->type_db = $type_db;
    $this->user_db = $user_db;
    $this->password_db = $password_db;
    $this->name_db = $name_db;
    $this->host_db = $host_db;
  }

  function Conneted(){
    $this->Connet = new PDO($this->type_db.':host='.$this->host_db.';dbname='.$this->name_db, $this->user_db, $this->password_db);
    $this->Connet->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $this->Connet;
  }
}

?>
