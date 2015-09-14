<?php

class Tag extends AppModel {

	public $hasMany = array(
			'PostTags' => array(
					'className' => 'PostTag',
			)
	);

}

?>