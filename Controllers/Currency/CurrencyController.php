<?php
include_once (ROOTPATH.'/Models/Currency/CurrencyModel.php');
class CurrencyController{
	public function getAll()
	{
		try{
			return (new CurrencyModel())->getAll();
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}
}