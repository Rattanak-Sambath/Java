<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewUnitPrice') {
  $year = $received_data->year;
  $month = $received_data->month;
  $month_year = $received_data->month_year;
  $ele = $received_data->ele;
  $water = $received_data->water;
  $created = $received_data->created;
  $updated = $received_data->updated;
  // 
  // sql
  $query = "insert into tbl_unit_price(year,month,month_year,ele,water,created_at,updated_at) 
  values($year,'$month','$month_year',$ele,$water,'$created','$updated')";
  // execure query
  $result = mysqli_query($conn, $query);

  if ($result === true) {
    $data = array(
      'status' => 'inserted',

    );
  } else {
    $data = array(
      'status' => 'cannot inserted',
      'err' => $conn->error,

    );
  }

  // echo
  echo json_encode($data);
}
