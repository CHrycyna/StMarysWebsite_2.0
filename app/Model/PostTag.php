<?php

class PostTag extends AppModel {
	public $primaryKey = 'id';
	
	public $hasOne = array(
        'ThisTagPost' => array(
            'className'  => 'Post',
            'foreignKey' => 'post_id'
         ),
		'PostTags' => array (
			'className' => 'Tag',
			'foreignKey' => 'tag_id'
		)
			
    );
}

?>