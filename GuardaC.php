<?php

    require_once('base1.php');

	$conec = new base();

	//$Guardac=$conec->conecta();


	//RECIBO TODOS LOS DATOS QUE ME ENVIAN DEL CLIENTE Y LOS GUARDO EN LA BD


	$Idcliente = json_decode($_POST['idclie']);

	$Ncliente = json_decode($_POST['nomclie']);
	
	$Telef = json_decode($_POST['telefc']);

    $Dcliente = json_decode($_POST['direccionc']);


    
    $SALVA=$conec->IngresoC($Idcliente, $Ncliente, $Telef, $Dcliente);


    echo json_encode($SALVA);  

	

?>