<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';

if ($received_data->action == 'addtocart') {

    $book_id = $received_data->book_id;
    $title = $received_data->title;
    $qty = $received_data->qty;
    // sql
    var_dump($book_id);
        $sql = "insert into tbl_addtocart(book_id, title, qty) values ('$book_id', '$title', '$qty')";
    // execure query
    $result = mysqli_query($conn, $sql);
  
    if ($result === true) {
      $data = array(
        'status' => 'insert',
        'name' => $name,
      );
    } else {
      $data = array(
        'status' => 'inserted',
        'name' => $name,
        'err' => $conn->error,
  
      );
    }
  
    // while ($row = $result->fetch_array()) {
    //   $data[] = $row;
    // }
  
    // echo
    echo json_encode($data);
  };
  if ($received_data->action == 'getAllcart') {

   
        // sql
        $query = "select * from  tbl_addtocart ";
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




?>