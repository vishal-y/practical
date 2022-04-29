if(body.backgroundColor='#fff'){
    try {
        body.style.backgroundColor='rgb(255,239,239)';
        
    } catch (error) {
        console.log(error);
    } 
}

function color(element){

    const id = element.id;

    let heart = document.getElementById(id);
    
    if(heart.style.color=="red"){
        heart.style.color="black";
        heart.className="fa-regular fa-heart";
        console.log("color to normal ");
    }
    else{
        heart.style.color="red";
        heart.className='fa-solid fa-heart';
        console.log("ho gaya");
    }


}


function night(){ 
    console.log("night");
    document.getElementById("body").style.backgroundColor="#181A1B";
    document.getElementById("body").style.color="white";
    document.getElementById("moon").style.display="none";
    document.getElementById("sun").style.display="block";
}

function day(){ 
    console.log("day");
    document.getElementById("body").style.backgroundColor="rgb(255,239,239)";
    document.getElementById("body").style.color="black";
    document.getElementById("moon").style.display="block";
    document.getElementById("sun").style.display="none";
}



function move(){
    document.getElementById("arrowright").style.transition="all .3s ease";
    document.getElementById("arrowright").style.left="5%";
    document.getElementById("arrowright").style.color="#fff";
    document.getElementById("getstart").style.transition="all .3s ease";
    document.getElementById("getstart").style.color="#fff";
    
}

function moveagain(){
    document.getElementById("arrowright").style.left=".1px";
    document.getElementById("arrowright").style.color="blue";
    document.getElementById("getstart").style.color="blue";
}



function opts(){
    console.log("this is opts");
}


// console.clear();