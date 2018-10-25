<?php

require('interface.php');
// require('abstarct.php');

class Model implements Models {

	public function getname($value='')
	{
		var_dump(Models::VISIBILITY_PUBLIC, $value);
	}

	public function setname($value='')
	{
		print_r('set', $value);
	}

	public function insert($value='')
	{
		print_r('set', $value);
	}

}


$car = new Model();

$car->getname(1212);