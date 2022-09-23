<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// // 
// if ($received_data->action == 'bookAdd') {
//     header('Access-Control-Allow-Origin: *');  
//     $filename = $_FILES['file']['name'];
//     $allowed_extensions = array('jpg','jpeg','png','pdf');
//     $title = $received_data->title;
//   $qty = $received_data->qty;
//   // $description = $received_data->description;
//   $type = $received_data->type;
//   $date = $received_data->date;
// //   $created = $received_data->created;
// //   $updated = $received_data->updated;
//   // 
//      $extension = pathinfo($filename, PATHINFO_EXTENSION);
//       if(in_array(strtolower($extension),$allowed_extensions) ) {     
//          if(move_uploaded_file($_FILES['file']['tmp_name'], "upload/".$filename)){
//             $sql = "insert into tbl_book (title, qty, date, type, image) values('$title', '$qty', '$date', '$type', '$filename')";
//             // execure query
//             $result = mysqli_query($conn, $sql);
          
//             if ($result === true) {
//               $data = array(
//                 'status' => 'insert',
//                 'name' => $name,
//               );
//             } else {
//               $data = array(
//                 'status' => 'cannot inserted',
//                 'name' => $name,
//                 'err' => $conn->error,
          
//               );
//             }
          
//             // while ($row = $result->fetch_array()) {
//             //   $data[] = $row;
//             // }
          
//             // echo
//             echo json_encode($data);
//          }else{
//              echo 0;
//          }
//    }else{
//        echo 0;
//    } 
  
//   // sql
 
// }

if ($received_data->action == 'getAllBook') {
  // sql
  $query = "select * from tbl_book ";
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
if ($received_data->action == 'deleteBook') {
  // var_dump($received_data->id);
  $id = $received_data->id;
  $query = "DELETE FROM tbl_book WHERE id = $id ";
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
if ($received_data->action == 'getDataById') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_book where id=$id limit 1";
  // execure query
 
  $result = mysqli_query($conn, $query);

  while ($row = $result->fetch_array()) {
    $data[] = $row;
  }
  echo json_encode($data);
  //
}

// update staff 
if ($received_data->action == 'updateStudent') {
  $id = $received_data->id;
  $name = $received_data->name;
  $phone = $received_data->phone;
  $gender = $received_data->gender;
  $address = $received_data->address;
 
  // 
  $sql = "update tbl_student set name='$name',phone='$phone',gender='$gender',address='$address' where id=$id";
  // 
  $result = mysqli_query($conn, $sql);
  // 

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