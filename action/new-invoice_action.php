<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewPerson') {
  $homeId = $received_data->homeId;
  $name = $received_data->name;
  $latin = $received_data->latin;
  $gender = $received_data->gender;
  $phone = $received_data->phone;
  $created = $received_data->created;
  $updated = $received_data->updated;
  // 
  // sql
  $query = "insert into tbl_person(home_id,name,latin,gender,phone,created_at,updated_at) 
  values($homeId,'$name','$latin','$gender','$phone','$created','$updated')";
  // execure query
  $result = mysqli_query($conn, $query);

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

  // echo
  echo json_encode($data);
}
// get person
if ($received_data->action == "getPerson") {
  // 
  $sql = "select * from tbl_person";
  // execure query
  $result = mysqli_query($conn, $sql);

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
// get person id in invoice
if ($received_data->action == "getIdPersonInInvoice") {
  $month = $received_data->month;
  $year = $received_data->year;
  // 
  $sql = "select * from tbl_invoice where year=$year and month='$month'";
  // execure query
  $result = mysqli_query($conn, $sql);

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
