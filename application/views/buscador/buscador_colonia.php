<div class="col-md-10 col-md-offset-1 well well-sm">
	<form action="" class="form-vertical">
		<div class="form-group">
			<select id="SelectColonia" class="form-control">
				<option value="0">Elige una colonia</option>
				<?php
				foreach ($opciones as $key => $opcion) {
					echo '<option value="'.$opcion["Colonia"].'">'.$opcion["Colonia"].'</option>';
				}
				?>
			</select>
		</div>
		<!--
		<div class="form-group">
			<button class="btn btn-primary" id="buscarNombre">Buscar</button>
		</div>
		-->
	</form>
</div>