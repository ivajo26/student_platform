<?php
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];
require '../../models/user_answered.class.php';
$user_answered = new UserAnswered();
$json = $user_answered->addweek($start_date, $end_date);
?>
