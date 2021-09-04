<script>
    <link rel="stylesheet" href="estilo.css">
</script>

<script src="scripts3.js"></script>


<?php


   

 require_once('base1.php');

 
 
 $connexion2 = new base();

 $conex2=$connexion2->conecta();
 
    $html = '';
    //$page = $_GET['page'];

    $row = '';

    $page = $_GET['dato1'];

    $tprod = $_GET['dato2'];
    
    //$page2="lenceria";
    
    $rowsPerPage = NUM_ITEMS_BY_PAGE;
    $offset = ($page - 1) * $rowsPerPage;

   
     
    $result = $conex2->query(

        //'SELECT * FROM productos  LIMIT '.$offset.', '.$rowsPerPage


        "SELECT * FROM productos where categoria='$tprod' LIMIT ".$offset.", ".$rowsPerPage );
    

    if ($result->num_rows > 0) {


      $html = strip_tags($html);

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

             

            $html .= '<li class="col-sm-6">';

            //$html .= '<div class="item">';

            $html .= '<div class="card" id="uno" style="width: 100%;">';   

            $html .= '<p><img class="zoom" src="'.$row['imagen'].'" width="70px" height="70px" /></p>'; 



            

            //$html .= '<p class="zoo-item" data-zoo-scale="4" data-zoo-image="'.$row['imagen'].'"></p>';

            

            $html .= '<div class="card-body">';
            
            $html .= '<h5 class="card-title precio">PRECIO:<font color= "blue">'.$row['precio'].'</font> Bs.</h5>';

            $html .= '<h6 class="card-title codigo" id="codigo_parafactura">Codigo:<font color= "blue">'.$row['codigo_p'].'</font></h6>';

            $html .= '<p class="card-text">Este Producto esta a la venta, es de muy buena calidad aproveche.</p>';

            //BOTONES

            $html .= '<div class="row"> <a href="#" class="btn btn-primary botonc" id="'.$row['codigo_p'].'">COMPRAR</a>';

            $html .= '<a href="#" class="btn btn-primary botond" id="'.$row['codigo_p'].'">CANCELAR</a></div><BR>';
                      

            $html .= '</div></div>';


             //$html .= '</div>';
            $html .= '</li>';



        }
    }

    else

    {

         $html .= '<li class="col-lg-4">';
            $html .= '<div class="item">';

                $html .= '<h3> HA OCURRIDO UN ERROR </h3>'.$offset.' PAGINA '.$page2.'OFFSET  '.$offset;
            
            $html .= '</div>';
         $html .= '</li>';

    }
     
    echo $html;
    
?>
