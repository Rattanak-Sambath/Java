<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
$datas = array();
if ($received_data->action == 'addtocart') {

    $book_id = $received_data->book_id;
    $title = $received_data->title;   
    $qty = $received_data->qty;

    $findbookStock ="select * from tbl_book where id ='$book_id'";
    $resultStock= mysqli_query($conn, $findbookStock);
    // if($resultStocK->num_rows->$qty < 0){
    //   $data = array(
    //     'status' => 'noinstock',      
    //   );
    // }
    // else {
      $secondsql = "select * from tbl_addtocart where book_id = $book_id ";
    $secondResult = mysqli_query($conn, $secondsql);
    if($secondResult->num_rows > 0){
      // $secondResult->
        $qty = $secondResult->fetch_object()->qty + 1;
      
        $thirdsql = "update tbl_addtocart set qty ='$qty' where book_id = '$book_id'" ;
        $thirdResult = mysqli_query($conn, $thirdsql);
        if ($thirdResult === true) {
          $data = array(
            'status' => 'increase',
            
          );
        }
     }
    else {
      $sql = "insert into tbl_addtocart(book_id, title, qty) values ('$book_id', '$title', '$qty')";
      // execure query
      $result = mysqli_query($conn, $sql);
    
      if ($result === true) {
        $data = array(
          'status' => 'insert',
          // 'name' => $name,
        );
      } else {
        $data = array(
          'status' => 'inserted',
          // 'name' => $name,
          'err' => $conn->error,
    
        );
      }
    // }
    
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
      
  };
  if ($received_data->action == 'getAllBook') {

   
    // sql
    $query = "  select tbl_addtocart.* , tbl_book.image,  tbl_book.price, tbl_book.title from tbl_addtocart inner join tbl_book on tbl_addtocart.title = tbl_book.title";
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
  
};
if ($received_data->action == 'deleteBook') {
  // var_dump($received_data->id);
  $id = $received_data->id;
  $query = "DELETE FROM tbl_addtocart WHERE id = $id ";
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
  



?>