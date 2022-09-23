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
// if ($received_data->action == 'findBookReport') {
//     $staff = $received_data->staff;
 
//     // $startDate = $received_data->startDate;
//     // $endDate = $received_data->endDate;
//     // sql
//     $query = "select * from tbl_book ";
//     // execure query
//     $result = mysqli_query($conn, $query);
  
//     if($result === true){
//         $data = array(
//           'status' => 'find',        
//         );
//       }else {
//         $data = array(
//           'status' => 'cannot find report',
      
//         );
//       }
  
//     echo json_encode($data);
//   }
// 
?>