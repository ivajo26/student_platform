<?php
require 'db_connection.php';

class WeeklyQuestions{
  var $Manger;
  var $db;
  function WeeklyQuestions() {
    $this->Manager= new DBManager();
    $this->db = $this->Manager->Conneted();
  }

  function allquestions(){
    $sql = $this->db->prepare("SELECT * FROM questions");
    $sql->execute();
    return $sql->fetchAll();
  }

  function allweeks(){
    $sql = $this->db->prepare("SELECT * FROM weeks");
    $sql->execute();
    return $sql->fetchAll();
  }

  function read_for_week($week_id){
    $sql = $this->db->prepare("SELECT weekend.id, question, answer_id, answers.id, answer FROM (SELECT * FROM weekly_questions WHERE week_id = ?) AS weekend INNER JOIN questions ON weekend.question_id = questions.id INNER JOIN answers ON questions.id = answers.question_id");
    $sql->bindParam(1, $week_id);
    $sql->execute();
    return $sql->fetchAll();
  }

  function addweek($start_date, $end_date){
    $sql = $this->db->prepare("INSERT INTO questions(question) VALUES (?)");
    $sql->bindParam(1, $start_date);
    $sql->bindParam(2, $end_date);
    $sql->execute();
  }

  function create_q($question, $answer1, $answer2, $answer3, $answer4, $correct){
    $sql = $this->db->prepare("INSERT INTO questions(question) VALUES (?)");
    $sql->bindParam(1, $question);
    $sql->execute();
    $Idq=$this->db->lastInsertId();
    $sql = $this->db->prepare("INSERT INTO answers(answer, question_id) VALUES (?,?)");
    $sql->bindParam(1, $answer1);
    $sql->bindParam(2, $Idq);
    $sql->execute();
    $a1=$this->db->lastInsertId();
    $sql = $this->db->prepare("INSERT INTO answers(answer, question_id) VALUES (?,?)");
    $sql->bindParam(1, $answer2);
    $sql->bindParam(2, $Idq);
    $sql->execute();
    $a2=$this->db->lastInsertId();
    $sql = $this->db->prepare("INSERT INTO answers(answer, question_id) VALUES (?,?)");
    $sql->bindParam(1, $answer3);
    $sql->bindParam(2, $Idq);
    $sql->execute();
    $a3=$this->db->lastInsertId();
    $sql = $this->db->prepare("INSERT INTO answers(answer, question_id) VALUES (?,?)");
    $sql->bindParam(1, $answer4);
    $sql->bindParam(2, $Idq);
    $sql->execute();
    $a4=$this->db->lastInsertId();
    switch ($correct) {
      case 1:
        $sql = $this->db->prepare("UPDATE questions SET answer_id = ? WHERE id = ?");
        $sql->bindParam(1, $a1);
        $sql->bindParam(2, $Idq);
        $sql->execute();
        break;
      case 2:
        $sql = $this->db->prepare("UPDATE questions SET answer_id = ? WHERE id = ?");
        $sql->bindParam(1, $a2);
        $sql->bindParam(2, $Idq);
        $sql->execute();
        break;
      case 3:
        $sql = $this->db->prepare("UPDATE questions SET answer_id = ? WHERE id = ?");
        $sql->bindParam(1, $a3);
        $sql->bindParam(2, $Idq);
        $sql->execute();
        break;
      case 4:
        $sql = $this->db->prepare("UPDATE questions SET answer_id = ? WHERE id = ?");
        $sql->bindParam(1, $a4);
        $sql->bindParam(2, $Idq);
        $sql->execute();
        break;
    }

  }
}
?>
