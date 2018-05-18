<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/main.css">
</head>
<body>
	<div class="text-center form_login_center">
		<form id="create-user" class="text-left" action="/products/save/user" method="POST">
				<div class="login-form-main-message"></div>
					<div class="form-group">
						<label for="lg_username" class="sr-only">Username</label>
						<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
					</div>
					<div class="form-group">
						<label for="lg_password" class="sr-only">Password</label>
						<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
					</div>
				<button type="submit" class="btn btn-primary">Guardar</button>
			</form>
	</div>
</body>
</html>