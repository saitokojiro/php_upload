<?php

$deleteYourFile = $_GET['yourfile'];

unlink(__DIR__ . '/uploads/' . $deleteYourFile);
unlink(__DIR__ . '/uploads/' . substr($deleteYourFile, 0, -4));

header("Location: index.php");
exit;