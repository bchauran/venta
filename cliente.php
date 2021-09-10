<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CLiente</title>


		<!-- ARCHIVOS BOOSTRAP 3 -->

		<link rel="stylesheet" href="bootrap3/css/bootstrap.min.css">
        <script src="jquery.js"></script> 

        <script src="cliente.js"></script>


	</head>

	<body>


		<form class="needs-validation" novalidate>

			<div class="form-row">
				<div class="col-md-4 mb-3">
					<label for="validationCustom01">ID CLIENTE</label>
					<input type="text" class="form-control" id="idcli" placeholder="ID CLIENTE"  required>
					
				</div>
				<div class="col-md-4 mb-3">
					<label for="validationCustom02">Nombre</label>
					<input type="text" class="form-control" id="nom" placeholder="Nombre"  required>
					
				</div>
				<div class="col-md-4 mb-3">
					<label for="validationCustomUsername">Direccion</label>
					<div class="input-group">
						
						<input type="text" class="form-control" id="direccion" placeholder="direccion" aria-describedby="inputGroupPrepend" required>
						
					</div>
				</div>
			</div>

			<div class="form-row">

				<div class="col-md-6 mb-3">
					<label for="validationCustom03">Telefono</label>
					<input type="text" class="form-control" id="telefono" placeholder="Telefono" required>
					<div class="invalid-feedback">
						Por favor ingrese un telef valido.
					</div>
				</div>

				<div class="col-md-3 mb-3">
					<label for="validationCustom04">Otros</label>
					<input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
					
				</div>

				

			</div>



			<div class="hola" id="hola">
				


			</div>


			
			<div class="form-row">

			  <div class="col-md-12 mb-12">	

				<center><button class="btn btn-primary" type="submit">ACEPTAR</button></center>

			  </div>	

			</div>

		</form>
		
	</body>


</html>