
<?php
require '../../models/user_answered.class.php';
$user_answered = new UserAnswered();
$json = $user_answered->read_for_week(1);
$newjson = [];
foreach ($json as $row) {

  $newjson[$row['1']]['tried'] = $row['3'];
  $newjson[$row['1']]['correct_answers'] = $row['4'];
}
echo json_encode($newjson);
// echo json_encode($json);
?>
