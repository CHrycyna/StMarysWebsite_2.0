<?php

App::uses('AppModel', 'Model');

class User extends AppModel {
<<<<<<< HEAD
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A password is required'
            )
        )
    );
=======
	public $actsAs = array('Containable');	
	public $validate = array(
			'username' => array(
					'required' => array(
							'rule' => 'notBlank',
							'message' => 'A username is required'
					)
			),
			'password' => array(
					'required' => array(
							'rule' => 'notBlank',
							'message' => 'A password is required'
					)
			)
	);
>>>>>>> 7e51a4d8b80b5bc7b900991470ed95452f014efe
}

?>