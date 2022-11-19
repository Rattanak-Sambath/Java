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
       
        $delivery="";
        $promote = "";
        // print_r($addtocarts);  
        foreach ($addtocarts as $addtocart)
        {       

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
                $sql = "insert into tbl_client(title,name, qty, price, payment, total, phone, status) values ('$addtocart->title', '$user_name', '$addtocart->qty', '$addtocart->price', '$payment', '$total', '$phone', '$status' )";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $remotesql ="delete from tbl_addtocart where title='$addtocart->title' ";
                    $resultRemove = mysqli_query($conn, $remotesql);
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
                }
                
                
            }
                  
        }
        

        
        echo json_encode($data);
    };


    if ($received_data->action == 'getAllClient') {
        $query = "select SUM(tbl_client.total) as total, tbl_client.name, tbl_client.phone, tbl_client.status from tbl_client where status ='pending'";
        // $query = "select tbl_lendBook.student, tbl_lendBook.book, tbl_lendBook.qty, tbl_lendBook.start_date, tbl_lendBook.end_date, tbl_book.image from tbl_lendBook  inner join tbl_book on tbl_lendBook.title = tbl_book.title";
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
      

    ?>