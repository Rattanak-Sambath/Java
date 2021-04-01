<?php
$received_data = json_decode(file_get_contents("php://input"));
$data = array();
// connection
include '../connection/db.php';
// 
if ($received_data->action == 'addNewInvoice') {
  $personId = $received_data->personId;
  $month = $received_data->month;
  $year = $received_data->year;
  $eleOld = $received_data->eleOld;
  $eleNew = $received_data->eleNew;
  $waterOld = $received_data->waterOld;
  $waterNew = $received_data->waterNew;
  $created = $received_data->created;
  $updated = $received_data->updated;
  // 
  // sql
  $query = "insert into tbl_invoice(person_id,month,year,ele_old,ele_new,water_old,water_new,created_at,updated_at) 
  values($personId,'$month',$year,$eleOld,$eleNew,$waterOld,$waterNew,'$created','$updated')";
  // execure query
  $result = mysqli_query($conn, $query);

  if ($result === true) {
    $data = array(
      'status' => 'inserted',
    );
  } else {
    $data = array(
      'status' => 'cannot inserted',
      'err' => $conn->error,

    );
  }

  // echo
  echo json_encode($data);
}
// get person
if ($received_data->action == "getPerson") {
  // 
  $sql = "select * from tbl_person";
  // execure query
  $result = mysqli_query($conn, $sql);

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
// get person id in invoice
if ($received_data->action == "getIdPersonInInvoice") {
  $month = $received_data->month;
  $year = $received_data->year;
  // 
  $sql = "select * from tbl_invoice where year=$year and month='$month'";
  // execure query
  $result = mysqli_query($conn, $sql);

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
// get person filter not in in
if ($received_data->action == "getPersonFilterNotIn") {
  $objId = $received_data->objId;
  // sql
  // 
  if ($objId != "") {
    $sql = "select * from tbl_person where id not in ($objId)";
    $result = mysqli_query($conn, $sql);
    // 
    while ($row = $result->fetch_array()) {
      $data[] = $row;
    }
    // 
    echo json_encode($data);
  } else {
    $sql = "select * from tbl_person";
    $result = mysqli_query($conn, $sql);
    // 
    while ($row = $result->fetch_array()) {
      $data[] = $row;
    }
    // 
    echo json_encode($data);
  }
  // 

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
