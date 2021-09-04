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




                  			

			<!-- INICIO BOOSTRAP -->


			    <link rel="stylesheet" href="bootrap3/boost/bootstrap.min.css">
			    <link rel="stylesheet" href="bootrap3/boost/dataTables.bootstrap.min.css">

			    <link rel="stylesheet" href="bootrap3/boost/buttons.bootstrap.min.css">




			<!--FIN BOOSTRAP-->   

                
                
                

				<script src="bootrap3/jsx/jquery.dataTables.min.js"></script>

				<script src="bootrap3/jsx/dataTables.bootstrap.min.js"></script>

				






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

	               	/*$(document).ready(function () {


	               		$('#mitabla').DataTable({"language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},

	               			"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "TODOS"]],

                              "dom": 'B<"float-left"i><"float-right"f>t<"float-left"l><"float-right"p><"clearfix">',

			            buttons: [
			                'copyHtml5',
			                'excelHtml5',
			                'csvHtml5',
			                'pdfHtml5'
			            ]

                        
	            		});




	               		$('.dataTables_length').addClass('bs-select');


	               	 });
                    */

	               /*	$(document).ready(function() {*/

	               		

	               		/*$('#mitabla').DataTable();*/


/*
	               		var table = $('#mitabla').DataTable( {
	               			lengthChange: false,
	               			buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
	               		} );

	               		table.buttons().container()
	               		.appendTo( '#mitabla_wrapper .col-sm-6:eq(0)' );
*/


						$(document).ready(function() {

							$('#mitabla').dataTable( {
								"language": {
									"url": "bootrap3/Spanish.json"
								},

								

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