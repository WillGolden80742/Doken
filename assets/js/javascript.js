function openfile(value) {   
    if (value == null) {
        document.getElementById('editProfilePic').click();
    } else {
        document.getElementById("editProfilePic"+value).click();        
    }
}


function display (value) {
    if (value == null) {
        document.getElementById('stylePic').innerHTML+=".salvar {display:block;}";
    } else {
        document.getElementById('stylePic').innerHTML+=".salvar"+value+" {display:block;}";   
    }
}