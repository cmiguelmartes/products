<?php
include_once (ROOTPATH.'/Models/Connect/Connect.php');
include_once (ROOTPATH.'/Interfaces/Product/IProduct.php');
include_once (ROOTPATH.'/Classes/Product/Product.php');
include_once (ROOTPATH.'/Classes/Currency/Currency.php');

class ProductModel implements IProduct{

	private $SQL_INSERT = "insert into products(code,name,description,date_out,price,currency_id) value (?,?,?,?,?,?)";
	private $SQL_UPDATE = "update products set code = ?,name = ?,description = ?,date_out = ?,price = ?, currency_id = ? where product_id = ?";
	private $SQL_DELETE = "delete from products where product_id = ?";
	private $SQL_SELECT_ALL = "select product_id,products.code,products.name,description,date_out,price,currencies.currency_id,currencies.name as name_currency,symbol,currencies.code as code_currency from products inner join currencies on products.currency_id = currencies.currency_id";
	private $SQL_SELECT_BY_ID = "select product_id,code,name,description,date_out,price,currency_id from products where product_id = ?";

	public function save(Product $product)
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_INSERT);
			$stmt->bind_param("ssssii", 
				$product->getCode(), 
				$product->getName(),
				$product->getDescription(),
				$product->getDateOut(),
				$product->getPrice(),
				$product->getCurrency()
			);
			$rtn = $stmt->execute();
			$error = $stmt->error;
			$stmt->close();
			$conn->close();
			if($rtn)
			{
				return array("error"=>false,"message"=>"success");	
			}else{
				return array("error"=>true,"message"=>$error);		
			}
			
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function update(Product $product)
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_UPDATE);
			$stmt->bind_param("ssssiii", 
				$product->getCode(), 
				$product->getName(),
				$product->getDescription(),
				$product->getDateOut(),
				$product->getPrice(),
				$product->getCurrency(),
				$product->getId()
			);
			$rtn = $stmt->execute();
			$error = $stmt->error;
			$stmt->close();
			$conn->close();
			if($rtn)
			{
				return array("error"=>false,"message"=>"success");	
			}else{
				return array("error"=>true,"message"=>$error);		
			}
			
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function delete($productId)
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_DELETE);
			$stmt->bind_param("i",$productId);
			$rtn = $stmt->execute();
			$error = $stmt->error;
			$stmt->close();
			$conn->close();
			if($rtn)
			{
				return array("error"=>false,"message"=>"success");	
			}else{
				return array("error"=>true,"message"=>$error);		
			}
			
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function getAll()
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_SELECT_ALL);
			$stmt->execute();
			$stmt->bind_result(
				$product_id,
				$code,
				$name,
				$description,
				$date_out,
				$price,
				$currency_id,
				$name_currency,
				$symbol,
				$code_currency);
			$aProducts = array();
			while ($stmt->fetch()) {
				$product = new Product();
				$product->setId($product_id); 
				$product->setCode($code); 
				$product->setName($name);
				$product->setDescription($description);
				$product->setDateOut($date_out);
				$product->setPrice($price);
				$currency = new Currency();
				$currency->setCurrencyId($currency_id);
				$currency->setName($name_currency);
				$currency->setSymbol($symbol);
				$currency->setCode($code_currency);
				$product->setCurrency($currency);
				$aProducts[] = $product;
            }
			$stmt->close();
			$conn->close();
			return array("error"=>false,"message"=>"success","data"=>$aProducts);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function getProductById($productId)
	{
		try{
			$conn = new Connect();
			$stmt = ($conn->connect())->prepare($this->SQL_SELECT_BY_ID);
			$stmt->bind_param("i",$productId);
			$stmt->execute();
			$stmt->bind_result($product_id,$code,$name,$description,$date_out,$price,$currency_id);
			$product = new Product();
			while ($stmt->fetch()) {
				$product->setId($product_id); 
				$product->setCode($code); 
				$product->setName($name);
				$product->setDescription($description);
				$product->setDateOut($date_out);
				$product->setPrice($price);
				$product->setCurrency($currency_id);
            }
			$stmt->close();
			$conn->close();
			return array("error"=>false,"message"=>"success","data"=>$product);
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}

	public function getAllJsonFormat()
	{
		try{
			$aProducts = $this->getAll();
			$listProducts = array();
			foreach ($aProducts["data"] as $key => $product) {
				$listProducts[] = array(
					"id"=>$product->getId(),
					"codigo"=>$product->getCode(),
					"nombre"=>$product->getName(),
					"descripcion"=>$product->getDescription(),
					"fecha_salida"=>$product->getDateOut(),
					"precio"=>$product->getPrice(),
					"moneda_id"=>$product->getCurrency()->getCurrencyId(),
					"moneda"=>$product->getCurrency()->getName(),
					"simbolo"=>$product->getCurrency()->getSymbol(),
					"moneda_codigo"=>$product->getCurrency()->getCode()
				);
			}
			return array("error"=>false,"message"=>"success","data"=>json_encode($listProducts));
		}catch(Exception $e)
		{
			return array("error"=>true,"message"=>$e->getMessage());
		}
	}
}