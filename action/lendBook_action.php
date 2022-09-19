<?php
$received_data = json_decode(file_get_contents("php://input"));

$data = array();
// connection
include '../connection/db.php';



if ($received_data->action == 'addLendBook') {

  $student = $received_data->student;
  $book = $received_data->book;
  $qty = $received_data->qty;
  $start_date = $received_data->start_date;
  $end_date = $received_data->end_date;
  

  
//   $created = $received_data->created;
//   $updated = $received_data->updated;

  // 
  // sql
  $sql = " insert into tbl_lendbook (student ,title,qty, start_date, end_date) values('$student','$book','$qty', '$start_date','$end_date')";
  // execure query
  $result = mysqli_query($conn, $sql);

  if ($result === true) {
    $data = array(
      'status' => 'insert',
      'name' => $name,
      
    );
  } else {
    $data = array(
      'status' => 'cannot inserted',
     
      'err' => $conn->error,

    );
  }

 

  echo json_encode($data);
}


if ($received_data->action == 'getAllLendBook') {
  // $query = "select * from tbl_lendbook ";
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

if ($received_data->action == 'deleteLendBook') {
    // var_dump($received_data->id);
    $id = $received_data->id;
    
    $query = "DELETE tbl_lendbook.* , tbl_book.* FROM  tbl_lendbook INNER JOIN  tbl_book ON tbl_book.id = tbl_lendbook.id WHERE tbl_book.id = $id";
    // execure query
    $result = mysqli_query($conn, $query);
  
    if($result === true){
      $data = array(
        'status' => 'delete',
        
      );
    }else {
      $data = array(
        'status' => 'cannot Delete',
    
      );
    }
    echo json_encode($data);
  }
  // get by id
if ($received_data->action == 'findLendBookById') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_lendbook where id=$id ";
  // execure query
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
    $data = $row;
    echo json_encode($data);
  } 
}

  
  