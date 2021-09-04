<script>
<link rel="stylesheet" href="estilo.css">
</script>


<?php

 require_once('base1.php');

 
 
 $connexion2 = new base();

 $conex2=$connexion2->conecta();
 
    $html = '';
    $page = $_GET['page'];
    $rowsPerPage = NUM_ITEMS_BY_PAGE;
    $offset = ($page - 1) * $rowsPerPage;

   
     
    $result = $conex2->query(

        'SELECT * FROM productos  LIMIT '.$offset.', '.$rowsPerPage

       // 'SELECT * FROM productos where categoria="cocina" LIMIT '.$offset.', '.$rowsPerPage


    );

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            /*

            $html .= '<li class="col-sm-5">';
             $html .= '<div class="item">';
           
                $html .= '<h3><p><img src="'.$row['imagen'].'" width="70px" height="70px"/></h3></p>';

                $html .= '<h4>PRECIO:<font color= "blue">'.$row['precio'].'</font> Bs.</h4>'; 
                
                        
             $html .= '</div>';
            $html .= '</li>';

            */

            //$html .= '<li class="col-sm-5">';

            $html .= '<li class="col-sm-5">';

            //$html .= '<div class="item">';

            $html .= '<div class="card" id="uno" style="width: 18rem;">';   

            $html .= '<p><img class="zoom" src="'.$row['imagen'].'" width="70px" height="70px" /></p>'; 



            

            //$html .= '<p class="zoo-item" data-zoo-scale="4" data-zoo-image="'.$row['imagen'].'"></p>';

            

            $html .= '<div class="card-body">';
            
            $html .= '<h5 class="card-title">PRECIO:<font color= "blue">'.$row['precio'].'</font> Bs.</h5>';

            $html .= '<p class="card-text">Este Producto esta a la venta, es de muy buena calidad aproveche.</p>';

            //BOTONES

            $html .= '<div class="row"> <a href="#" class="btn btn-primary botonc" >COMPRAR</a>';

            $html .= '<a href="#" class="btn btn-primary">CANCELAR</a> </div><BR>';
           

                        

            $html .= '</div>';


             //$html .= '</div>';
            $html .= '</li>';






        }
    }

    else

    {

         $html .= '<li class="col-lg-4">';
            $html .= '<div class="item">';

                $html .= '<h3> HA OCURRIDO UN ERROR </h3>'.$offset.' PAGINA '.$page.'OFFSET  '.$offset;
            
            $html .= '</div>';
         $html .= '</li>';

    }
     
    echo $html;
    
?>
