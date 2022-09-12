<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewHome') {
  $name = $received_data->name;
  $latin = $received_data->latin;
  $description = $received_data->description;
  $created = $received_data->created;
  $updated = $received_data->updated;
  // 
  // sql
  $query = "insert into tbl_home(name,latin,description,created_at,updated_at) 
  values('$name','$latin','$description','$created','$updated')";
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

  // while ($row = $result->fetch_array()) {
  //   $data[] = $row;
  // }

  // echo
  echo json_encode($data);
}