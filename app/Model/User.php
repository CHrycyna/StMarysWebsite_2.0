<?php

class User extends AppModel {
	public $actsAs = array('Containable');	
	
	public $belongsTo = array(
			'MyRole' => array(
					'className'  => 'Role',
					'foreignKey' => 'role_id'
			)
	);
	
	public $hasMany = array(
        'MyPosts' => array(
            'className'  => 'Post',
            'foreignKey' => 'user_id'
         )
    );
}

?>