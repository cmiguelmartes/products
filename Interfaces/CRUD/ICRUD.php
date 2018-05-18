<?php
interface ICRUD{
	public function save();
	public function update();
	public function delete();
	public function getAll();
}