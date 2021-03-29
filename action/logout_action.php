<?php
session_start();
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// 
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
