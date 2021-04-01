<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'getTblHome') {
  // sql
  $query = "select * from tbl_home ORDER BY latin ASC";
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
