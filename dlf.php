<?php

require_once 'vendor/autoload.php';

$yourFile = $_GET['yourfile'];
$email = $_GET['email'];

var_dump($yourFile);

$transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
    ->setUsername('1ea7ef852d99f5')
    ->setPassword('d2cb97ebdf3b95')
;

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('download your file'))
    ->setFrom(['coucou@helloworld' => 'Tester'])
    ->setTo([$email => 'Mr Plop'])
    ->setBody("download your file :  " . "<a href=" . "http://127.0.0.99/uploads/" . $yourFile . ">click here</a>
    delete your file <a href=" . "http://127.0.0.99/delete.php?yourfile=" . $yourFile . "> here </a>", "text/html")
;

$result = $mailer->send($message);

header("Location: index.php");
exit;