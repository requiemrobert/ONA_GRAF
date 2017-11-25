
<section class="main">

		<h1><?= $titulo ?></h1>

		<div class="content-table">

			<table id="table-consulta-stock-mp" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		            	<th>id_stock</th>
		                <th>tipo_material</th>
		                <th>cantidad_material</th>
		                <th>unidades</th>
		                <th>precio</th>
		                <th>fecha_registro</th>
		                <th>descripcion</th>
		                <th></th>
		            </tr>
		        </thead>
		
		        <tbody>
		        </tbody>
		    </table>    

		</div>

		<div id="alert_message"></div>

		<!-- The Modal -->
		<div id="data-update" class="modal">
			  <!-- Modal content -->
			  <div class="modal-content">

			  	<div class="modal-header">
			        <h3 class="modal-title">Editar</h3>
			        <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
			          <span>&times;</span>
			        </button>
			    </div>

			    <div class="modal-body">
	         							


	         		<form id="registrar-stock_mp">

	         				<input type="hidden" name="id_stock" id="id_stock">

							<div class="row-flex">

								<div class="input-group input-group-icon">
										<label for="tipo_materia">Tipo Materia Prima</label>
										<div class="select-group">
											<select class="select-col" name="tipo_material" id="tipo_material" class="valid" required>
							                        <option selected="selected" value="">Seleccione</option>
													<option value="rollo">Rollo de semi cuero</option>   
													<option value="carton">Cartón calibre de un kilo</option> 
													<option value="goma">Goma espuma</option> 
													<option value="resma">Resma de papel bond 20</option>
															                           
							                </select>
										</div>
								</div>

								<div class="input-group input-group-icon">
										<label for="email_cliente">Medidas</label>
										<div class="select-group">
											<select class="select-col" name="cantidad_material" id="cantidad_material" class="valid" required>
							                        <option selected="selected" value="">Seleccione</option>			                           
							                </select>
										</div>
								</div>

								<div class="input-group input-group-icon">
										<label for="unidades">Unidades</label>
										<input type="number" min="1" max="100" name="unidades" id="unidades">
								</div>


								<div class="input-group input-group-icon">
										<label for="precio">Precio</label>
									 	<input type="text" name="precio" id="precio">
								</div>

							</div>

							<div class="row-flex">

								<div class="input-group input-group-icon">
									<label for="fecha_registro">Fecha de Registro de Compra</label>
									<input type="date" name="fecha_registro" id="fecha_registro" value="<?= date('Y-m-d'); ?>" min="2017-10-01" data-date-format="DD MMMM YYYY">
								</div>

								<div class="input-group input-group-icon">
										<label for="descripcion">Descripción</label>
									 	<input type="text" name="descripcion" id="descripcion">
								</div>

							</div>	

					</form>

      			</div>
			    
			    <div class="modal-footer">
			        <button type="button" id="guardar-cambios" class="button btn-primary">Guardar Cambios</button>
			        <button type="button" class="button btn-secondary close" data-dismiss="modal">Cerrar</button>
			    </div>
			   
			  </div>
		</div>
		<!-- END MODAL -->

		<!-- The Modal Mensaje Delete-->
		<div id="data-delete" class="modal">
			  <!-- Modal content -->
			  <div class="modal-content">
			  		<div class="modal-header">
				        <h3 class="modal-title">Editar</h3>
				        <button type="button" class="btn-close close" data-dismiss="modal" aria-label="Close">
				          <span>&times;</span>
				        </button>
			   		</div>

			   		<div class="modal-body">
	         			<form method="POST" id="form-delete">
	         				
	         			    <div class="row-flex">

								<p>Usted está segura que desea eliminar el registro <span id="info-stock"></span>?</p>
								<input type="hidden" name="id_stock_delete" id="id_stock_delete">
							</div>

	         			</form>
         			</div>

         			<div class="modal-footer">
			       		<button type="button" id="delete-stock" class="button btn-delete">Eliminar</button>
			        	<button type="button" class="button btn-secondary close" data-dismiss="modal">Cerrar</button>
			    	</div>	
			  </div>	
		
		</div>	

</section>
