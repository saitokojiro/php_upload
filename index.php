<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="drop-area">
        <form enctype="multipart/form-data" action="form.php" method="post" class="my-form">
            <input type='email' name=" email" id='email'>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <input type="file" name="userfile" id="userfile">
            <input type="submit" value="send file">
        </form>
    </div>


    <?php

var_dump(uniqid())
?>
</body>

</html>