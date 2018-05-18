<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="text-center form_login_center" style="padding:50px 0">
		<div class="logo">Productos</div>
		<div>
			<form id="login-form" class="text-left" action="/products/login/user" method="POST">
				<div class="login-form-main-message"></div>
				<div class="main-login-form">
					<div class="login-group">
						<div class="form-group">
							<label for="lg_username" class="sr-only">Username</label>
							<input type="text" class="form-control" id="lg_username" name="lg_username" placeholder="username">
						</div>
						<div class="form-group">
							<label for="lg_password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="lg_password" name="lg_password" placeholder="password">
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>