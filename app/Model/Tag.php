<?php

class Tag extends AppModel {

	public $hasMany = array(
			'PostTag' => array(
					'className' => 'PostTag',
			)
	);

}

?>