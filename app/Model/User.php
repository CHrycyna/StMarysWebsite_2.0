<?php

class User extends AppModel {
	public $primaryKey = 'id';
	
	public $hasMany = array(
			'MyPost' => array(
					'className' => 'Post',
			)
	);
}

?>