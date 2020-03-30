<?php

require_once 'vendor/autoload.php';
require_once 'credentials.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


// Create a message
$message = (new Swift_Message('EMAIL SUBJECT'))
  ->setFrom([EMAIL => 'EMAIL FROM NAME'])
  ->setTo(['target_email_1','target_email_2'])
  ->setBody('
  <html>
    <head></head>
    <body>
      <img src="your_image_link" style="width:100%;height:600px;"/><br>
      <h2>Greetings</h2>
    </body>
  </html>
  ', 'text/html')
  ;
  $message->attach(Swift_Attachment::fromPath('complete_attachment_location'));

// Send the message
$result = $mailer->send($message);

?>