<?php
require 'db_connection.php';

class WeeklyQuestions{
  var $Manger;
  var $db;
  function WeeklyQuestions() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function read_for_week($week_id){
    $sql = $this->db->prepare("SELECT weekend.id, question, answer_id, answers.id, answer FROM (SELECT * FROM weekly_questions WHERE week_id = ?) AS weekend INNER JOIN questions ON weekend.question_id = questions.id INNER JOIN answers ON questions.id = answers.question_id");
    $sql->bindParam(1, $week_id);
    $sql->execute();
    return $sql->fetchAll();
  }
}
?>
