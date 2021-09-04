<?php

	require_once('base1.php');


	$micone = new base();

    $micone2=$micone->conecta();



   


	$codigo_productoscomprados = json_decode($_POST['array_con_codigos']);

	$cantidadeproductosconprados = json_decode($_POST['cantidad_comprada']);

	//$cantfactu=json_decode($_POST['numerofac']);

	//$NUMF=json_decode($_POST['NUMF']);

	$CANTIDAD=count($codigo_productoscomprados);

	//$RE=1;


	/*$unop=$codigo_productoscomprados[0];
	$unoq=$codigo_productoscomprados[1];*/

    
    $contador=0;


    $codig_factu=1;


    //$micone2->query("insert into factu (codigoP,otro) values ('$unop','$CANTIDAD')");


    //$orden1="SELECT * FROM  factu where codigo_factura =".$cantfactu;

    //$paquete1=$micone2->query($orden1);

    //$paquete1=$micone2->query("SELECT * FROM  factu where codigo_factura=".$cantfactu);
                 
	$numregistros = $paquete1->num_rows;


	/*if($numregistros == 0) {*/

	

		while ($contador < $cantidadeproductosconprados ) { 

	


				$micone2->query("insert into factu (codigo_factura,codigoP,otro) values ('YO','$codigo_productoscomprados[$contador]','$CANTIDAD')");


			

			    $contador++;

	  /*   }
      */




  	   }


  	   mysqli_close($micone2);

  	/*else 

  	     {

    
	 
         }*/


?>