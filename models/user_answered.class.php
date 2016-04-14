<?php
require 'db_connection.php';

class UserAnswered{
  var $Manger;
  var $db;
  function UserAnswered() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function read_for_week($user_id){
    $sql = $this->db->prepare("SELECT * FROM user_answered WHERE user_id = ?");
    $sql->bindParam(1, $user_id);
    $sql->execute();
    return $sql->fetchAll();
  }

  function save($week_q,$user, $intents){
    $sql = $this->db->prepare("INSERT INTO user_answered (weekly_questions_id, user_id, tried, correct_answers) VALUES (?, ?, ?, '1')");
    $sql->bindParam(1, $week_q);
    $sql->bindParam(2, $user);
    $sql->bindParam(3, $intents);
    $sql->execute();
    // return $sql->fetchAll();
  }
}
?>
