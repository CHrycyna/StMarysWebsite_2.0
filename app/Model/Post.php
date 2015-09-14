<?php

class Post extends AppModel {
	public $primaryKey = 'id';
	public $actsAs = array('Containable');
	
	public $validate = array(
			'title' => array(
					'rule' => 'notBlank'
			),
			'body' => array(
					'rule' => 'notBlank'
			)
	);
	
     public $hasMany = array(
        'ThisTagPost' => array(
            'className'  => 'PostTag',
            'foreignKey' => 'post_id'
         )
    );
    public $belongsTo = array(
        'MyAuthor' => array(
            'className'  => 'User',
            'foreignKey' => 'user_id'
         )
    );
}
?>