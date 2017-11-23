
<h1><?= $titulo ?></h1>	

	<form id="registrar-stock_mp">

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="tipo_materia">Tipo Materia Prima</label>
					<div class="select-group">
						<select class="select-col" name="tipo_materia" id="tipo_materia" class="valid" required>
		                        <option selected="selected" value="">Seleccione</option>
								<option value="1">Rollo de semi cuero</option>   
								<option value="2">Cartón calibre de un kilo</option> 
								<option value="3">Goma espuma</option> 
								<option value="3">Resma de papel bond 20</option>
										                           
		                </select>
					</div>
			</div>

			<div class="input-group input-group-icon">
					<label for="email_cliente">Tipo Materia Prima</label>
					<div class="select-group">
						<select class="select-col" name="tipo_actividad" id="tipo_actividad" class="valid" required>
		                        <option selected="selected" value="">Seleccione</option>
								<option value="100">100 mts</option>   
								<option value="50">50 mts</option> 
								<option value="20">20 mts</option> 
										                           
		                </select>
					</div>
			</div>

			<div class="input-group input-group-icon">
					<label for="rason_social_cliente">Precio</label>
				 	<input type="text" name="rason_social_cliente" id="rason_social_cliente">
			</div>

		</div>

		<div class="row-flex">
			<input class="btn center-btn btn-action btn-format-m" type="submit" id="registrar_stock" value="Registrar">
		</div>	
</form>