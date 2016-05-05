<?php
$question_id = $_GET['question_id'];
$week_id = $_GET['week_id'];
require '../../models/weekly_questions.class.php';
$user_answered = new WeeklyQuestions();
$json = $user_answered->addwq($question_id, $week_id);
?>
