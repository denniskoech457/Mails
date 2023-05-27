<?php
  if( isset($_POST['send']))
   {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['message'];
    
      require("/home/infinityairt8/public_html/PHPMailer-master/src/PHPMailer.php");
      require("/home/infinityairt8/public_html/PHPMailer-master/src/SMTP.php");

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSMTP(); // enable SMTP

    //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "mail.infinityairtimexchange.com";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "notifications@infinityairtimexchange.com";
    $mail->Password = "&14F=k8{z45X";
    $mail->SetFrom('notifications@infinityairtimexchange.com','Infinity Website Notifications');
    $mail->addReplyTo("$email");
    $mail->Subject = "Contact Subject: $subject";
    $mail->Body = "<h5>Contact Notification</h5><br><b>Name:</b>$subject<br><b>Email:</b>$email<br><h5>Message:</h5><br><p>$body</p>";
    $mail->AddAddress('info@infinityairtimexchange.com');

     if($mail->Send()) { 
      $_SESSION['status']= "message sent";
      $_SESSION['more']= "Thanks for Your Message, we shall get in touch soon!";
      $_SESSION['status_code']= "success";
     } else {
       echo "Mailer Error: " . $mail->ErrorInfo;
     }
   }
   ?>
