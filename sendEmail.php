<?php
    use PHPMailer\PHPMailer\PHPMailer;

  if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
		$telefone=$_POST['telefone'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "";
        $mail->Password ="";
        $mail->Port = ;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress(""); //enter you email address
    
       // $mail->Body = $body;
	   $mail->Body=<<<EOT
            Message: {$body}
			
EOT;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
		
		header('Content-Type: application/json; charset=utf-8');

        echo json_encode(array("status" => $status, "response" => $response)) ;
		
  }
?>
