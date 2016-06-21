<?php

require_once('vendor/autoload.php');

// Create the mail transport configuration
$transport = Swift_SmtpTransport::newInstance("smtp.sendgrid.net", 587);
$transport->setUsername("USERNAME");
$transport->setPassword("PASSWORD");

$json = '{
  "unique_args": {
    "Custom Header 1": "Something",
    "Custom Header 2": "Something else"
  }
}';

$message = Swift_Message::newInstance();

$headers = $message->getHeaders();

$headers->addTextHeader('X-SMTPAPI', $json);

$message->setTo(array(
    "EMAIL_ADDRESS" => "NAME"
));

$message->setSubject("This email is sent using Swift Mailer");

$message->setBody("This is the content");

$message->setFrom("SENDER_EMAIL_ADDRESS", "SENDER_NAME");

// Send the email
$mailer = Swift_Mailer::newInstance($transport);

$mailer->send($message);
