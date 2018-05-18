<?php
class Product{

	private $id;
	private $code;
	private $name;
	private $description;
	private $dateOut;
	private $price;
	private $currency;


	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function setCode($code)
	{
		$this->code = $code;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDateOut()
	{
		return $this->dateOut;
	}

	public function setDateOut($dateOut)
	{
		$this->dateOut = $dateOut;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getCurrency()
	{
		return $this->currency;
	}

	public function setCurrency($currency)
	{
		$this->currency = $currency;
	}

}