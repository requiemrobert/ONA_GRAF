
<h1><?= $titulo ?></h1>	

	<form id="registrar-orden">

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="tipo_materia">Tipo producto</label>
					<div class="select-group">
						<select class="select-col" name="tipo_producto" id="tipo_producto" class="valid" required>
		                        <option selected="selected" value="">Seleccione</option>
								<option value="ejecutiva">Ejecutiva</option>   
								<option value="gerencial">Gerencial</option> 
								<option value="perpetua">Perpétua</option> 
										                           
		                </select>
					</div>
			</div>

			<div class="input-group input-group-icon">
					<label for="email_cliente">Disponible en existencia</label>
					<input type="text" name="disponible" id="disponible" readonly>
			</div>

		</div>

		<div class="row-flex">
			<input class="btn center-btn btn-action btn-format-m" type="submit" id="registrar_stock" value="Registrar">
		</div>	
</form>