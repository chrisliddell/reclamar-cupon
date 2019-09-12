
	
$(document).ready(function() {


	$.ajax({                                      
      url: 'server.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
      dataType: "text",                           //for example "id=5&parent=6"
      success: function(data)          //on recieve of reply
      {
		  var arr1 = data.split("*");
		  var list = []; 
		  for(var i = 0; i < arr1.length-1; i++){
			  list.push(arr1[i].split(","));
		  }
		  initDT(list)
		  
      } 
    });
} );

function reclamar(val){
	if (confirm("Reclamar el cupon de "+ val +"  ?")) {
		$.ajax({
		type : "POST",
		url : "reclamar.php",
		data : { "cedula": val, "reclamar": true},
		beforeSend: function(){
			$("#mensaje").html("Enviando...");
			$("#mensaje").fadeIn("fast");
		},
		success : function (data) {	
			location.href = "";
		}
		});
	} else {
	}
}

function initDT(datos){

	$('#tabla').DataTable( {
		data: datos
	} );

}