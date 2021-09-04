  

    $(".botonc").click(function(evento){

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


            carrito_compra.push(codigo);


            //console.log(carrito_compra);

            //carrito_cant=carrito_compra.length; 

            //console.log(carrito_cant);


            //console.log(carrito_compra);  
            //console.log(carrito_compra.length);  

            CantidadComprada=carrito_compra.length;

            
            $('li.factura').show(); //aqui muestro el link para generar la factura

            $("#carrito").show("size","slow");

                var lienzo = $("#carrito");

                $("#carrito").empty(); 

                lienzo.append(

                 '<p><img class="img-responsive" src ="carrito/carrito'  + CantidadComprada + '.png"' + '</p> </center>' 
   
                ); 


 
            var alert = alertify.alert("GRACIAS POR SU COMPRA..." + codigo).set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

                 
    });





    $("li.factura").click(function(evento1){

            evento1.preventDefault();

           /*
            var alert = alertify.alert("GENERANDO FACTURA..." + carrito_compra).set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 
           
          */


            dato="C-04";

            $.ajax({

                      type: "POST",
                      url: factura.php,
                      //data: {'array_con_codigos': JSON.stringify(carrito_compra)},

                      data:dato,
                    

                      error: function(data) {


                            $("#info").empty();

                            $('#info').html('<p>VERIFIQUE A OCURRIDO UN ERROR</p>');

                      },


                      success: function(data){

                               var listaUsuarios = $("#info");

                                $("#info").empty();


                      }
            });

    });        
    

  