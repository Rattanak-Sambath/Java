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
        $status = $received_data->status; 
       
        $delivery="";
        $promote = "";
        // print_r($addtocarts);  
        foreach ($addtocarts as $addtocart)
        {       

            $secondsql= "select title from tbl_client where title = '$addtocart->title'";
            $result2 = mysqli_query($conn, $secondsql);
            if($result2 === true){
                $qty2 = $addtocart->qty ++;
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
                $sql = "insert into tbl_client(title, user_name, qty, price, payment, total, delivery,promote, status) values ('$addtocart->title', '$user_name', '$addtocart->qty', '$addtocart->price', '$payment', '$total', '$delivery','$promote', '$status' )";
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




    ?>