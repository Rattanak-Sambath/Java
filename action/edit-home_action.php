<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// get data
if ($received_data->action == 'getHome') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_home where id=$id limit 1";
  // execure query
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $home_data = mysqli_fetch_assoc($result);
    echo json_encode($home_data);
  } else {
    echo json_encode("no data");
  }
}
// update data
if ($received_data->action == 'updateHome') {
  $id = $received_data->id;
  $name = $received_data->name;
  $latin = $received_data->latin;
  $description = $received_data->description;
  $updated = $received_data->updated;
  // 
  $sql = "update tbl_home set name='$name',latin='$latin',description='$description',updated_at='$updated' where id=$id";
  // 
  $result = mysqli_query($conn, $sql);
  // 
  if ($result === true) {
    echo json_encode("updated");
  } else {
    echo json_encode("cannot update !");
  }
}
