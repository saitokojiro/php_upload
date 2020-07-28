<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>

<body>
    <div id="drop-area">
        <div class="titleText">
            <span>WeTransfer</span>
        </div>
        <form enctype="multipart/form-data" action="form.php" method="post" class="my-form">
            <input type='text' name="yourName" id='yourName' class='input-css' placeholder="Your Name" required>
            <input type='email' name="email" id='email' class='input-css' placeholder="email dest" required>
            <input type="hidden" name="MAX_FILE_SIZE" value="99999999" class='input-css' />
            <div class='insert_file'>
                <input type="file" name="userfile[]" id="userfile" class="input-file input-css" multiple required>

                <label for="userfile" class="file-target input-css">
                    <p class='msg_file input-css'>click or place your file</p>
                </label>
            </div>




            <input type="submit" value="send file" class='input-css sendbtn'>

        </form>



    </div>


    <?php

?>


</body>

</html>