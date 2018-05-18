<?php
include_once (ROOTPATH.'/Models/Product/ProductModel.php');
include_once (ROOTPATH.'/Classes/Product/Product.php');

class ProductController{
	public function create($httpRequest)
	{
		try{
			$product = new Product();
			$product->setCode($httpRequest["field_code"]); 
			$product->setName($httpRequest["field_name"]);
			$product->setDescription($httpRequest["field_description"]);
			$product->setDateOut((new DateTime())->format('Y-m-d h:i:s'));
			$product->setPrice($httpRequest["field_price"]);
			$product->setCurrency($httpRequest["field_currency"]);
			return (new ProductModel())->save($product);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function update($httpRequest)
	{
		try{
			$product = new Product();
			$product->setId($httpRequest["field_id"]);
			$product->setCode($httpRequest["field_code"]);
			$product->setName($httpRequest["field_name"]);
			$product->setDescription($httpRequest["field_description"]);
			$product->setDateOut($httpRequest["field_date"]);
			$product->setPrice($httpRequest["field_price"]);
			$product->setCurrency($httpRequest["field_currency"]);
			return (new ProductModel())->update($product);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function delete($httpRequest)
	{
		try{
			return (new ProductModel())->delete($httpRequest["id"]);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function getAll()
	{
		try{
			return (new ProductModel())->getAll();
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function getAllJson()
	{
		try{
			return (new ProductModel())->getAllJsonFormat();
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function getProductById($productId)
	{
		try{
			return (new ProductModel())->getProductById($productId);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}
}