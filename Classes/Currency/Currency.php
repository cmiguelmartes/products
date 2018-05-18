<?php
class Currency{
	private $currencyId;
	private $name;
	private $symbol;
	private $code;

	public function getCurrencyId()
	{
		return $this->currencyId;
	}

	public function setCurrencyId($currencyId)
	{
		$this->currencyId = $currencyId;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getSymbol()
	{
		return $this->symbol;
	}

	public function setSymbol($symbol)
	{
		$this->symbol = $symbol;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function setCode($code)
	{
		$this->code = $code;
	}
}