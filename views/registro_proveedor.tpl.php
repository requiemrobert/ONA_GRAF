
<h1><?= $titulo ?></h1>	

	<form id="registrar-proveedor">

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="razon_social_proveedor">Nombre Razon Social</label>
				 	<input type="text" name="razon_social_proveedor" id="razon_social_proveedor" required>
			</div>

			<div class="input-group input-group-icon">
				<label for="ci_cliente">*Documento de Identidad</label>
				<div class="select-group">
					<select class="select-1" name="pre_rif" id="pre_rif" onchange="changeValueL(this);" class="valid" required>
	                        <option selected="selected" value="V">V</option>
							<option value="E">E</option>   
							<option value="J">J</option> 
							<option value="G">G</option> 
									                           
	                </select>
	                <input class="input-select" name="rif" id="rif" type="text" maxlength="8" value="" onpaste="return alpha(event)" onkeypress="return number(event)" required>
				</div>
			</div>

		</div>

		<div class="row-flex">
			
			<div class="input-group input-group-icon">
					<label for="nombre_cliente">*Nombre Contacto</label>
				 	<input type="text" name="nombre_contacto" id="nombre_contacto" letter="true">
			</div>

			<div class="input-group input-group-icon">
					<label for="telf_cliente">*Telefonos</label>
				 	<input type="tel" name="telf" id="telf" onpaste="return alpha(event)" onkeypress="return number(event)" required>
			</div>

	    </div>

		<div class="row-flex">

			<div class="input-group input-group-icon">	 	
				 	<label for="otro_telf_cliente">+Telefonos</label>
				 	<input type="tel" name="otro_telf" id="otro_telf" onpaste="return alpha(event)" onkeypress="return number(event)">
			</div>
			
			<div class="input-group input-group-icon">
					<label for="email">*Email</label>
				 	<input type="email" name="email" id="email" email="true">
			</div>
			
		</div>

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="direccion_cliente">*Direccion</label>
				 	<input type="text" name="direccion" id="direccion" required>
			</div>	

			<div class="input-group input-group-icon"></div>

		</div>

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="email_cliente">*Tipo Proveedor</label>
				 	<input type="tel" name="tipo_proveedor" id="tipo_proveedor" required>
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
			<input class="btn center-btn btn-action btn-format-m" type="submit" id="registrar_proveedor" value="Registrar">
		</div>	
</form>