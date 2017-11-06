
<section class="main">
		
		<h1><?= $titulo ?></h1>	
		
		<form id="registrar-cliente">
			
			<fieldset>
			<legend>Datos</legend>
				
				<div class="row">
					
					<div class="col col-quarter">
						<div class="content">
							<label for="nombre_cliente">*Nombre</label>
						 	<input type="text" name="nombre_cliente" id="nombre_cliente" required>
						</div>
					</div>

					<div class="col col-quarter">
						<div class="content">
							<label for="apellido_cliente">Apellido</label>
						 	<input type="text" name="apellido_cliente" id="apellido_cliente">
						</div>
					</div>

					<div class="col col-quarter">
						<div class="content">
							<label for="ci_cliente">*Documento de Identidad</label>
							<select name="pre_doc_cliente" id="pre_doc_cliente" onchange="changeValueL(this);" class="valid">
			                        <option selected="selected" value="V">V</option>
									<option value="E">E</option>   
									<option value="J">J</option> 
									<option value="G">G</option> 
											                           
			                </select>
			                <input name="doc_cliente" id="doc_cliente" type="text" maxlength="8" value="" onpaste="return alpha(event)" onkeypress="return alpha(event)" required>
						</div>
					</div>

				</div>

				<div class="row">
					
					<div class="col col-quarter">
						<div class="content">
							<label for="rason_social_cliente">Nombre Razon Social</label>
						 	<input type="text" name="rason_social_cliente" id="rason_social_cliente">
						</div>
					</div>

					<div class="col col-half">
                       <div class="content">
                       		<label for="direccion_cliente">Direccion</label>
						 	<textarea rows="4" cols="50" id="direccion_cliente" name="direccion_cliente" class="text-area-direccion"></textarea>
                       </div>
                	</div>
					
				</div>

				<div class="row">
					
					<div class="col col-half">
                       <div class="content">
                       		<label for="direccion_cliente">*Telefonos</label>
						 	<input type="tel" name="telf_cliente" id="telf_cliente" required>
						 	<label for="direccion_cliente">+Telefonos</label>
						 	<input type="tel" name="otro_telf_cliente" id="otro_telf_cliente">
                       </div>
                	</div>

                	<div class="col col-quarter">
						<div class="content">
							<label for="email_cliente">*Email</label>
						 	<input type="email" name="email_cliente" id="email_cliente" required>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col col-quarter">
						<div class="content">
							<label for="tipo_cliente">Tipo Cliente</label>
						 	<input type="text" name="tipo_cliente" id="tipo_cliente">
						</div>
					</div>
				</div>

			</fieldset>

			<input type="submit" id="sub_registrar_cliente" value="Registrar">
		</form>

	
</section>