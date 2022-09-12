<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewStaff') {

  $name = $received_data->name;
  $phone = $received_data->phone;
  // $description = $received_data->description;
  $gender = $received_data->gender;
  $address = $received_data->address;
//   $created = $received_data->created;
//   $updated = $received_data->updated;
  // 
  // sql
  $sql = "insert into tbl_staff (name, phone, address, gender) values('$name', '$phone', '$address', '$gender')";
  // execure query
  $result = mysqli_query($conn, $sql);

  if ($result === true) {
    $data = array(
      'status' => 'inserted',
      'name' => $name,
    );
  } else {
    $data = array(
      'status' => 'cannot inserted',
      'name' => $name,
      'err' => $conn->error,

    );
  }

  // while ($row = $result->fetch_array()) {
  //   $data[] = $row;
  // }

  // echo
  echo json_encode($data);
}

if ($received_data->action == 'getTblPerson') {
  // sql
  $query = "select * from tbl_staff";
  // execure query
  $result = mysqli_query($conn, $query);

  while ($row = $result->fetch_array()) {
    $data[] = $row;
  }
  // $data = array(
  //   'status' => 'Hi',
  //   'name' => $row[0]['name'],
  // );
  // echo
  echo json_encode($data);
}
if ($received_data->action == 'deleteStaff') {
  // var_dump($received_data->id);
  $id = $received_data->id;
  $query = "DELETE FROM tbl_staff WHERE id = $id ";
  // execure query
  $result = mysqli_query($conn, $query);

  if($result === true){
    $data = array(
      'status' => 'delete',
      
    );
  }else {
    $data = array(
      'status' => 'cannot Delete',
  
    );
  }
  echo json_encode($data);
}