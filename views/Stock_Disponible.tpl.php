
<h1><?= $titulo ?></h1>	

	<form id="registrar-cliente">

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
	                <input class="input-select" name="doc_cliente" id="doc_cliente" type="text" maxlength="8" value="" onpaste="return alpha(event)" onkeypress="return number(event)" required>
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

			<div class="input-group input-group-icon">
					<label for="email_cliente">Tipo Actividad</label>
					<div class="select-group">
						<select class="select-col" name="tipo_actividad" id="tipo_actividad" class="valid" required>
		                        <option selected="selected" value="">Seleccione</option>
								<option value="1">Transporte y almacenamiento</option>   
								<option value="2">Actividades inmobiliarias</option> 
								<option value="3">Editoriales</option> 
								<option value="3">Imprenta y encuadernación</option>
								<option value="3">Fabricación de papel y cartón</option>
								<option value="3">Construcción y reparación de motores eléctricos</option>
								<option value="3">Reparación e instalación de maquinaria y equipo</option> 	
										                           
		                </select>
					</div>
			</div>

		</div>	

		<div class="row-flex">
			<input class="btn center-btn btn-action btn-format-m" type="submit" id="registrar_cliente" value="Registrar">
		</div>	
</form>