
function show_password() {
    document.getElementById("closeeye").style.display='block';
    document.getElementById("eye").style.display='none';
    let x = document.getElementById("pass");
    let y = document.getElementById("pass2");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
    }
    //else {
    //     x.type = "password";
    //     y.type = "password";
    // }
}


function show_eye(){
    document.getElementById("closeeye").style.display='none';
    document.getElementById("eye").style.display='block';
    let x = document.getElementById("pass");
    let y = document.getElementById("pass2");
    if (x.type === "text") {
        x.type = "password";
        y.type = "password";
        
    }
}