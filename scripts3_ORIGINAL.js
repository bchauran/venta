

    if (typeof carrito_compra == "undefined"){

            /*
           
            var alert = alertify.alert("VARIABLE NO DEFINIDA...").set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

            */

            var carrito_compra  = [];  //creo el array para meter los datos del producto comprado.

            var nofac = 2;


            }

            else {


              
            /*
            
              var alert = alertify.alert("VARIABLE SI DEFINIDA...").set('label', 'Aceptar');        
              alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
              alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

            */
             
            }







     //boton comprar

    $(".botonc").click(function(evento){


            
           /* if(nofac = 0){


              nofac = 1;

            }*/


            //var nofac = 1;


            evento.preventDefault();

                       
            //alert("GRACIAS POR SU COMPRA");

            //var costo = $(".codigo").html();

            //var costo = $(".codigo").html();

            //var costo = $(this).html();


            //var costo = $('.botonc').prop('id');


            //var carrito_compra = [];

            

            //var carrito_compra  = [];

            //var codigo;
            
            
            
           var codigo = $(this).prop('id');


            /*var codigo = $('#codigo_parafactura').val();*/

                       
            carrito_compra.push(codigo);

             //carrito_compra[]=codigo;


            //console.log(carrito_compra);

            //carrito_cant=carrito_compra.length; 

            //console.log(carrito_cant);


             

            CantidadComprada = carrito_compra.length;

           

            
            $('li.factura').show(); //aqui muestro el link para generar la factura

            $("#carrito").show("size","slow");

                var lienzo = $("#carrito");

                $("#carrito").empty(); 

                lienzo.append(

                 '<p><img class="img-responsive" src ="carrito/carrito'  + CantidadComprada + '.png"' + '</p> </center>' 
   
                ); 


 
            var alert = alertify.alert("GRACIAS POR SU COMPRA2..." + codigo + "....cantidad..."+ CantidadComprada).set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 


            console.log("CARRITO DE COMPRA "+carrito_compra);  
            console.log("CANTIDAD COMPRADA "+carrito_compra.length); 

                 
    });





    //boton cancelar compra

    $(".botond").click(function(evento){

            evento.preventDefault();

                       
            //alert("GRACIAS POR SU COMPRA");

            //var costo = $(".codigo").html();

            //var costo = $(".codigo").html();

            //var costo = $(this).html();


            //var costo = $('.botonc').prop('id');


              //var carrito_compra = [];

            

            //var carrito_compra  = [];

            //var codigo;
            

            
            codigo = $(this).prop('id');



            var lugar = carrito_compra.indexOf(codigo); // conseguimos el indice del elemento a brrar

            if (lugar > -1) {  

                carrito_compra.splice(lugar, 1); // 1 es la cantidad de elementos a borrar
            }

           // console.log(carrito_compra);


            CantidadComprada=carrito_compra.length;

            
            //$('li.factura').show(); //aqui muestro el link para generar la factura

            $("#carrito").show("size","slow");

                var lienzo = $("#carrito");

                $("#carrito").empty(); 

                if (CantidadComprada >= 1){

                  lienzo.append(

                   '<p><img class="img-responsive" src ="carrito/carrito'  + CantidadComprada + '.png"' + '</p> </center>' 
     
                  ); 

                  var alert = alertify.alert("PRODUCTO ELIMINADO..." + codigo).set('label', 'Aceptar');        
                  alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
                  alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

                }

                else {

                     $("#carrito").hide();

                }


 
            
    });        
    

   //generar la factura
    $("li.factura").click(function(evento1){

            evento1.preventDefault();

            //alert("hola");

           /*

            var alert = alertify.alert("GENERANDO FACTURA..." + carrito_compra).set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 
           
           */


            //$("#info").empty();

           //$( "#info" ).load( "factura.php" );
           
           
            $.ajax({

                      type: "POST",
                      url: "factura.php",
                      data: {'array_con_codigos': JSON.stringify(carrito_compra)},

                      success: function(datas){

                                
                          $("#info").empty();


                          var iframe = $('<iframe class="responsive-iframe">');
                          iframe.attr('src','facturas/factura.pdf');
                          $('#info').append(iframe);

                          carrito_compra=[];      
                      }
            });

    });  




    
    function oculta(){ 


       $("#info2").hide(); 

       $('#info').show();


    }



    $("#pagar").click(function(evento){

                 console.log("CARRITO DE COMPRA CUANDO PAGA "+carrito_compra);  
                 console.log("CANTIDAD COMPRADA CUANDO PAGA "+carrito_compra.length); 

                  evento.preventDefault();


                  var numero_factura="FAC-1";
                  

                  $("#info").empty();

                  //nofac=a;


                  //Añadimos la imagen de carga en el contenedor
                  //$('#info').html('src=imagen/manzana.png');

                  //Añadimos la imagen de carga en el contenedor
                  //$('#info').html('<div class="loading"><img src="gif/mano.gif" width="50" height="50" alt="cargando" /><br/>Un momento, por favor...</div>');

                  


                  /*DATOS PARA LA FACTURA(CREAMOS LA FACTURA PRIMERO)*/


                 /*console.log("CARRITO DE COMPRA CUANDO PAGA "+carrito_compra);  
                 console.log("CANTIDAD COMPRADA CUANDO PAGA "+carrito_compra.length);  */



                  $.ajax({

                      type: "POST",
                      url: "guarda.php",
                      
                      data: {'array_con_codigos': JSON.stringify(carrito_compra), 'cantidad_comprada': JSON.stringify(CantidadComprada), 'NUMF': JSON.stringify(numero_factura)}, 

                      

                      //data: {'array_con_codigos': JSON.stringify(CantidadComprada)},

                      success: function(datas){


                         
                                
                          $("#info").empty();

                          /*
                          var iframe = $('<iframe class="responsive-iframe">');
                          iframe.attr('src','facturas/factura.pdf');
                          $('#info').append(iframe);

                          carrito_compra=[];   */   
                      }
                         //nofac=0;
                  });


                  
                 $.ajax({

                      type: "POST",
                      url: "factura.php",
                      data: {'array_con_codigos': JSON.stringify(carrito_compra)},

                      success: function(datas){

                                
                          $("#info").empty();


                          var iframe = $('<iframe class="responsive-iframe">');
                          iframe.attr('src','facturas/factura.pdf');
                          $('#info').append(iframe);

                          //carrito_compra=[];      
                      }
                  });



                  /*DATOS PARA EL PAYPAL*/
                  

                  $.ajax({

                        type: "POST",
                        url: "paga.php",
                        data: {'array_con_codigos_paypal': carrito_compra, 'cantidad_comp': CantidadComprada},
                        
                        success: function(responde) {

                            

                            var dib = $('<div id="carga"><center><img src="gif/circulo1.gif" alt="CARGANDO" width="250" height="250"/></center></div>');
                            

                            var iframe = $("<iframe class='responsive-iframe' onload='oculta()'>");

                            iframe.attr('src',responde);
                                                       
                            $('#info').html(iframe);

                            $('#info').hide();

                            $('#info2').html(dib);



                        }
                  }); 

                  //nofac=a;


                 //exit();


                  //return true;
     
                  //return false;

                  

    });   

  
