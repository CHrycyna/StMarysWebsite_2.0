<?php

class Post extends AppModel {
	public $primaryKey = 'id';
	
	public $validate = array(
			'title' => array(
					'rule' => 'notBlank'
			),
			'body' => array(
					'rule' => 'notBlank'
			)
	);
}
?>