<?php

class ROle extends AppModel {
	public $actsAs = array('Containable');

	public $hasMany = array(
			'UserRoles' => array(
					'className'  => 'User',
					'foreignKey' => 'role_id'
			)
	);
}

?>