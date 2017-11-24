
<h1><?= $titulo ?></h1>	

	<form id="registrar-stock_mp">

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

		<div class="row-flex">
			<input class="btn center-btn btn-action btn-format-m" type="submit" id="registrar_stock" value="Registrar">
		</div>	
</form>