  

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

 
            var alert = alertify.alert("GRACIAS POR SU COMPRA..." + codigo).set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

                 
    });



    

  