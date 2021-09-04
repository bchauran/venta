<?php
 
    require_once("base.php");

    $guarda = new base();


	$upload_folder ='imagen';



    //AQUI CAPTURO LOS DATOS DE LOS INPUT TEXT
    $nombre_pro = $_POST['nombrep'];
    $nombre_cate = $_POST['catego'];
    $precio = $_POST['pre'];




    
	$nombre_archivo = $_FILES['archivo']['name'];

	$tipo_archivo = $_FILES['archivo']['type'];

	$tamano_archivo = $_FILES['archivo']['size'];

	$tmp_archivo = $_FILES['archivo']['tmp_name'];

	$archivador = $upload_folder . '/' . $nombre_archivo;

	$nomb = $archivador;

	$error=1;


	$base=$guarda->ingreso($archivador,$nombre_pro,$nombre_cate,$precio);

    

	if (move_uploaded_file($tmp_archivo, $archivador)) {
    
		
         //cambio los permisos del archivo
           
          chmod($archivador , 0777);


          echo json_encode($nomb);
		

	}




    
	else


	{
  

                   
          echo json_encode($error);

	}
	

	//echo json_encode($nomb);

	

?>