<div class="col-md-10 col-md-offset-1 well well-sm">
	<form action="" class="form-vertical">
		<div class="form-group">
			<select id="SelectGiros" class="form-control">
				<option value="0">Elige un giro</option>
				<?php
				foreach ($opciones as $key => $opcion) {
					echo '<option value="'.$opcion["Giro"].'">'.$opcion["Giro"].'</option>';
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