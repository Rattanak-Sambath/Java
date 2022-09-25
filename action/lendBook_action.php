<?php
$received_data = json_decode(file_get_contents("php://input"));

$data = array();
// connection
include '../connection/db.php';



if ($received_data->action == 'addLendBook') {
  $staff = $received_data->staff;

  $student = $received_data->student;
  $book = $received_data->book;
  $qty = $received_data->qty;
  $startDate = $received_data->startDate;
  $end_date = $received_data->end_date;
  $status = $received_data->status;


  
//   $created = $received_data->created;
//   $updated = $received_data->updated;

  // 
  // sql
  $sql = " insert into tbl_lendBook (staff,student ,book,qty, startDate, end_date) values('$staff','$student','$book','$qty', '$startDate','$end_date')";
  $result = mysqli_query($conn, $sql);
 
  if ($result === true ) {
          $secondSql = "insert into  tbl_inventory (staff,student ,book,qty, startDate, end_date, status) values('$staff','$student','$book','$qty', '$startDate','$end_date', '$status')";
          $secondResult = mysqli_query($conn, $secondSql);
          if($secondResult ===true){
            $data = array(
              'status' => 'insert',  
            );
          }

      
  } else {
    $data = array(
      'status' => 'cannot inserted',
  
    );
  }

 

  echo json_encode($data);
}


if ($received_data->action == 'getAllLendBook') {
  $query = "select tbl_lendBook.* , tbl_book.image from tbl_lendBook inner join tbl_book on tbl_lendBook.book = tbl_book.title";
  // $query = "select tbl_lendBook.student, tbl_lendBook.book, tbl_lendBook.qty, tbl_lendBook.start_date, tbl_lendBook.end_date, tbl_book.image from tbl_lendBook  inner join tbl_book on tbl_lendBook.title = tbl_book.title";
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
    $query = "delete from tbl_lendBook where id = $id";
    // $query = "DELETE tbl_lendbook.* , tbl_book.* FROM  tbl_lendbook INNER JOIN  tbl_book ON tbl_book.id = tbl_lendbook.id WHERE tbl_book.id = $id";
    // execure query
    $result = mysqli_query($conn, $query);
  
    if($result === true){
      $data = array(
        'status' => 'delete',
        
      );
    }else {
      $data = array(
        'status' => 'cannot Delete' + $id ,
    
      );
    }
    echo json_encode($data);
  }
  // get by id
if ($received_data->action == 'findLendBookById') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_lendBook where id=$id ";
  // execure query
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
    $data = $row;
    echo json_encode($data);
  } 
}
if ($received_data->action == 'updateLendBook') {
  $id = $received_data->id;
  $staff = $received_data->staff;
  
  $student = $received_data->student;
  $book = $received_data->book;
  $qty = $received_data->qty;
  $startDate = $received_data->startDate;
  $end_date = $received_data->end_date;

  $sql = "update tbl_lendBook set staff='$staff', student='$student',book='$book',qty='$qty',startDate='$startDate',end_date ='$end_date' where id=$id";
  // 
  $result = mysqli_query($conn, $sql);
  // u

    if($result === true){
      $data = array(
        'status' => 'update',
        
      );
    }else {
      $data = array(
        'status' => 'cannot Update',
    
      );
    }
    echo json_encode($data);
  } 

  
  