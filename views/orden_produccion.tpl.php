
<h1><?= $titulo ?></h1>	

	<form id="registrar-orden">

		<div class="row-flex">

			<div class="input-group input-group-icon">
					<label for="tipo_materia">Tipo producto</label>
								
					<select class="js-example-basic-single" name="tipo_producto" id="tipo_producto" class="valid" required>
		                        <option selected="selected" value="">Seleccione</option>
								<option value="ejecutiva">Ejecutiva</option>   
								<option value="gerencial">Gerencial</option> 
								<option value="perpetua">Perpétua</option> 
										                           
		            </select>
					
			</div>

			<div class="input-group input-group-icon">
					<label for="rollo_disponible">Rollos Semi Cuero Mts</label>
					<input type="text" name="rollo_disponible" id="rollo_disponible" disabled>
			</div>

			<div class="input-group input-group-icon">
					<label for="carton_disponible">Cartón unidades 100cm X 70 cm</label>
					<input type="text" name="carton_disponible" id="carton_disponible" disabled>
			</div>

			<div class="input-group input-group-icon">
					<label for="goma_disponible">Goma unidades 100cm X 70cm</label>
					<input type="text" name="goma_disponible" id="goma_disponible" disabled>
			</div>

			

		</div>

		<div class="row-flex">
			<div class="input-group input-group-icon"></div>
			<div class="input-group input-group-icon">
					<label for="resma_disponible">Resma Papel 66cm X 96cm</label>
					<input type="text" name="resma_disponible" id="resma_disponible" disabled>
			</div>
			<div class="input-group input-group-icon"></div>
			<div class="input-group input-group-icon"></div>
		</div>	

		<div class="row-flex" style="margin-top: 3em;">
			<div class="input-group input-group-icon">
				<label for="resma_disponible">Cantidad Maximas de Agendas</label>
				<input type="text" name="cantidad_unidades" id="cantidad_unidades" onpaste="return alpha(event)" onkeypress="return number(event, this)" maxlength="5" value="0" required readonly>
			</div>
			<div class="input-group input-group-icon">
				<label for="resma_disponible">Cantidad restante Rollos mts</label>
				<input type="text" name="resto_rollo" id="resto_rollo" onpaste="return alpha(event)" onkeypress="return number(event, this)" maxlength="5" value="0" required readonly>
			</div>
			<div class="input-group input-group-icon">
				<label for="resma_disponible">Cantidad restante Carton mts</label>
				<input type="text" name="resto_carton" id="resto_carton" onpaste="return alpha(event)" onkeypress="return number(event, this)" maxlength="5" value="0" required readonly>
			</div>
			<div class="input-group input-group-icon">
				<label for="resma_disponible">Cantidad restante Goma mts</label>
				<input type="text" name="resto_goma" id="resto_goma" onpaste="return alpha(event)" onkeypress="return number(event, this)" maxlength="5" value="0" required readonly>
			</div>
			
		</div>
		<div class="row-flex">
			<div class="input-group input-group-icon"></div>
			<div class="input-group input-group-icon">
				<label for="resma_disponible">Cantidad restante Papel mts</label>
				<input type="text" name="cantidad_unidades" id="cantidad_unidades" onpaste="return alpha(event)" onkeypress="return number(event, this)" maxlength="5" value="0" required readonly>
			</div>
			<div class="input-group input-group-icon"></div>
			<div class="input-group input-group-icon"></div>
		</div>
		<div class="row-flex">
			<input class="btn center-btn btn-action btn-format-m" type="button" id="calcular_unidades" value="Calcular Unidades">
		</div>	
</form>