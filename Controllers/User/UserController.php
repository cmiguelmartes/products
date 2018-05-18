<?php
include_once (ROOTPATH.'/Models/User/User.php');
class UserController{

	public function create($httpRequest)
	{
		try{
			$user = new User();
			$user->setUserName($httpRequest["lg_username"]);
			$user->setPassword($httpRequest["lg_password"]);
			return $user->save();
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function validate($httpRequest)
	{
		try{
			$user = new User();
			$user->setUserName($httpRequest["lg_username"]);
			$user->setPassword($httpRequest["lg_password"]);
			return $user->validateUser();
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

}