<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lista de Productos</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<script src="../js/main.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

	<a href="/products/create" class="btn btn-primary">Nuevo Producto</a>
	<label>Lista de Productos</label>
	<a href="/products/logout">Cerrar sesión</a>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Codigo</th>
				<th scope="col">Nombre</th>
				<th scope="col">Descripcion</th>
				<th scope="col">Fecha de Salida al Aire</th>
				<th scope="col">Precio</th>
				<th scope="col">Moneda</th>
			</tr>
		</thead>
		<tbody>
			<?php
			
			foreach ($aProducts["data"] as $key => $product) {
			?>
			<tr>
				<td scope="row"><?php echo $product->getCode();?></td>
				<td><?php echo $product->getName();?></td>
				<td><?php echo $product->getDescription();?></td>
				<td><?php echo $product->getDateOut();?></td>
				<td><?php echo $product->getPrice();?></td>
				<td><?php echo $product->getCurrency()->getName();?></td>
				<td><a href="/products/edit?id=<?php echo $product->getId();?>">Editar</a></td>
				<td><a  onclick="confirmDelete(<?php echo $product->getId();?>)">Borrar</a></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</body>
</html>