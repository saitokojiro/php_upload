<?php
require_once 'vendor/autoload.php';

$email = $_POST['email'];
/*
$uploaddir = __DIR__ . '/uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

 */
$uploaddir = __DIR__ . '/uploads/';
$name = $_FILES['userfile']['name'];
$nameArr = explode('.', $name);
$ext = $nameArr[count($nameArr) - 1];

$uidFile = uniqid();

$newName = $uidFile . '.' . $ext;

$uploadfile = $uploaddir . $newName;

echo '<pre>';

var_dump($_FILES);
var_dump(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile));

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "ok :" . $_FILES['userfile']['name'];

} else {
    echo "error : " . $_FILES['userfile']['name'];

    $zip = new ZipArchive();
    $zip->open('./uploads/' . $newName . '.zip', ZipArchive::CREATE);

    $zip->addFile('./uploads/' . $newName);

    $zip->close();

    header("Location: dlf.php?yourfile=" . $newName . ".zip&email=" . $email);
    exit;

}

echo ' Voici quelques informations de débogage :';
print_r($_FILES);

echo '</pre>';