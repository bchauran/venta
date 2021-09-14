<?php

require_once('base1.php');

	$con1 = new base();

	$busca=$con1->conecta();


	$dnicliente = json_decode($_POST['DniCliente']);


     //$MISDATOS = array();
	

	    //Busco el registro($dnicliente) en la base de  datos.

        $ConsultaCli = $busca->query("SELECT * FROM cliente where dnicli = '$dnicliente'");

        //$ConsultaCli = $busca->query("SELECT * FROM cliente");
       
        
        $DatosC = mysqli_fetch_array($ConsultaCli);



      	if ($DatosC > 0) {


        
        
	        //Armo un array con los datos extraidos de la bd.

	        $MISDATOS = array('id' => $DatosC[0],'nombre' => $DatosC[1],'telefono' => $DatosC[2],'direccion' => $DatosC[3]);



	       	echo json_encode($MISDATOS);


       	}


       	else{


       		

	        $MISDATOS = array('id' => "",'nombre' => "",'telefono' => "",'direccion' => "");



	       	echo json_encode($MISDATOS); 




       	}

    


?>