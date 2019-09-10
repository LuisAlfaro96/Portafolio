

//Tras cargarse la página ...
countryStars = ["starCRC","starUSD","starCAD","starMXN","starVEF","starEUR","starRUB","starZAR","starKRW","starJPY"];

window.onload = function(){
	hideChecks();	
}

function hideChecks(){
	for(var i=0; i<countryStars.length; i++){
		document.getElementById(countryStars[i]).style.visibility="hidden";
    }
}

function check(name){
	if(document.getElementById(name).style.visibility == "hidden"){
        document.getElementById(name).style.visibility="visible"
    }
    else{document.getElementById(name).style.visibility="hidden";}
}

function clearInfo(){
	hideChecks();
	document.getElementById("inputCRC").value="";
  	document.getElementById("inputUSD").value="";
	document.getElementById("inputCAD").value="";
	document.getElementById("inputMXN").value="";
	document.getElementById("inputVEF").value="";
	document.getElementById("inputEUR").value="";
	document.getElementById("inputRUB").value="";
	document.getElementById("inputZAR").value="";
	document.getElementById("inputKRW").value="";
	document.getElementById("inputJPY").value="";
 }

function exchangeCurrency(){
	ingresado=[0,0,0,0,0,0,0,0,0,0];

	for(var i=0; i<countryStars.length; i++){
		

		
}