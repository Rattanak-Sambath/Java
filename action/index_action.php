<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
// get invoice by month and year
if ($received_data->action == 'getInvoice') {
  $month = $received_data->month;
  $year = $received_data->year;
  // sql
  $sql = "SELECT tbl_invoice.id, tbl_invoice.ele_old, tbl_invoice.ele_new, tbl_invoice.water_old, tbl_invoice.water_new,
  tbl_person.name, tbl_person.phone, tbl_person.latin,
  tbl_home.name as homeName
  FROM tbl_invoice
  INNER JOIN tbl_person
  ON tbl_person.id=tbl_invoice.person_id
  INNER JOIN tbl_home
  ON tbl_person.home_id=tbl_home.id
  WHERE tbl_invoice.month='$month' and tbl_invoice.year=$year";
  // 
  $result = mysqli_query($conn, $sql);
  // 
  while ($row = $result->fetch_array()) {
    $data[] = $row;
  }


  // return
  echo json_encode($data);
}
// get unit price
if ($received_data->action == 'getUnitPrice') {
  $month = $received_data->month;
  $year = $received_data->year;
  // sql
  $sql = "SELECT * FROM tbl_unit_price
  WHERE month='$month' AND year=$year limit 1";
  // 
  $result = mysqli_query($conn, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $unit_data = mysqli_fetch_assoc($result);
    echo json_encode($unit_data);
  } else {
    echo json_encode("no data");
  }


  // echo json_encode($unit_data);
}
