function links()
{
	document.getElementsById("buttonCo").className += " w3-hide";
	document.getElementsById("buttonAccount").className = document.getElementsByClassName("buttonAccount").className.replace(" w3-hide", "");
	document.getElementsById("buttonDeco").className = document.getElementsByClassName("buttonDeco").className.replace(" w3-hide", "");
	alert('Hello world');
}

$(document).ready(function(){
    // On cache le div a afficher :
    $("#buttonCo").hide();
 });