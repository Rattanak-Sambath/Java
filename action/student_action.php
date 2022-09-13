<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewStudent') {

  $name = $received_data->name;
  $phone = $received_data->phone;
  // $description = $received_data->description;
  $gender = $received_data->gender;
  $address = $received_data->address;
//   $created = $received_data->created;
//   $updated = $received_data->updated;
  // 
  // sql
  $sql = "insert into tbl_student (name, phone, address, gender) values('$name', '$phone', '$address', '$gender')";
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
      'name' => $name,
      'err' => $conn->error,

    );
  }

  // while ($row = $result->fetch_array()) {
  //   $data[] = $row;
  // }

  // echo
  echo json_encode($data);
}

if ($received_data->action == 'getAllStudent') {
  // sql
  $query = "select * from tbl_student ";
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
if ($received_data->action == 'deleteStudent') {
  // var_dump($received_data->id);
  $id = $received_data->id;
  $query = "DELETE FROM tbl_student WHERE id = $id ";
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
if ($received_data->action == 'getStudentbyId') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_student where id=$id limit 1";
  // execure query
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $person_data = mysqli_fetch_assoc($result);
    echo json_encode($person_data);
  } else {
    echo json_encode("no data");
  }
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