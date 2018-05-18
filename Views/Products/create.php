<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crear Producto</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="./js/create_product.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<?php 
		if(isset($result))
		{?>
			<form action="/products/update" method="post" accept-charset="utf-8">
			<input type="hidden" value="<?php echo $result['data']->getId();?>" id="field_id" name="field_id">	
		<?php
		}else{
			?>
			<form action="/products/save" method="post" accept-charset="utf-8">
		<?php
		}
	?>
		<div class="form-group">
			<label for="field_code" class="sr-only">Codigo</label>
			<?php 
			if(isset($result))
			{?>
				<input type="text" class="form-control" value="<?php echo $result['data']->getCode();?>" id="field_code" name="field_code" placeholder="Codigo">
			<?php
			}else{
				?>
				<input type="text" class="form-control" id="field_code" name="field_code" placeholder="Codigo">
			<?php
			}
			?>
			
		</div>
		<div class="form-group">
			<label for="field_name" class="sr-only">Nombre</label>
			<?php 
			if(isset($result))
			{?>
				<input type="text" class="form-control" value="<?php echo $result['data']->getName();?>" id="field_name" name="field_name" placeholder="Nombre">
			<?php
			}else{
				?>
				<input type="text" class="form-control" id="field_name" name="field_name" placeholder="Nombre">
			<?php
			}
			?>
			
		</div>
		<div class="form-group">
			<label for="field_description" class="sr-only">Descripción</label>
			<?php 
			if(isset($result))
			{?>
				<input type="text" class="form-control" value="<?php echo $result['data']->getDescription();?>" id="field_description" name="field_description" placeholder="Descripción">
			<?php
			}else{
				?>
				<input type="text" class="form-control" id="field_description" name="field_description" placeholder="Descripción">
			<?php
			}
			?>
			
		</div>
		<div class="form-group">
			<label for="field_date" class="sr-only">Fecha de salida al aire</label>
			<?php 
			if(isset($result))
			{?>
				<input type="text" class="form-control" value="<?php echo $result['data']->getDateOut();?>" id="field_date" name="field_date" placeholder="Fecha">
			<?php
			}else{
				?>
				<input type="text" class="form-control" id="field_date" name="field_date" placeholder="Fecha">
			<?php
			}
			?>
			
		</div>
		<div class="form-group">
			<label for="field_price" class="sr-only">Precio</label>
			<?php 
			if(isset($result))
			{?>
				<input type="text" class="form-control" value="<?php echo $result['data']->getPrice();?>" id="field_price" name="field_price" placeholder="Precio">
			<?php
			}else{
				?>
				<input type="text" class="form-control" id="field_price" name="field_price" placeholder="Precio">
			<?php
			}
			?>
			
		</div>
		<div class="form-group">
			<label for="field_currency" class="sr-only">Moneda</label>
			<?php 
			if(isset($result))
			{?>
				<select class="custom-select" id="field_currency" name="field_currency">
				    <option>Selecciona...</option>
				    <?php
				    foreach ($currencies["data"] as $key => $currency) {
			    	?>
			    		<option <?php if($result['data']->getCurrency()==$currency->getCurrencyId()){?> selected <?php }?> value="<?php echo $currency->getCurrencyId()?>"><?php echo $currency->getName()?></option>
			    	<?php
				    }
				    ?>
				</select>
			<?php
			}else{
				?>
				<select class="custom-select" id="field_currency" name="field_currency">
				    <option selected>Selecciona...</option>
				    <?php
				    foreach ($currencies["data"] as $key => $currency) {
			    	?>
			    		<option value="<?php echo $currency->getCurrencyId()?>"><?php echo $currency->getName()?></option>
			    	<?php
				    }
				    ?>
				</select>
			<?php
			}
			?>
			
		</div>
		<?php 
			if(isset($result))
			{?>
				<button type="submit" class="btn btn-primary">Actualizar</button>
			<?php
			}else{
				?>
				<button type="submit" class="btn btn-primary">Guardar</button>
			<?php
			}

		?>
		<a href="/products/list/table" class="btn btn-primary">Regresar a la Lista</a>
	</form>
</body>
</html>