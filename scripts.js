    //var carrito_compra  = [];


           if (typeof carrito_compra == "undefined"){

            /*
           
            var alert = alertify.alert("VARIABLE NO DEFINIDA...").set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

            */

            var carrito_compra  = [];  //creo el array para meter los datos del producto comprado.

            


            }

            else {


              
            /*
            
              var alert = alertify.alert("VARIABLE SI DEFINIDA...").set('label', 'Aceptar');        
              alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
              alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

            */
             
            }



    $("#inicio").click(function(evento){

          //evento.preventDefault();

          //$("#info").empty();

          //$("#info").append("<b>INFORMACION</b");

          $("#info").hide("size");

    });


     
    
    //BOTON CARGAR PRODUCTOS

    $("#carga").click(function(evento){

                  evento.preventDefault();

                  //$("#info").show();

                  $("#info").show("size","slow");

                  $("#info").load("carga_p.html");
    });



    //AL HACER CLICK SOBRE ESTE BOTON SE MUESTRA EL ARCHIVO listaf.php.
     $("#listadof").click(function(evento){

                  evento.preventDefault();

                  $("#info2").hide("size");
                  
                  $("#info").show();

                  $("#info").empty();

                 $("#info").load("listaf.php");



    });



    //BOTON GUARDA LOS DATOS DEL CLIENTE EN LA BASE DE DATOS
    
    $("#GuardaC").click(function(evento){

       evento.preventDefault();

       
       var nomc = $("#nom").val();

       var telef = $("#telefono").val();
       
       var direc = $("#direccion").val();

       var idcli = $("#idcli").val();



       $.ajax({

               
                      type: "POST",
                      url: "GuardaC.php",
                      data: {'idclie': JSON.stringify(idcli), 'nomclie': JSON.stringify(nomc), 'telefc': JSON.stringify(telef), 'direccionc': JSON.stringify(direc)},

                       
                      success: function(respuesta){

                        // console.log(respuesta);    

                        if (respuesta="EXITO"){

                         var alert = alertify.alert("GRACIAS POR SU COMPRA...").set('label', 'Aceptar');        
                          alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
                          alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no   

                        }
                        
                         
                      }
            });



    });




    $(".botoncX").click(function(evento){

            evento.preventDefault();

            //alert("GRACIAS POR SU COMPRA");

            //var costo = $(".codigo").html();

            //var costo = $(".codigo").html();

            //var costo = $(this).html();


            //var costo = $('.botonc').prop('id');


           
            //var carrito_compra  = [];

            //var carrito_compra;

            //codigo=true;


           /*
            if (typeof carrito_compra == "undefined"){
                var alert = alertify.alert("VARIABLE NO DEFINIDA...").set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

            var carrito_compra  = [];


            }

            else {

              var alert = alertify.alert("VARIABLE SI DEFINIDA...").set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 
            }

            */

           

            
            codigo = $(this).prop('id');
           

            carrito_compra.push(codigo);


            //console.log(carrito_compra);

            //carrito_cant=carrito_compra.length; 

            //console.log(carrito_cant);


            console.log(carrito_compra);  
            console.log(carrito_compra.length);  

 
                        
            var alert = alertify.alert("GRACIAS POR SU COMPRA1..." + codigo+ "CATIDAD COMP " + CantidadComprada).set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

            
                 
    });



    $("#cate2 li").click(function(){


        var valorcate = $(this).index();
            
        //alert("Valor " + valorcate);

        $("#info").show("size","slow").delay(500);

        $("#info").load("repro.php", {datico: valorcate});

        //$('#central').load('detalleiteva.php', {IdObras: IdOb});

        //$("#output").load("ver_unidades.php?numarticulos=10&otraVariable=segundoValor);

    });




    $("#subir").on("click", ejecuta);


    function ejecuta() {
   
        
      var  nprodu = $("#npro");

      var  cate = $("#cate");

      var  precio = $("#precio");
     
        
        if( nprodu.val().length <= 0 || cate.val().length <= 0 ) {



            //alert("FALTA INFORMACION !VERIFIQUE!");

            //alertify.message('Mensaje Normal',10, null);


            

            var alert = alertify.alert("FALTA INFORMACION VERIFIQUE...").set('label', 'Aceptar');        
            alert.set({transition:'zoom'}); //slide, zoom, flipx, flipy, fade, pulse (default)
            alert.set('modal', false);  //al pulsar fuera del dialog se cierra o no 

           
            /*
            alertify.set('notifier','position', 'top-center');
            //alertify.success('Current position : ' + alertify.get('notifier','position'));

            alertify.success("HA OCURRIDO UN ERROR VERIFIQUE");

            */


        } 

       

           /*if( nprodu.val().length > 0 || cate.val().length > 0 ) {  */

        else {

                var inputFileImage = document.getElementById("archivo");

                var file = inputFileImage.files[0];

                var imagen = new FormData();


                //aqui agrego a el objeto imagen los datos de la foto

                imagen.append('archivo',file);

                 
                var nproducto = $("#npro").val();

                               
                             
                var categ = $('#cate option:selected').val();

               
                
                var preci = $("#precio").val();



                //aqui agrego a el objeto imagen los datos del producto


                imagen.append('nombrep', nproducto);

                imagen.append('catego', categ);

                imagen.append('pre', preci); 


                var url = "subir.php";


                $.ajax({

                            url:url,

                            type:'POST',

                            contentType:false,

                            data:imagen,

                            processData:false, //processData Indica si se transforman los datos de la opción data para 
                                               //convertirlos en una cadena de texto. Si se indica un valor
                                               // de false, no se realiza esta transformación automática.

                            cache:false,  //cache Establece si la petición será guardada en la cache del navegador. 
                                          //De forma predeterminada es true para todos los dataType excepto para 
                                          //script y jsonp. Cuando posee el valor false, se agrega una cadena de 
                                          //caracteres anti-cache al final de la URL de la petición.

                            
                            error: function(respuesta) {
                            $('#muestra-datos').html('<p>VERIFIQUE A OCURRIDO UN ERROR</p>');
                            },



                            success: function(respuesta) {

                                var listaUsuarios = $("#muestra-datos");

                                $("#muestra-datos").empty();

                                var respi= respuesta;


                                if(respi=="1"){
                                

                                  listaUsuarios.append(


                                      /*'<div>'

                                          + */    '<center><p><h3><p>M  E  N  S  A  J  E' + '</p></h3></p></center>'
                                                

                                            

                                            + '<p><b>HA OCURRIDO UN ERROR VERIFIQUE</b></p>' 

                                           
                                      /*'</div>'*/

                                  );

                                } 

                                else{

                                   

                                     listaUsuarios.append(


                                      /*'<div>'

                                          + */    '<center><p><h3><p>F O T O  ----- DEL PRODUCTO: ' + '</p></h3></p></center>'
                                                

                                           +     '<p><img class="img-responsive" src ='  + respuesta +  '</p>' 

                                            

                                           
                                      /*'</div>'*/

                                     );

                              


                                } 
                                   



                            }

                           

                });

        }        

        

    }


    


    $("#pagarss").click(function(evento){

                  evento.preventDefault();

                  $("#info").show();

                  $("#info").empty();

                  //$("#info").show("size","slow");

                  //$("#info").load("paga.php",{array_con_codigos_paypal: carrito_compra});

                  
                
                  //$("#info").load("paga.php",{array_con_codigos_paypal:'carrito_compra'}, function(response, status, xhr) {
                  
                  

                  var url = "paga.php?array_con_codigos_paypal=" + carrito_compra;

                  //var url = "paga.php";

                  window.location = url;

                  //$("#info").location.href = url;

                  //location.href = "2.html?Key="+scrt_var;



                 /*

                  var iframe = $('<iframe class="responsive-iframe">');
                          iframe.attr('src','paga.php');
                          $('#info').append(iframe);
                 */   


                 /*
                  var iframe = $('<iframe class="responsive-iframe">');
                          iframe.attr('src','paga.php?array_con_codigos_paypal=carrito_compra');
                          $('#info').append(iframe); 
                 */                


                  //$('#info').attr('src', "paga.php?array_con_codigos_paypal=carrito_compra");         

                 // <iframe src="https://ejemplo.com"></iframe>




    });    



    //generar la factura
    $("li.factura").click(function(evento1){

            evento1.preventDefault();

            /*alert("hola");*/

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
    

    
         

  