<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 

if ($received_data->action == 'findBookReport') {
  $startDate = $received_data->startDate;
  $endDate = $received_data->endDate;
  $staff = $received_data->staff;
  $query = "select * from tbl_book where staff='$staff' and  date BETWEEN '$startDate' and '$endDate' "; 
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
if ($received_data->action == 'findBookLendReport') {
    
    $student = $received_data->student;
    $startDate = $received_data->startDate;
    $endDate = $received_data->endDate;
    // sql
    $query = "select from tbl_lendBook.* , tbl_book.image, tbl_book.title from tbl_lendBook inner join tbl_book on tbl_lendBook.book = tbl_book.title where tbl_book.student ='$student'";
    // execure query
    $result = mysqli_query($conn, $query);
  
    while ($row = $result->fetch_array()) {
      $data[] = $row;     
      $data = array(
        'status' => 'find',        
      );
    }
    
  
    echo json_encode($data);
  }

?>