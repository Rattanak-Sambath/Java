<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// get data
if ($received_data->action == 'getPerson') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_person where id=$id limit 1";
  // execure query
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $person_data = mysqli_fetch_assoc($result);
    echo json_encode($person_data);
  } else {
    echo json_encode("no data");
  }
}
// update data
if ($received_data->action == 'updatePerson') {
  $id = $received_data->id;
  $homeId = $received_data->homeId;
  $name = $received_data->name;
  $latin = $received_data->latin;
  $gender = $received_data->gender;
  $phone = $received_data->phone;
  $updated = $received_data->updated;
  // 
  $sql = "update tbl_person set home_id=$homeId,name='$name',latin='$latin',gender='$gender',phone='$phone',updated_at='$updated' where id=$id";
  // 
  $result = mysqli_query($conn, $sql);
  // 
  if ($result === true) {
    echo json_encode("updated");
  } else {
    echo json_encode("cannot update !");
  }
}
