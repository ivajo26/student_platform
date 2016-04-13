<?php
$username = $_GET['username'];
$password = $_GET['password'];
$json = [];
$json['user'] = $username;
$json['password'] =$password;
require '../../models/user.class.php';
$user= new User();
$json = $user->check($username,$password);
$newjson = [];
if (count($json) > 0) {
  foreach ($json as $row) {
    $newjson['status'] = true;
    $newjson['id'] = $row['id'];
    $newjson['username'] = $row['name'];
    $newjson['type'] = $row['type'];
  }
}else {
  $newjson['status'] = false;
}

echo json_encode($newjson);
// echo json_encode($json);
?>
