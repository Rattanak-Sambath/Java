    <?php
    $received_data = json_decode(file_get_contents("php://input"));
    $data = array();
    // connection
    include '../connection/db.php';
    // var_dump($received_data);
    if ($received_data->action == 'addtoclient') {
    
        $addtocarts = $received_data->addtocarts;  
        $payment = $received_data->payment;
        $user_name = $received_data->user_name;
        $phone = $received_data->phone;
        $status = $received_data->status; 
        $date = $received_data->date;
        $foreignkey = $received_data->foreignkey;
         $delivery="";
        $promote = ""; 
        foreach ($addtocarts as $addtocart)
        {       
            // find in stock 
            $findbookStock ="select * from tbl_book where id ='$addtocart->book_id'";
            $resultStock= mysqli_query($conn, $findbookStock);
            while ($row = $resultStock->fetch_array()) {
               $newStockQty= $row['qty'] - $addtocart->qty;
               $totalStock = " update tbl_book set qty='$newStockQty' where id = '$addtocart->book_id'";
               $resultTotalStock = mysqli_query($conn, $totalStock);
               
            }
          

           

            // find book if the same increase one value
            $secondsql= "select title from tbl_client where title = '$addtocart->title'";
            $result2 = mysqli_query($conn, $secondsql);
            
            if($result2 === true){
                $qty2 = $addtocart->qty + 1;
                $thirdsql = " update tbl_client set qty='$qty2' where title = '$addtocart->title'";
                $result3 = mysqli_query($conn, $thirdsql);
                if ($result3 === true) { 
                    $data = array(
                        'status' => 'insert',                       
                    );
                    } else {
                    $data = array(
                        'status' => 'err',
                       
                        'err' => $conn->error,
                
                    );
                    }

            }  
            else{  
                $total = $addtocart->qty * $addtocart->price;
                $sql = "insert into tbl_client(title,name, qty, price, payment, total, phone, status, date, foreignkey) values ('$addtocart->title', '$user_name', '$addtocart->qty', '$addtocart->price', '$payment', '$total', '$phone', '$status', '$date', '$foreignkey' )";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $removesql ="delete from tbl_addtocart where title='$addtocart->title' ";
                    $resultRemove = mysqli_query($conn, $removesql);

                    if($resultRemove){
                          if ($resultRemove === true) {

                              $data = array(
                                  'status' => 'insert',
                                  
                              );
                              } else {
                              $data = array(
                                  'status' => 'err',
                                
                                  'err' => $conn->error,
                          
                              );
                              }
                        }
                    else {
                      $data = array(
                        'status' => 'cantremove',
                        
                    );
                    }
                }
                else {
                  
                }
                
                
            }
                  
        }      
        echo json_encode($data);
    };

    if ($received_data->action == 'getClient') {
      
      $query = "select * from tbl_client group by foreignkey";
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

    
    if ($received_data->action == 'getAllClient') {
        $status = 'pending';
        $query = "select SUM(tbl_client.total) as total , tbl_client.name, tbl_client.phone, tbl_client.status, tbl_client.title, tbl_client.foreignkey, tbl_client.date  from tbl_client WHERE status='$status'  GROUP BY foreignkey";
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

      if ($received_data->action == 'getAllApprove') {
       
        $query = "select SUM(tbl_client.total) as total , tbl_client.name, tbl_client.phone, tbl_client.status, tbl_client.title from tbl_client   GROUP BY foreignkey ";
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

      
      if ($received_data->action == 'approvetoclient') {
        $status = $received_data->status;
        $id = $received_data->id;
        $query = "update tbl_client set status='$status' where foreignkey= $id  ";
        $result = mysqli_query($conn, $query);
      
        if($result === true){
        $data = array(
          'status' => 'update',
          
        );
        
      }
        echo json_encode($data);
      }
      if ($received_data->action == 'declinetoclient') {
        $status = $received_data->status;
        $id = $received_data->id;
        $query = "update tbl_client set status='$status' where foreignkey= $id  ";
        $result = mysqli_query($conn, $query);
      
        if($result === true){
        $data = array(
          'status' => 'decline',
          
        );
        
      }
        echo json_encode($data);
      }
      if ($received_data->action == 'getdetailbyid') {
        $id = $received_data->id;
        $query = "select SUM(tbl_client.price) as total, SUM(tbl_client.qty) as qty, tbl_client.title, tbl_client.phone,  tbl_client.status ,  tbl_client.name from tbl_client where foreignkey=$id group by title";
        $result = mysqli_query($conn, $query);      
        while ($row = $result->fetch_array()) {
          $data[] = $row;
          // $data = array(
          //   'status' => 'find',

          // );
        } 
       
        echo json_encode($data);
      };
  
      
      
      

    ?>