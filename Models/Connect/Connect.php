<?php
class Connect{
	private $host ="localhost";
    private $username = "root";
    private $password = "admin";
    private $database = "products";
    private $con = null;

    public function connect()
    {
    	if($this->con != null)
    	{
    		return $this->con;
    	}else{
    		return $this->con = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die('Error connecting to DB');        	
    	}
        
    }

    public function close()
    {
        return mysqli_close($this->con);
    }
}