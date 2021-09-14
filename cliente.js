
$(function() {

 
		var cliente = document.getElementById("idcli");

		
		cliente.addEventListener("keyup", function (event) {

	    //var valordni=document.getElementById("idcli").value;		

        valordni=cliente.value;    
        

		  //console.log(event);

		 //alert("hola--"+valordni);


		 
         soy = [];



         $.ajax({

                      type: "POST",
                      url: "consucli.php",
                      
                      /*data: {'array_con_codigos': JSON.stringify(carrito_compra), 'cantidad_comprada': JSON.stringify(CantidadComprada), 'NUMF': JSON.stringify(numero_factura)}, */

                      data: {'DniCliente': JSON.stringify(valordni)}, 

                      //data: {'array_con_codigos': JSON.stringify(CantidadComprada)},

                      success: function(datoSC){

                         
                          var DatosC = JSON.parse(datoSC);
                       

						  console.log(DatosC.nombre);

						  if (DatosC.nombre.length === 0){


						  	 
						  	  $("#nom").val(DatosC.nombre).prop( "disabled", false );
						  	 
	                          $("#telefono").val(DatosC.telefono).prop("disabled", false);

	                          $("#direccion").val(DatosC.direccion).prop("disabled", false);

						  	}

						  else {	

						  	 

	                          $("#nom").val(DatosC.nombre).prop( "disabled", true );

	                          //$( "#nom" ).prop( "disabled", true );

	                          $("#telefono").val(DatosC.telefono).prop( "disabled", true );

	                          $("#direccion").val(DatosC.direccion).prop( "disabled", true );

                          }


                          
                      }
                         
         }); 






		},false);


});