<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// update data invoice
if ($received_data->action == 'updateInvoice') {
  $id = $received_data->id;
  $eleOld = $received_data->eleOld;
  $eleNew = $received_data->eleNew;
  $waterOld = $received_data->waterOld;
  $waterNew = $received_data->waterNew;
  $updated = $received_data->updated;
  // 
  // sql
  $query = "update tbl_invoice set 
  ele_old = $eleOld, 
  ele_new = $eleNew,
  water_old = $waterOld,
  water_new = $waterNew,
  updated_at = '$updated' 
  where id = $id";
  // execure query
  $result = mysqli_query($conn, $query);

  if ($result === true) {
    echo json_encode("updated");
  } else {
    echo json_encode("cannot update !");
  }
}
// get invoice
if ($received_data->action == "getInvoice") {
  $id = $received_data->id;
  // 
  $sql = "select * 
  from tbl_invoice
  inner join tbl_person
  on tbl_invoice.person_id = tbl_person.id
  where tbl_invoice.id=$id";
  // execure query
  $result = mysqli_query($conn, $sql);
  if ($result && mysqli_num_rows($result) > 0) {
    $invoice_data = mysqli_fetch_assoc($result);
    echo json_encode($invoice_data);
  } else {
    echo json_encode("no data");
  }
}

// get some invoice for note and make new invoice
if ($received_data->action == "getSomeInvoices") {
  $id = $received_data->id;
  // sql
  $sql = "SELECT * FROM tbl_invoice
  WHERE person_id=$id 
  ORDER BY ele_new  DESC";
  // 
  $result = mysqli_query($conn, $sql);

  while ($row = $result->fetch_array()) {
    $data[] = $row;
  }

  echo json_encode($data);
}
