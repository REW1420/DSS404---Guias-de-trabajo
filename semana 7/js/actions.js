function iniciar(){
    var imgcalendar = document.getElementById("imgcalendar");
    //Evento de colocar el ratón encima de la imagen de calendario
    if(imgcalendar.addEventListener){
        imgcalendar.addEventListener("mouseover", function(){
            this.style.background='red';
        }, "false");
    }
    else if(imgcalendar.attachEvent){
    	imgcalendar.attachEvent("onmouseover", function(){
            this.style.background='red';
    	});
    }
    //Evento de retirar el ratón de encima de la imagen de calendario
    if(imgcalendar.addEventListener){
        imgcalendar.addEventListener("mouseout", function(){
        	this.style.background='';
        }, "false");
    }
    else if(imgcalendar.attachEvent){
    	imgcalendar.attachEvent("onmouseout", function(){
            this.style.background='';
    	});
    }
}


if(window.addEventListener){
    window.addEventListener("load", iniciar, false);
}
else {
    window.attachEvent("load", iniciar);
}