
<?php
require '../../models/weekly_questions.class.php';
$weekly_questions = new WeeklyQuestions();
$json = $weekly_questions->allweeks();
// $newjson = [];
// foreach ($json as $row) {
//   $newjson[$row['0']]['id'] = $row['0'];
//   $newjson[$row['0']]['question'] = $row['question'];
//   $newjson[$row['0']]['answers'][$row['3']] = $row['4'];
//   $newjson[$row['0']]['correct'] = $row['2'];
//   $newjson[$row['0']]['select'] = '';
// }
// echo json_encode($newjson);
echo json_encode($json);
?>
