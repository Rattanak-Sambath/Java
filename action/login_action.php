<?php
session_start();
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'login') {
  // data member
  $username = $received_data->username;
  $password = $received_data->password;
  // sql statement
  $query = "
 SELECT * FROM tbl_user
 WHERE username='$username' limit 1";
  //  execute($query)
  $result = mysqli_query($conn, $query);
  if ($result) {
    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);
      // return $user_data;
      if ($user_data['password'] === $password) {
        $_SESSION['username'] = $username;
        $_SESSION['uid'] = $user_data['uid'];
        $data = array(
          'username' => $user_data['username'],
          'password' => $user_data['password'],
          'uid' => $user_data['uid'],
          'status' => 'login_success'
        );
      } else {
        $data = array(
          'status' => 'Wrong Password'
        );
      }
    } else {
      $data = array(
        'status' => 'User not found'
      );
    }
  } else {
    $data = array(
      'status' => 'User not found'
    );
  }
  // echo
  echo json_encode($data);
}
