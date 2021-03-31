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
  $sql = "select * from tbl_invoice where month='$month' and year=$year";
  // 
  $result = mysqli_query($conn, $sql);
  // 
  while ($row = $result->fetch_array()) {
    $data[] = $row;
  }


  // return
  echo json_encode($data);
}
