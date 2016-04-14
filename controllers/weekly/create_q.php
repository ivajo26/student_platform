<?php
require '../../models/weekly_questions.class.php';
$question = $_GET['question'];
$answer1 = $_GET['answer1'];
$answer2 = $_GET['answer2'];
$answer3 = $_GET['answer3'];
$answer4 = $_GET['answer4'];
$correct = $_GET['correct'];
$weekly_questions = new WeeklyQuestions();
$json = $weekly_questions->create_q($question, $answer1, $answer2, $answer3, $answer4, $correct);


?>
