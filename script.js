let fileTarget = document.querySelector('.file-target');
let userFile = document.querySelector('#userfile');
let msgFile = document.querySelector('.msg_file')



console.log(userFile.files.length)

userFile.addEventListener("change", function (event) {

    if (userFile.files.length !== 1) {


        if (userFile.files.length < 4) {
            let name = "";
            for (let i = 0; i < userFile.files.length; i++) {
                name += userFile.files[i].name + " <br>";
            }

            console.log(name)
            msgFile.innerHTML = name;
        } else {
            msgFile.innerHTML = userFile.files.length + " selected";
        }


    } else {
        msgFile.innerHTML = this.value;
    }

    msgFile.innerHTML = msgFile.innerHTML.replace(/^.*\\/, "")
});