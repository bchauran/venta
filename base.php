<?php
   
  class base{


  	  //DatosParaAccederAlaBaseDeDatos/**//**//**//

  	  /**/  public $hostname="127.0.0.1";      /**/

	    /**/  public $usuario   = "root";        /**/ 

	    /**/  public $clave     = "8266";        /**/

	   /**/	public $basedatos = "ventas"; /**/

     /**//**//**//**//**//**//**//**//**//**//**//**/


     public $ima1;
     public $cone;


     function conecta(){


     	  $conecta = new mysqli($this->hostname, $this->usuario, $this->clave, $this->basedatos);

     	  $this->cone=$conecta;

     	  return $this->cone;
          

     }
     
     
     function busca($nofactura){


	  		    $myhost=$this->hostname;
	  		    $myusuario=$this->usuario;
	  		    $myclave=$this->clave;
	  		    $mybase=$this->basedatos;
  		    

	  		                  
	  		     $consul = new mysqli($myhost, $myusuario, $myclave, $mybase);

                 $orden1="SELECT * FROM  actura2 WHERE actura2.nofactura=01"; //.$nofactura;

                 $orden2="SELECT * FROM actura2 WHERE actura2.nofactura=01";


                 $paquete1=$consul->query($orden1);

                 $this->busca1=$paquete1;

                 $paquete2=$consul->query($orden2);

                 $this->busca2=$paquete2;

                 //cerramos la base
                 
                 mysqli_close($consul);




                 
	  }   




      function imagenb(){


             $imagen=("imagen/brito.png");

             $this->ima1=$imagen;


             return $this->ima1;


      }



 
	  	function consulta(){


	  		    $myhost=$this->hostname;
	  		    $myusuario=$this->usuario;
	  		    $myclave=$this->clave;
	  		    $mybase=$this->basedatos;
	  		                  
	  		    $consul = new mysqli($myhost, $myusuario, $myclave, $mybase);

            $orden1="SELECT * FROM  actura2";

            $paquete1=$consul->query($orden1);
             
  	             

	             $numregistros = $paquete1->num_rows;

            
            
  	            if($numregistros == 0) {

  	            	echo"No existen registros,,,VERIFIQUE";

  	            }

  	            else 

  	            {

                    
                    echo "<center><table border=1> <tr><td><b><font color='red'>NUMERO DE FACTURA</font></td> <td><b><font color='blue'>NOMBRE</font></b></td><td><b><font color='green'>CANTIDAD</b></td></tr>";

                                         
    	                while($row = mysqli_fetch_row($paquete1)){

    	                	
    	            	      echo "<br><tr><td>".$row[0]."</td>"."<td>".$row[1]."<td>".$row[2]."</td></tr>";

    	            	  

    	            	  }
      	
                    echo"</tr></table></center>";

                }

           

	  	}



      function ingreso($uno, $dos, $tres, $cuatro){


            $myhost=$this->hostname;
            $myusuario=$this->usuario;
            $myclave=$this->clave;
            $mybase=$this->basedatos;

            
            $dato1=$uno;
            $dato2=$dos;
            $dato3=$tres;
            $dato4=$cuatro;
            $fecha=date("Y-m-d");


            $abre = new mysqli($myhost, $myusuario, $myclave, $mybase);

            

            $buscat = $abre->query("SELECT  * FROM productos");

            $TOTAL_filas = mysqli_num_rows($buscat);



            
            
            //verifico antes de grabar algo en la bd, que este vacia.

            if($TOTAL_filas == 0){

               $codigo="C-01";

               $ingreso=$abre->query("insert into productos (imagen,nompro,categoria,precio,fecha,codigo_p) values ('$dato1','$dato2','$dato3','$dato4','$fecha','$codigo')");


            }


            else{

                $ultimo=$abre->query("SELECT * FROM productos ORDER by id DESC LIMIT 1");

                $row = mysqli_fetch_row($ultimo);

                


                //$ultimo=$abre->query("SELECT * FROM productos ORDER by id ASC LIMIT 1");

                //$row = mysqli_fetch_row($ultimo);

                //$row+;

                //$codigor = "C-".$row;

                $codigo=$row[0];

                ++$codigo;

                $codigo= "C-0".$codigo;


               $ingreso=$abre->query("insert into productos (imagen,nompro,categoria,precio,fecha,codigo_p) values ('$dato1','$dato2','$dato3','$dato4','$fecha','$codigo')");

            }





           // $ingreso=$abre->query("insert into productos (imagen,nompro,categoria,precio,fecha) values ('$dato1','$dato2','$dato3','$dato4','$fecha')");



      }




	  	function elimina($valor_a_eliminar){


	  		 $borra = new mysqli($this->hostname, $this->usuario, $this->clave, $this->basedatos);


         //$elimi = $borra->query("delete from actura2 where nofactura=".$valor_a_eliminar)



          //$borra->query("delete from actura2 where nofactura=".$valor_a_eliminar);

         $borra->query("delete from actura2 where nofactura=".$valor_a_eliminar);


         $Filasborradas=$borra->affected_rows;

                  


           if ($Filasborradas === 0){

              echo "no hay nada que borrar";
           }

          
           if ($Filasborradas === -1){

              echo "ha ocurrido un error, comuniquese con el dpt de informatica";
           }


           if ($Filasborradas > 0){

              echo "Informacion eliminada con exito";
           }





           mysqli_close($borra);



	  	}



	  	function mue(){

	  		

            echo "VALOR DEL LOCALHOST-->".$this->hostname;


	  	}





  	


  }


?>
