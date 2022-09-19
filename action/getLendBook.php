<?php
$received_data = json_decode(file_get_contents("php://input"));

$data = array();
// connection
include '../connection/db.php';





if ($received_data->action == 'getAllLendBook') {
//   $query = "select * from tbl_lendbook ";
  $query = "select tbl_lendbook.student, tbl_lendbook.title, tbl_lendbook.qty, tbl_lendbook.start_date, tbl_lendbook.end_date, tbl_book.image from tbl_lendbook  inner join tbl_book on tbl_lendbook.title = tbl_book.title";
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