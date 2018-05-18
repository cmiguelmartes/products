<?php
include_once (ROOTPATH.'/Models/Connect/Connect.php');
include_once (ROOTPATH.'/Classes/Currency/Currency.php');

class CurrencyModel{
	private $SQL_SELECT_ALL = "select currency_id,name,symbol,code from currencies";

	public function getAll()
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_SELECT_ALL);
			$stmt->execute();
			$stmt->bind_result($currency_id,$name,$symbol,$code);
			$aCurrencies = array();
			while ($stmt->fetch()) {
				$currency = new Currency();
				$currency->setCurrencyId($currency_id); 
				$currency->setName($name); 
				$currency->setSymbol($symbol);
				$currency->setCode($code);
				$aCurrencies[] = $currency;
            }
			$stmt->close();
			$conn->close();
			return array("error"=>false,"message"=>"success","data"=>$aCurrencies);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}
}