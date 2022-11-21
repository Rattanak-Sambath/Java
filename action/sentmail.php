 <?php 
    $received_data = json_decode(file_get_contents("php://input"));
    $data = array();

    include '../connection/db.php';
    // // 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
        $email = $received_data->email;
        $phone = $received_data->phone;
        $describtion = $received_data->describtion;
        
    if ($received_data->action == 'sentmail') {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "stmp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = 'sambathrattanak3@gmail.com';
        $mail->Password = 'zlkbojyflffrmojo';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sambathrattanak3@gmail.com');
        $mail->Subject = $email;
        $mail->Body = $phone;
        $mail->send();
    }
?> -->