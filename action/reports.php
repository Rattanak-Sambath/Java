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
    $staff = $received_data->staff;
    $student = $received_data->student;
    $startDate = $received_data->startDate;
    $endDate = $received_data->endDate;
    // sql
    $query = "SELECT  A.image, A.title, B.staff ,  B.student, B.book, B.qty, B.startDate, B.end_date FROM  tbl_book A INNER JOIN tbl_lendBook B ON A.title = B.book  where B.startDate  between '$startDate' and '$endDate'";
    // execure query
    $result = mysqli_query($conn, $query);
  
    while ($row = $result->fetch_array()) {
      $data[] = $row;
      var_dump($row);
      $data = array(
        'status' => 'find',        
      );
    }
    
  
    echo json_encode($data);
  }

?>