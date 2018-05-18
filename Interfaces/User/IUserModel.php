<?php
include_once (ROOTPATH.'/Interfaces/CRUD/ICRUD.php');
interface IUserModel extends ICRUD{
	public function getByUserId();
	public function getByUserName();
	public function validateUser();
}