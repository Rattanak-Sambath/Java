<?php
session_start();
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// 
if ($received_data->action == 'test_session') {
  $_SESSION['test_session'] = 'sophea';
  $uid = uniqid();
  $data = array(
    'status' => $_SESSION['test_session'],
    'uid' => $uid
  );
  // echo
  echo json_encode($data);
}
// logout
if ($received_data->action == 'logout') {
  session_destroy();
  // logout
  $data = array(
    'status' => 'logout'
  );
  // return
  echo json_encode($data);
}
