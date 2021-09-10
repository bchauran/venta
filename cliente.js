
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
                       

						  //console.log(DatosC.nombre);

                          $("#nom").val(DatosC.nombre);

                          $("#telefono").val(DatosC.telefono);

                          $("#direccion").val(DatosC.direccion);


                          
                      }
                         
         }); 






		},false);


});