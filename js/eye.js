
var state = false;
function toggle(){
    if(state){
        document.getElementById("inputPassword").setAttribute("type", "password");
        document.getElementById("eye").style.color='#7a797e';
        state = false;
    }

    else{
        document.getElementById("inputPassword").setAttribute("type", "text");
        document.getElementById("eye").style.color='#5887ef';
        state = true;
    }
}
var data = false;
function change(){
    if(data){
        document.getElementById("exampleInputPassword1").setAttribute("type", "password");
        document.getElementById("hide").style.color='#7a797e';
        data = false;
    }
    else{
        document.getElementById("exampleInputPassword1").setAttribute("type", "text");
        document.getElementById("hide").style.color='#5887ef';
        data = true;
    }
}


/*
$(function(){ 
    $("#eye").click(function(){
        //$("#inputPassword").show().hide();
        alert("hhhhhh");
    });
});
*/