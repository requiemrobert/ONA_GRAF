
<section class="main">

		<h1><?= $titulo ?></h1>

		<div class="content-table">

			<table id="table-consulta-cliente" class="table table-striped table-bordered" cellspacing="0" width="100%">
		        <thead>
		            <tr>
		                <th>nombre</th>
		                <th>apellido</th>
		                <th>documento</th>
		                <th>telefono</th>
		                <th>otro_tefl</th>
		                <th>email</th>
		                <th>tipo_cliente</th>
		                <th>rason_social</th>	
		                <th>direccion</th>
		                <th></th>
		            </tr>
		        </thead>
		
		        <tbody>
		        </tbody>
		    </table>    

		</div>

		<div id="alert_message"></div>

		<!-- Trigger/Open The Modal -->
		<button id="open">Open Modal</button>

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
         			<form method="POST" id="form-editar">

			    		<div class="row-flex">

							<div class="input-group input-group-icon">
									<label for="nombre_cliente">*Nombre</label>
								 	<input type="text" name="nombre_cliente" id="nombre_cliente" letter="true">
							</div>

							<div class="input-group input-group-icon">
									<label for="apellido_cliente">*Apellido</label>
								 	<input type="text" name="apellido_cliente" id="apellido_cliente" letter="true">
							</div>

						</div>

						<div class="row-flex">
							<div class="input-group input-group-icon">
								<label for="ci_cliente">*Documento de Identidad</label>
								<div class="select-group">
									<select class="select-1" name="pre_doc_cliente" id="pre_doc_cliente" onchange="changeValueL(this);" class="valid" required>
					                        <option selected="selected" value="V">V</option>
											<option value="E">E</option>   
											<option value="J">J</option> 
											<option value="G">G</option> 
													                           
					                </select>
					                <input class="input-select" name="new_doc_cliente" id="new_doc_cliente" type="text" maxlength="8" value="" onpaste="return alpha(event)" onkeypress="return number(event)" required>
					                <input name="doc_cliente" id="doc_cliente" type="hidden">
								</div>
							</div>

							<div class="input-group input-group-icon">
									<label for="email_cliente">*Email</label>
								 	<input type="email" name="email_cliente" id="email_cliente" email="true">
							</div>

					    </div>

						<div class="row-flex">
							
							<div class="input-group input-group-icon">
									<label for="rason_social_cliente">Nombre Razon Social</label>
								 	<input type="text" name="rason_social_cliente" id="rason_social_cliente">
							</div>

							<div class="input-group input-group-icon">
									<label for="direccion_cliente">*Direccion</label>
								 	<input type="text" name="direccion_cliente" id="direccion_cliente" required>
							</div>
							
						</div>

						<div class="row-flex">

							<div class="input-group input-group-icon">
									<label for="telf_cliente">*Telefonos</label>
								 	<input type="tel" name="telf_cliente" id="telf_cliente" onpaste="return alpha(event)" onkeypress="return number(event)" required>
							</div>

							<div class="input-group input-group-icon">
									<label for="otro_telf_cliente">+Telefonos</label>
								 	<input type="tel" name="otro_telf_cliente" id="otro_telf_cliente" onpaste="return alpha(event)" onkeypress="return number(event)">
							</div>

						</div>

						<div class="row-flex">
							<div class="input-group input-group-icon">
									<label for="email_cliente">*Tipo Cliente</label>
									<input type="tel" name="tipo_cliente" id="tipo_cliente" required>
							</div>	
							<div class="input-group input-group-icon"></div>	
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

								<p>Usted está segura que desea eliminar el registro <span id="doc-detele"></span>?</p>
								<input type="hidden" name="documento-delete" id="documento-delete">
							</div>

	         			</form>
         			</div>

         			<div class="modal-footer">
			       		<button type="button" id="delete-cliente" class="button btn-delete">Eliminar</button>
			        	<button type="button" class="button btn-secondary close" data-dismiss="modal">Cerrar</button>
			    	</div>	
			  </div>	
		
		</div>	

</section>
