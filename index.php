<?php
define('ROOTPATH', __DIR__);
session_start();
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$_SERVER['REQUEST_URI'] = $uri_parts[0];
if ($_SERVER['REQUEST_URI'] == '/products/createuser') {
    include './Views/User/CreateUser.php';
} elseif ($_SERVER['REQUEST_URI'] == '/products/save/user') {
	include_once ('./Controllers/User/UserController.php');
    $userController = new UserController();
    $result = $userController->create($_POST);
    if($result["error"])
    {
		include './Views/Error/error.php';
    }else{
    	include './Views/login.php';
    }
} elseif ($_SERVER['REQUEST_URI'] == '/products/login/user') {
	include_once ('./Controllers/User/UserController.php');
    $userController = new UserController();
    $result = $userController->validate($_POST);
    if($result["error"])
    {
		include './Views/Error/error.php';
    }else{
    	$_SESSION['username_products'] = $_POST["lg_username"];
    	header('Location: /products/list/table');
    }
}elseif ($_SERVER['REQUEST_URI'] == '/products/notfound') {
	include './Views/notfound.php';
}elseif ($_SERVER['REQUEST_URI'] == '/products/logout') {
	session_destroy();
	header('Location: /products/login');
}elseif ($_SERVER['REQUEST_URI'] == '/products/list/table') {
	if(isset($_SESSION['username_products']))
	{
		if(!is_null($_SESSION['username_products']))
		{
			include_once (ROOTPATH.'/Controllers/Product/ProductController.php');
			$aProducts = (new ProductController())->getAll();
			include './Views/Products/List.php';		
		}else{
			header('Location: /products/login');
		}
	}else{
		header('Location: /products/login');
	}
}elseif ($_SERVER['REQUEST_URI'] == '/products/delete') {
	if(isset($_SESSION['username_products']))
	{
		if(!is_null($_SESSION['username_products']))
		{
			include_once (ROOTPATH.'/Controllers/Product/ProductController.php');
			$result = (new ProductController())->delete($_GET);
			if($result["error"])
		    {
				include './Views/Error/error.php';
		    }else{
		    	header('Location: /products/list/table');
		    }		
		}else{
			header('Location: /products/login');
		}
	}else{
		header('Location: /products/login');
	}
}elseif ($_SERVER['REQUEST_URI'] == '/products/login') {
	include './Views/login.php';
}elseif ($_SERVER['REQUEST_URI'] == '/products/create') {
	if(isset($_SESSION['username_products']))
	{
		if(!is_null($_SESSION['username_products']))
		{
			include_once (ROOTPATH.'/Controllers/Currency/CurrencyController.php');
			$currencies = (new CurrencyController())->getAll();
			include './Views/Products/create.php';		
		}else{
			header('Location: /products/login');
		}
	}else{
		header('Location: /products/login');
	}
}elseif ($_SERVER['REQUEST_URI'] == '/products/edit') {
	
    if(isset($_SESSION['username_products']))
	{
		if(!is_null($_SESSION['username_products']))
		{
			include_once (ROOTPATH.'/Controllers/Product/ProductController.php');
			include_once (ROOTPATH.'/Controllers/Currency/CurrencyController.php');
			$result = (new ProductController())->getProductById($_GET["id"]);
		    if($result["error"])
		    {
				include './Views/Error/error.php';
		    }else{
		    	$currencies = (new CurrencyController())->getAll();
				include './Views/Products/create.php';
		    }		
		}else{
			header('Location: /products/login');
		}
	}else{
		header('Location: /products/login');
	}
}elseif ($_SERVER['REQUEST_URI'] == '/products/save') {
	if(isset($_SESSION['username_products']))
	{
		if(!is_null($_SESSION['username_products']))
		{
			include_once (ROOTPATH.'/Controllers/Product/ProductController.php');
			$result = (new ProductController())->create($_POST);
		    if($result["error"])
		    {
				include './Views/Error/error.php';
		    }else{
		    	header('Location: /products/list/table');
		    }		
		}else{
			header('Location: /products/login');
		}
	}else{
		header('Location: /products/login');
	}
}elseif ($_SERVER['REQUEST_URI'] == '/products/update') {
	if(isset($_SESSION['username_products']))
	{
		if(!is_null($_SESSION['username_products']))
		{
			include_once (ROOTPATH.'/Controllers/Product/ProductController.php');
			$result = (new ProductController())->update($_POST);
		    if($result["error"])
		    {
				include './Views/Error/error.php';
		    }else{
		    	header('Location: /products/list/table');
		    }		
		}else{
			header('Location: /products/login');
		}
	}else{
		header('Location: /products/login');
	}
	
}elseif ($_SERVER['REQUEST_URI'] == '/products/json/list') {
	
	include_once (ROOTPATH.'/Controllers/Product/ProductController.php');
	$result = (new ProductController())->getAllJson();
    if($result["error"])
    {
		include './Views/Error/error.php';
    }else{

    	header('Content-Type: application/json');
		echo $result["data"];
    }		
	
	
}else {
    header('Location: /products/notfound');
}
