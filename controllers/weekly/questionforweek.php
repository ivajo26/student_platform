
<?php
$week = $_GET['week'];
require '../../models/weekly_questions.class.php';
$weekly_questions = new WeeklyQuestions();
$json = $weekly_questions->questionforweek($week);
echo json_encode($json);
?>
