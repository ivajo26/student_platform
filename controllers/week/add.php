<?php
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
require '../../models/weekly_questions.class.php';
$user_answered = new WeeklyQuestions();
$json = $user_answered->addweek($start_date, $end_date);
?>
