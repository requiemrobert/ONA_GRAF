
<h1><?= $titulo ?></h1>	

	<form id="registrar-cliente">

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="nombre_cliente">*Nombre</label>
				 	<input type="text" name="nombre_cliente" id="nombre_cliente" required>
			</div>

			<div class="input-group input-group-icon">
					<label for="apellido_cliente">Apellido</label>
				 	<input type="text" name="apellido_cliente" id="apellido_cliente">
			</div>

		</div>

		<div class="row-flex">
			<div class="input-group input-group-icon">
				<label for="ci_cliente">*Documento de Identidad</label>
				<div class="select-group">
					<select class="select-1" name="pre_doc_cliente" id="pre_doc_cliente" onchange="changeValueL(this);" class="valid">
	                        <option selected="selected" value="V">V</option>
							<option value="E">E</option>   
							<option value="J">J</option> 
							<option value="G">G</option> 
									                           
	                </select>
	                <input class="input-select" name="doc_cliente" id="doc_cliente" type="text" maxlength="8" value="" onpaste="return alpha(event)" onkeypress="return alpha(event)" required>
				</div>
			</div>

			<div class="input-group input-group-icon">
					<label for="email_cliente">*Email</label>
				 	<input type="tel" name="email_cliente" id="email_cliente" required>
			</div>

	    </div>

		<div class="row-flex">
			
			<div class="input-group input-group-icon">
					<label for="rason_social_cliente">Nombre Razon Social</label>
				 	<input type="text" name="rason_social_cliente" id="rason_social_cliente">
			</div>

			<div class="input-group input-group-icon">
					<label for="direccion_cliente">Direccion</label>
				 	<input type="text" name="direccion_cliente" id="direccion_cliente">
			</div>
			
		</div>

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="telf_cliente">*Telefonos</label>
				 	<input type="tel" name="telf_cliente" id="telf_cliente" required>
				 	<label for="otro_telf_cliente">+Telefonos</label>
				 	<input type="tel" name="otro_telf_cliente" id="otro_telf_cliente">
			</div>

			<div class="input-group input-group-icon">
					<label for="email_cliente">*Tipo Cliente</label>
				 	<input type="tel" name="tipo_cliente" id="tipo_cliente" required>
			</div>

		</div>

	<input class="btn registrar-btn" type="submit" id="sub_registrar_cliente" value="Registrar">

</form>