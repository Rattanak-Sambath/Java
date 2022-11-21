<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';

if ($received_data->action == 'add') {
  
  $email = $received_data->email;
  $phone = $received_data->phone;
  $password = $received_data->password;
  // $description = $received_data->description;
  $gender = $received_data->gender;
  $address = $received_data->address;
  $date = $received_data->date;

  $firstsql = "select * from tbl_userclient where email ='$email'";
  $firstresult = mysqli_query($conn, $firstsql);

  if($firstresult->num_rows > 0){
    $data = array(
      'status' => 'dublicate',    
      'err' => $conn->error,
    );
  }
  else {
     $sql = "insert into tbl_userclient (email, password, phone, address, gender, date) values('$email','$password', '$phone', '$address', '$gender', '$date')";
    // execure query
    $result = mysqli_query($conn, $sql);
  
    if ($result === true) {
      $data = array(
        'status' => 'insert',
        'name' => $name,
      );
    } 
  }
 

  // while ($row = $result->fetch_array()) {
  //   $data[] = $row;
  // }

  // echo
  echo json_encode($data);
}


?>