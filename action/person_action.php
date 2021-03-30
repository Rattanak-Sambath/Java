<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'getTblPerson') {
  // sql
  $query = "select tbl_person.id, tbl_person.name, tbl_person.latin, tbl_person.gender, tbl_person.phone,
  tbl_home.name as homeName 
  from tbl_person 
  INNER JOIN tbl_home
  ON tbl_person.home_id=tbl_home.id;";
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
