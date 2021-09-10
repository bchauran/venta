<?php


    /*ESTABLESCO LA CONEXION CON LA BASE DE DATOS*/

 	include('base1.php');


    $cone = new base();

    $conecta=$cone->conecta();

?>




<!DOCTYPE html>
<html lang="es">

			<head>
			    <!-- <meta charset="UTF-8">
			    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			    <title>Verificar</title> -->

			      <script src="tabla/js/jquery.js"></script> 



                   
	           <!-- <script src="jquery.js"></script>   -->

	            <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  -->


	            


                  			

			  <link rel="stylesheet" type="text/css" href="datatable/css/jquery.dataTables.min.css"/>

			  <link rel="stylesheet" type="text/css" href="datatable/css/buttons.dataTables.min.css"/>



			  <script src="datatable/js/jquery.dataTables.min.js"></script> 

			  <script src="datatable/js/dataTables.buttons.min.js"></script>



			  <script src="datatable/js/jszip.min.js"></script>

			  <script src="datatable/js/pdfmake.min.js"></script>

			  <script src="datatable/js/vfs_fonts.js"></script>

			  <script src="datatable/js/buttons.html5.min.js"></script>



			  <script src="datatable/js/buttons.print.min.js"></script>

			              






			<link rel="stylesheet" href="awe/css/font-awesome.min.css">

			    <style>
			        #mitabla tfoot input {
			            width: 100% !important;
			        }

			        #mitabla tfoot {
			            display: table-header-group !important;
			        }
			    </style>




                <script>


                	  $(document).ready(function() {
                	  	$('#mitabla').DataTable( {



                              "language": {
									"url": "bootrap3/Spanish.json"
								},





                	  		dom: 'Bfrtip',

                	  		/*buttons: [


                	  		'copy', 'csv', 'excel', 'pdf', 'print'



                	  		]*/


                            

                	  		 buttons: [{

								        //Botón para Excel
								        extend: 'excel',
								        footer: true,
								        title: 'BRITO_ECXEL',
								        filename: 'BRITO_ECXEL',

								        //Aquí es donde generas el botón personalizado
								        text: '<button class="btn btn-success">Excel <i class="fas fa-file-excel"></i></button>'
								      },

								      //Botón para PDF
								      {
								        extend: 'pdf',
								        footer: true,
								        title: 'BRITO_PDF',
								        filename: 'BRITO_PDF',
								        text: '<button class="btn btn-danger">PDF <i class="far fa-file-pdf"></i></button>'
								      },

								      //Botón para csv
								      {
								        extend: 'csv',
								        footer: true,
								        title: 'BRITO_csv',
								        filename: 'BRITO_csv',
								        text: '<button class="btn btn-success">CSV <i class="far fa-file-pdf"></i></button>'
								      },


								      {
								        extend: 'copy',
								        footer: true,
								        title: 'BRITO_COPIAR',
								        filename: 'BRITO_COPIAR',
								        text: '<button class="btn btn-danger">COPIAR<i class="far fa-file-pdf"></i></button>'
								      }


						     ]


                             

                           



                	  	} );
                	  } );

					




               </script>



			  


			</head>


			<body>
			    <!-- Main container -->
			    <!-- <main class="full-box main-container"> -->
			    	

			    	<section class="full-box page-content">
			    		<nav class="full-box navbar-info">
			    			<a href="#" class="float-left show-nav-lateral">
			    				 <i class="fas fa-exchange-alt"></i> 
			    			</a>
			    			<a href="user-update.php">
			    				 <i class="fas fa-user-cog"></i> 
			    			</a>
			    			<a href="#" class="btn-exit-system">
			    				<!-- <i class="fas fa-power-off"></i> -->
			    			</a>
			    		</nav>
			    		<!-- Page header -->
			    		<div class="full-box page-header">
			    			<h3 class="text-left">
			    				<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Listado de Facturas
			    			</h3>
			    			
			    		</div>
			    		
			    		<!--CONTENT-->
			    		<!-- <div class="container-fluid"> -->

			    			
			    			<div class="table-responsive">
			    				


			    					<!-- <table class="records_list table table-bordered table-hover" id="mitabla"> -->

			    					<table id="mitabla" class="table table-striped table-bordered nowrap" style="width:100%">	


			    					<thead>
			    						<tr class="text-center roboto-medium">

			    							<th>CODIGO FACTURA</th>
			    							<th>CODIGO PRODUCTO</th>
			    							<th>FECHA</th>
			    							<th>ID</th>
			    							
			    						</tr>
			    					</thead>

			    					<tbody>

			    						<?php

			    						   $radiob=0;

			    						   $estatus="";



                                                        $query=mysqli_query($conecta,"select * from `factu`");

														while($row=mysqli_fetch_array($query)){
                                                          ++$radiob;
                                                   
                                                        
                                                            

															?>



                                                             <tr id="<?php echo $row[3];?>" class='text-center roboto-medium'>


																
																<td><?php echo $row[0]; ?></td>

																<td><?php echo $row[1]; ?></td>
																
																<td><?php echo $row[2]; ?></td>

																<td><?php echo $row[3]; ?></td>

																

																<?php include('button.php'); ?>
																

                                                                

															</tr>

															<?php




														}

                                                        //cierro la conexion con la Bd
                                                        mysqli_close($conecta);
							    	
							    	
							    	    ?>


							        </tbody>

							    </table>

						</div>

						

					</div>


				 </section> 


			    <!-- </main>
 -->





                       
					


                  
			    	
			   	
			
				
			</body>
</html>