<?php
 require('base1.php');
 $nompro=null;
 $catego=null;

 $Tproducto = $_POST['datico'];

 if ($Tproducto==0) {

     $nompro="BAÑO";
     $catego="bano";
 }

 if ($Tproducto==1) {

     $nompro="COCINA";
     $catego="cocina";
 }

 if ($Tproducto==2) {

     $nompro="LENCERIA";
     $catego="lenceria";
 }

 if ($Tproducto==3) {

     $nompro="FERRETERIA";
     $catego="ferreteria";
 }





 
 $connexion = new base();

 $conex=$connexion->conecta();

 //$result = $conex->query('SELECT COUNT(*) as total_products FROM productos');

 //$result = $conex->query("SELECT COUNT(*) as total_products FROM productos where categoria='cocina'"); //.$catego;

 $result = $conex->query("SELECT COUNT(*) as total_products FROM productos where categoria='$catego'");
 //$result = $cone->query('SELECT * FROM alumno');
 
 
 $row = $result->fetch_assoc();
 $num_total_rows = $row['total_products'];
 
 echo "TOTAL PRODUCTOS--> ". $num_total_rows;
 
 echo "<p id='buscacateg'>".$catego."</p>";

 echo "<br>CATEGORIA <font color='red'><b>". $nompro ."</b></font>";



?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
        
		<!--<script src="jquery.js"></script>-->

        <!--<link href="jquery-ui/jquery-ui.css" rel="stylesheet">-->

       
        <!--<script src="jquery-ui/external/jquery/jquery.js"></script>-->

        <!--<script src="jquery.js"></script>-->

        <!--<script src="jquery-ui/jquery-ui.js"></script>-->

        <!--<script src="jquery-ui/external/jquery/jquery.min.js"></script>

        <script src='jquery-ui/external/jquery/jquery.zoom.js'></script>-->

		<!--<link href="bootrap3/css/bootstrap.min.css" rel="stylesheet">-->


        
        <style type="text/css">

            .zoom{

                /* Aumentamos la anchura y altura durante 2 segundos */

                transition: width 2s, height 2s, transform 2s;

                -moz-transition: width 2s, height 2s, -moz-transform 2s;

                -webkit-transition: width 2s, height 2s, -webkit-transform 2s;

                -o-transition: width 2s, height 2s,-o-transform 2s;

            }

            .zoom:hover{

                /* tranformamos el elemento al pasar el mouse por encima al doble de

                   su tamaño con scale(2). */

                transform : scale(6);

                -moz-transform : scale(6);      /* Firefox */

                -webkit-transform : scale(6);   /* Chrome - Safari */

                -o-transform : scale(6);        /* Opera */

            }

        </style>

        <!--<script><link href="estilo.css" rel="stylesheet"></script>-->



	</head>

	<body>


	  <?php

        //Si hay registros

        if ($num_total_rows > 0) {
            $num_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
            $result = $conex->query(
                'SELECT COUNT(*) as total_products FROM productos where categoria="$catego" LIMIT 0, '.NUM_ITEMS_BY_PAGE
            );

            if ($result->num_rows > 0) {

                
                echo '<ul class="row items">';



                       /*
                        while ($row = $result->fetch_assoc()) {
                            echo '<li class="col-lg-2">';
                            echo '<div class="item">';
                            //echo '<h3>'.$row['names'].'</h3>';

                            echo '<h3 class="muestra">PRUEBA-->'.$row["categoria"].'</h3>';
                           
                            echo '</div>';
                            echo '</li>';
                 
                        }

                        */
               
                
                echo '</ul>';
            }
         
            if ($num_pages > 1) {
                
                echo '<div class="row">';
                echo '<div class="col-lg-12">';
                echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination justify-content-end">';
         
                for ($i=1;$i<=$num_pages;$i++) {
                    $class_active = '';
                    if ($i == 1) {
                        $class_active = 'active';
                    }
                    echo '<li class="page-item '.$class_active.'"><a class="page-link" href="#" data="'.$i.'">'.$i.'</a></li>';
                }
         
                echo '</ul>';
                echo '</nav>';
                echo '</div>';
                echo '</div>';
            }
        }
      ?>

	  
        

	</body>

     <script src="scripts2.js"></script>


</html>


