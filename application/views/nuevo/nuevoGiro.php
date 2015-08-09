<div class="col-md-10 col-md-offset-1 well well-sm">
	<form action="" class="form-vertical">
		<div class="form-group">
			<select id="SelectGiro" class="form-control">
				<option value="0">Elige un giro</option>
				<?php
				foreach ($opciones as $key => $opcion) {
					echo '<option value="'.$opcion["Giro"].'">'.$opcion["Giro"].'</option>';
				}
				?>
			</select>
		</div>
		<div class="col-md-12">
		    <div class="embed-responsive embed-responsive-16by9">
		        <div id="canvasGiro" class="embed-responsive-item"></div>
		    </div>
		</div>
	</form>
</div>