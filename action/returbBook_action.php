<?php
$received_data = json_decode(file_get_contents("php://input"));

$data = array();
// connection
include '../connection/db.php';



if ($received_data->action == 'addreturnBook') {
  $staff = $received_data->staff; 
  $student = $received_data->student;
  $book = $received_data->book;
  $qty = $received_data->qty;
  $startDate = $received_data->startDate;
 
  $status = $received_data->status;
  $foreignkey = $received_data->foreignkey * -1;
  $user = $received_data->user;


  
//   $created = $received_data->created;
//   $updated = $received_data->updated;

  // 
  // sql
  $sql = " insert into tbl_returnbook (staff,student ,book,qty, startDate,user, foreignkey) values('$staff','$student','$book','$qty', '$startDate','$user', '$foreignkey')";
  $result = mysqli_multi_query($conn, $sql);
 
  if ($result === true ) {
          $secondSql = "insert into  tbl_inventory (staff,student ,book,qty, startDate, status,user, foreignkey) values('$staff','$student','$book','$qty', '$startDate', '$status','$user', '$foreignkey')";
          $secondResult = mysqli_multi_query($conn, $secondSql);
          if($secondResult === true){
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


if ($received_data->action == 'getAllreturnBook') {
  $query = "select tbl_returnbook.* , tbl_book.image, tbl_book.title from tbl_returnbook inner join tbl_book on tbl_returnbook.book = tbl_book.title";
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

if ($received_data->action == 'deletereturnBook') {
    // var_dump($received_data->id);
    $id = $received_data->id;
    $query = "delete from tbl_returnbook where foreignkey = $id";
   
    $result = mysqli_query($conn, $query);
  
    if($result === true){
      $query2 = "delete from tbl_inventory where foreignkey = $id";
      $result2 = mysqli_query($conn, $query2);
      if($result2 === true){
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
}
  // get by id
if ($received_data->action == 'findreturnBookById') {
  $id = $received_data->id;
  $status = $received_data->status;
  // sql
  $query = "select * from tbl_inventory where foreignkey=$id  ";
  // execure query
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_array($result)) {
    $data = $row;
    echo json_encode($data);
  } 
}
if ($received_data->action == 'updatereturnBook') {
  $id = $received_data->id;
  $staff = $received_data->staff; 
  $student = $received_data->student;
  $book = $received_data->book;
  $qty = $received_data->qty;
  $startDate = $received_data->startDate;



  $sql = "update tbl_returnbook set staff='$staff', student='$student',book='$book',qty='$qty',startDate='$startDate' where foreignkey=$id";
  // 
  $result = mysqli_multi_query($conn, $sql);
  // u

    if($result === true){
      $sql2 = "update tbl_inventory set staff='$staff', student='$student',book='$book',qty='$qty',startDate='$startDate' where foreignkey=$id";     // 
      $result2 = mysqli_multi_query($conn, $sql2);
      if($result2 === true){
        $data = array(
          'status' => 'update',
          
        );
      }
     
    }else {
      $data = array(
        'status' => 'cannot Update',
    
      );
    }
    echo json_encode($data);
  } 

  
  