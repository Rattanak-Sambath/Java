<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// get data
if ($received_data->action == 'getUnitPrice') {
  $id = $received_data->id;
  // 
  // sql
  $query = "select * from tbl_unit_price where id=$id limit 1";
  // execure query
  $result = mysqli_query($conn, $query);
  if ($result && mysqli_num_rows($result) > 0) {
    $unit_price_data = mysqli_fetch_assoc($result);
    echo json_encode($unit_price_data);
  } else {
    echo json_encode("no data");
  }
}
// update data
if ($received_data->action == 'updateUnitPrice') {
  $id = $received_data->id;
  $ele = $received_data->ele;
  $water = $received_data->water;
  $updated = $received_data->updated;
  // 
  $sql = "update tbl_unit_price set ele=$ele,water=$water,updated_at='$updated' where id=$id";
  // 
  $result = mysqli_query($conn, $sql);
  // 
  if ($result === true) {
    echo json_encode("updated");
  } else {
    echo json_encode("cannot update !");
  }
}
