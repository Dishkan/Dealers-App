<?php
namespace App\Repositories;

abstract class Repository {
	
	protected $model = FALSE;
	
	
	public function get($select = '*') {
		
		$builder = $this->model->select($select);
		
		
		return $builder->get();
	}
	
}




?>