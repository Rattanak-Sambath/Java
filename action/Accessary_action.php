<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewAccessary') {

  $name = $received_data->name;
  $type = $received_data->type;
  // $description = $received_data->description;
  $price = $received_data->price;
  $qty = $received_data->qty;
  $date = $received_data->date;
  $category = $received_data->category;
  $donate = $received_data->donate;
//   $created = $received_data->created;
//   $updated = $received_data->updated;
  // 
  // sql
  $sql = "insert into tbl_accessary (name, price, qty, type, date, category, donate) values('$name', '$price', '$qty', '$type', '$date', '$category', '$donate')";
  // execure query
  $result = mysqli_query($conn, $sql);

  if ($result === true) {
    $data = array(
      'status' => 'inserted',
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

if ($received_data->action == 'getAllAccessary') {
  // sql
  $query = "select *  from tbl_accessary";
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
if ($received_data->action == 'deleteStaff') {
  // var_dump($received_data->id);
  $id = $received_data->id;
  $query = "DELETE FROM tbl_staff WHERE id = $id ";
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
if ($received_data->action == 'getStaffbyId') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_staff where id=$id limit 1";
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
if ($received_data->action == 'updateStaff') {
  $id = $received_data->id;
  $name = $received_data->name;
  $phone = $received_data->phone;
  $gender = $received_data->gender;
  $address = $received_data->address;
 
  // 
  $sql = "update tbl_staff set name='$name',phone='$phone',gender='$gender',address='$address' where id=$id";
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