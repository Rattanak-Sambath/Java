<?php
session_start();
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include "../connection/db.php";// 
if ($received_data->action == 'login') {  
  // data member
  $email = $received_data->email;
  $password = $received_data->password;
  // sql statement
  $query = "
 SELECT * FROM tbl_userclient
 WHERE email='$email' limit 1";
  //  execute($query)
  $result = mysqli_query($conn, $query);
  if ($result) {
    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);
    
      if ($user_data['password'] === $password) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;       
        $_SESSION['id'] = $user_data['id'];
       
        $data = array(     
          'email' => $_SESSION['email'],
          'status' => 'login'
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
