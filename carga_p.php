<html lang="es">

	<head>

		
	</head>

	<body>
             
         

       <!--<div class="container">

		<div id="cabecera" class="row"> -->
       
		 <div class="col-sm-6">
        
            <b>ELIJE FOTO DEL PRODUCTO:</b> <input name="archivo" id="archivo" type="file"/>

            <br>

              <img src="icon/cart-arrow-down.svg" alt="carrito" height="50px" width="60px"/>

            <br>
              
            <b>NOMBRE PRODUCTO<input type="text" class="form-control input-sm" name="nomp" id="npro" required="true" placeholder="NOMBRE DEL PRODUCTO"></b>

            <br>

            <!--<b>CATEGORIA DEL PRODUCTO<input type="text" class="form-control input-sm" name="cate" id="cate" required="true" placeholder="CATEGORIA DEL PRODUCTO"></b>-->

            
            <select>
              <option name="cate" id="cate"  data-icon="fa fa-fw fa-angellist">TODOS</option>

			  <option data-icon="fa fa-fw fa-magic">COCINA</option>
			  <option>BAÑO</option>
			  <option>LENCERIA</option>
			  
			</select> 

			<br><br><br>


			 <select class="selectpicker">
			  <option data-icon="fa fa-fw fa-magic">Ketchup</option>
			  <option data-icon="fa fa-fw fa-angellist">BAÑO</option>
			  <option data-icon="fa fa-fw fa-angellist">LENCERIA</option>
			 </select>


			 <select title="ELIJE ..." class="selectpicker">
			  <option>ELIGE...</option>
			  <option data-icon="glyphicon glyphicon-eye-open" data-subtext="petrification">OJOS DE MEDUZA</option>
			  <option data-icon="glyphicon glyphicon-fire" data-subtext="area damage">LLUVIA DE FUEGO</option>
			 </select>




            <br> 

            <b>PRECIO DEL PRODUCTO<input type="text" class="form-control input-sm" name="precio" id="precio" required="true" placeholder="COSTO DEL PRODUCTO"></b>

         			
			<!--<input type="submit" name="subir" value="subir imagen"/>-->

			<br>

            

             

			<br>

			<button id="subir"><b>aceptar</b></button>

		</div>	


			

	        <div class="col-sm-5" id = muestra-datos style="margin-left: 2em; padding-top: 4em;">
	          	

	        </div>

            

        <!--</div>

       </div>-->
			

	</body>

		<!--<script src="jquery.js"></script>

        <script src="scripts.js"></script>-->

</html>