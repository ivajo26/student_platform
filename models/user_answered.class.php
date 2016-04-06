<?php
require 'db_connection.php';

class UserAnswered{
  var $Manger;
  var $db;
  function UserAnswered() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function read_for_week($weekly_questions_id, $user_id){
    $sql = $this->db->prepare("SELECT * FROM user_answered WHERE weekly_questions_id = ? AND user_id = ?");
    $sql->bindParam(1, $weekly_questions_id);
    $sql->bindParam(2, $user_id);
    $sql->execute();
    return $sql->fetchAll();
  }
}
?>
