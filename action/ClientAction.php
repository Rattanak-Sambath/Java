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
        $total = "";
        $delivery="";
        $promote = "";
        // print_r($addtocarts);  
        foreach ($addtocarts as $addtocart)
        {           
            $sql = "insert into tbl_client(title, user_name, qty, price, payment, total, delivery,promote, status) values ('$addtocart->title', '$user_name', '$addtocart->qty', '$addtocart->price', '$payment', '$total', '$delivery','$promote', '$status' )";
            $result = mysqli_query($conn, $sql);
            if($result){
                
            }
                  
        }
        if ($result === true) {
            $data = array(
                'status' => 'insert',
                
            );
            } else {
            $data = array(
                'status' => 'inserted',
               
                'err' => $conn->error,
        
            );
            }

        
        echo json_encode($data);
    };




    ?>