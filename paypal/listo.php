<!DOCTYPE html>
<html>
   <head>
   	
   	    <script src="jquery.js"></script>

   </head>
	<body>

	<br><br><h2><center><h2>OPERACION PAYPAL EXITOSA</h2><br>
	<button onclick="factur()">ACEPTAR</button></center>

	<center><p id="demo"></p></center>

		<script>

			function factur() {

			  var resp;


			  if (confirm("Deseas generar la factura?")) {

			         resp = "GRACIAS POR SU COMPRA!";
			         //var carrito_compra = ["C-03","C-04"];


			         $("#MuestraFac").empty();

                                    
		                          var iframe = $('<iframe class="responsive-iframe" width="800px" height="300px">');
		                          iframe.attr('src','../facturas/factura.pdf');
		                          $('#MuestraFac').append(iframe);

                          
                          /*$.ajax({

		                      type: "POST",
		                      url: "//localhost/venta/factura.php",
		                      data: {'array_con_codigos': JSON.stringify(carrito_compra)},

		                      success: function(datas){

		                                
		                          $("#MuestraFac").empty();

                                    
		                          var iframe = $('<iframe class="responsive-iframe" width="800px" height="300px">');
		                          iframe.attr('src','../facturas/factura.pdf');
		                          $('#MuestraFac').append(iframe);

		                          //carrito_compra=[];      
		                      }
		                  });*/



			       /*

			        $( "#MuestraFac" ).load( "../factura.php", function() {
					  alert( "Factura generada" );
					});

					*/

			  } else {

			    // resp = "SU respuesta fue no!";

			     window.location.href = '../index.html';

			    
			  }


			  //document.getElementById("demo").innerHTML = resp;
			}

		</script>


		<center><div id="MuestraFac"  style="width:50%"></div></center>

	</body>
</html>






<?php

  echo "";




?>