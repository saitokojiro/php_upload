let fileTarget = document.querySelector('.file-target');
let userFile = document.querySelector('#userfile');
let msgFile = document.querySelector('.msg_file')



console.log(userFile.files.length)

userFile.addEventListener("change", function (event) {

    valFileInput()

});


/*

document.getElementById('add').addEventListener('click', function () {
    //addItems();
});*/
addItems = (value) => {
    var parent = document.createElement('div');
    var text = document.createElement('p');
    var button = document.createElement('button');

    //text.innerText = "Click button";

    button.className = "btnDeleteFile";
    parent.className = "boxItemFile"
    text.className = "titleItemFile"


    button.innerText = "Delete";
    text.innerText = value.name;


    parent.appendChild(text);
    parent.appendChild(button);

    // this is something you are looking for.
    button.addEventListener('click', function () {

        this.parentNode.remove();

        clearV(this.parentNode)

    });
    document.querySelector('.boxContentFile').appendChild(parent);

}


//delete input file 

clearV = (val) => {
    const dataTr = new DataTransfer();

    for (let i = 0; i < userFile.files.length; i++) {
        dataTr.items.add(new File([], userFile.files[i].name))
    }
    console.log(dataTr.files);
    dataTr.items.remove(val);
    userFile.files = dataTr.files

}


valFileInput = () => {

    let element = document.querySelectorAll('.boxItemFile');
    element.forEach((el) => {
        el.remove();
    });

    if (userFile.files.length !== 1) {


        if (userFile.files.length < 4) {
            let name = "";
            for (let i = 0; i < userFile.files.length; i++) {
                //name += userFile.files[i].name + " <br>";

                addItems(userFile.files[i]);
            }

            console.log(name)
            //msgFile.innerHTML = name;
        } else {
            //msgFile.innerHTML = userFile.files.length + " selected";
            for (let i = 0; i < userFile.files.length; i++) {
                addItems(userFile.files[i]);
            }
        }


    } else {
        //msgFile.innerHTML = userFile.files[0].name;
        addItems(userFile.files[0]);
    }

    //msgFile.innerHTML = msgFile.innerHTML.replace(/^.*\\/, "")



}