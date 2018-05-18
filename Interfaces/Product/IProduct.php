<?php
include_once (ROOTPATH.'/Classes/Product/Product.php');
interface IProduct{
	public function save(Product $product);
	public function update(Product $product);
	public function delete($productId);
	public function getAll();
	public function getProductById($productId);
	public function getAllJsonFormat();
}