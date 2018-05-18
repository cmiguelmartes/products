<?php
include_once (ROOTPATH.'/Models/Connect/Connect.php');
include_once (ROOTPATH.'/Interfaces/User/IUserModel.php');

class User implements IUserModel{

	private $userId;
	private $userName;
	private $password;

	private $SQL_INSERT = "insert into users(user_name,password) value (?,?)";
	private $SQL_UPDATE = "";
	private $SQL_DELETE = "";
	private $SQL_SELECT = "";
	private $SQL_VALIDATE = "select user_id,user_name,password from users where user_name = ? and password = ?";

	public function getUserId()
	{
		return $this->userId;
	}

	public function getUserName()
	{
		return $this->userName;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setUserId($userId)
	{
		return $this->userId = $userId;
	}

	public function setUserName($userName)
	{
		return $this->userName = $userName;
	}

	public function setPassword($password)
	{
		return $this->password = $password;
	}


	public function save()
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_INSERT);
			$stmt->bind_param("ss", $this->getUserName(), hash('md5', $this->getPassword()));
			$stmt->execute();
			$stmt->close();
			$conn->close();
			return array("error"=>false,"message"=>"success");
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function update()
	{

	}

	public function delete()
	{

	}

	public function getAll()
	{

	}

	public function getByUserId()
	{

	}

	public function getByUserName()
	{

	}

	public function validateUser()
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_VALIDATE);
			$stmt->bind_param("ss", $this->getUserName(), hash('md5', $this->getPassword()));
			$stmt->execute();
			$stmt->bind_result($user_id,$user_name,$password);
			while ($stmt->fetch()) {
				$this->setUserId($user_id);
				$this->setUserName($user_name);
				$this->setPassword($password);
            }
   			$stmt->close();
			$conn->close();
			return array("error"=>false,"message"=>"success","data"=>array("id"=>$this->getUserId(),"username"=>$this->getUserName()));
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

}