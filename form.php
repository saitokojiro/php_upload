<?php
require_once 'vendor/autoload.php';

$uidFile = uniqid();

$email = $_POST['email'];

$yourName = $_POST['yourName'];

var_dump($_POST);

if ($_FILES && $_FILES['userfile']['name'] && !empty($email) && !empty($yourName)) {
    $zip = new ZipArchive();

    $uidFile = uniqid();

    $zip_name = getcwd() . "/uploads/" . $uidFile . ".zip";

    if ($zip->open($zip_name, ZipArchive::CREATE) !== true) {
        echo "error";
    }

    $name = count($_FILES['userfile']['name']);
    for ($i = 0; $i < $name; $i++) {
        //change name to UID
        /*
        $nameArr = explode('.', $_FILES['userfile']['name'][$i]);
        $ext = $nameArr[count($nameArr) - 1];
        $uidFile = uniqid();
        $newName = $uidFile . '.' . $ext;*/

        //zip archive
        $zip->addFromString($_FILES['userfile']['name'][$i], file_get_contents($_FILES['userfile']['tmp_name'][$i]));

    }
    $zip->close();

    //$fileTimeName = getcwd() . "/uploads/"

    $folder = new DirectoryIterator(dirname('uploads/*'));

    foreach ($folder as $file) {
        if ($file->isFile() && !$file->isDot() && (time() - $file->getMTime() > 240)) {
            unlink($file->getPathname());
        }

    }

    header("Location: dlf.php?yourfile=" . $uidFile . ".zip&email=" . $email . "&yourname=" . $yourName);
    exit;

}
echo '</pre>';