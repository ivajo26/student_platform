
<?php
$week_q = $_GET['week_q'];
$user = $_GET['user'];
$intents = $_GET['intents'];
require '../../models/user_answered.class.php';
$user_answered = new UserAnswered();
$json = $user_answered->save($week_q,$user, $intents);
?>
