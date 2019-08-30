
function cambiardivisas(){
	var ingresado=[0,0,0,0,0,0,0,0,0,0];
	var cantidadID = ["cantidaCR","cantidadPE","cantidadMX","cantidadEEUU","cantidadVEN","cantidadECU","cantidadITA","cantidadFRC","cantidadCH","cantidadRU"];
	var checkboxID = ["checkboxCR","checkboxPR","checkboxMX","checkboxEEUU","checkboxVEN","checkboxECU","checkboxITA","checkboxFRC","checkboxCH","checkboxRU"];
	ingresado[0] = document.getElementById("cantidaCR").value;
	ingresado[1] = document.getElementById("cantidadPE").value;
	ingresado[2] = document.getElementById("cantidadMX").value;
	ingresado[3] = document.getElementById("cantidadEEUU").value;
	ingresado[4] = document.getElementById("cantidadVEN").value;
	ingresado[5] = document.getElementById("cantidadECU").value;
	ingresado[6] = document.getElementById("cantidadITA").value;
	ingresado[7] = document.getElementById("cantidadFRC").value;
	ingresado[8] = document.getElementById("cantidadCH").value;
	ingresado[9] = document.getElementById("cantidadRU").value;
	
	var Colones=[1,166.81,28.15,556.86,0.03213,0.02,0.32,626.69,79,1902,8,5268 ];
	var cantidad = 0;
	var index = 0;
	for(var i = 0; i<10;i++){
		if (document.getElementById(cantidadID[i]).value != ""){
			cantidad=document.getElementById(cantidadID[i]).value;
			index=i;
			i=10;
		}
	}
	cantidad = cantidad * Colones[index];
	for(var i = 0; i<10;i++){
		if (document.getElementById(checkboxID[i]).checked == true){
			document.getElementById(cantidadID[i]).value = cantidad/Colones[i];
		}
	}
}

function limpiar(){
  document.getElementById("cantidaCR").value="";
  document.getElementById("cantidadPE").value="";
  document.getElementById("cantidadMX").value="";
  document.getElementById("cantidadEEUU").value="";
  document.getElementById("cantidadVEN").value="";
  document.getElementById("cantidadECU").value="";
  document.getElementById("cantidadITA").value="";
  document.getElementById("cantidadFRC").value="";
  document.getElementById("cantidadCH").value="";
  document.getElementById("cantidadRU").value="";
  
  document.getElementById("checkboxCR").checked = false;
  document.getElementById("checkboxPR").checked = false;
  document.getElementById("checkboxMX").checked = false;
  document.getElementById("checkboxEEUU").checked = false;
  document.getElementById("checkboxVEN").checked = false;
  document.getElementById("checkboxECU").checked = false;
  document.getElementById("checkboxITA").checked = false;
  document.getElementById("checkboxFRC").checked = false;
  document.getElementById("checkboxCH").checked = false;
  document.getElementById("checkboxRU").checked = false;
}





