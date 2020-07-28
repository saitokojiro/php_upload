<?php

require_once 'vendor/autoload.php';

$yourFile = $_GET['yourfile'];
$yourName = $_GET['yourname'];
$email = $_GET['email'];

$html = '<!DOCTYPE html>
<html>
<head>
<style>
html, body, .grid-container { height: 100%; margin: 0; }

.grid-container {
  display: grid;
  grid-template-columns: 1fr 1fr [V] 1fr 1fr;
  grid-template-rows: 1fr 0.3fr 1fr 0.3fr 0.7fr 2.7fr;
  gap: 1px 1px;
  grid-template-areas: ". Title Title ." ". . . ." ". message message ." ". . . ." ". Button Button ." ". . . .";
}

.Title { grid-area: Title;
}

.Title > span {
  position: absolute;
    top: 50%;
    left: 50%;
  text-align:center;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    font-size: 2em;
    font-weight: 900;
}

.message { grid-area: message; }


.message > span {
  position: absolute;
    top: 50%;
    left: 50%;
  text-align:center;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    font-size: 2em;
    font-weight: 900;
}




.Button { grid-area: Button; }
.Button > a {
  position: absolute;
    top: 50%;
    left: 50%;
  text-align:center;
    /* bring your own prefixes */
    transform: translate(-50%, -50%);
    font-size: 2em;
    font-weight: 900;
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

}
/* For presentation only, no need to copy the code below */
.grid-container * {

 position: relative;
}

.grid-container *:after {

 position: absolute;
 top: 0;
 left: 0;
}
</style>
</head>
<body>
<div class="grid-container">
<div class="Title">
  <span>WeTransfer</span>
</div>
<div class="message">
  <span>' . $yourName . ':' . ' has sent you a file!</span>
</div>
<div class="Button">
  <a href="' . 'http://127.0.0.99/mdlp.php?yourfile=' . $yourFile . '">Download</a>
</div>
</div>
</body>

</HTML>
';

var_dump($yourFile);

$transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 25))
    ->setUsername('1ea7ef852d99f5')
    ->setPassword('d2cb97ebdf3b95')
;

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message('download your file'))
    ->setFrom(['WeTransfer@service.ran' => 'WeTransfer'])
    ->setTo([$email => 'Mr Plop'])
    ->setBody($html, "text/html")
    /*->setBody("download your file :  " . "<a href=" . "http://127.0.0.99/mdlp.php?yourfile=" . $yourFile . ">click here</a>
delete your file <a href=" . "http://127.0.0.99/delete.php?yourfile=" . $yourFile . "> here </a>", "text/html")*/
;

$result = $mailer->send($message);

header("Location: index.php");
exit;