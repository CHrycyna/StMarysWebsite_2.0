<?php

// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {
	public $helpers = array(
			'Gravatar' => array(
					'className' => 'Gravatar'
			)
	);
	public function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user() != NULL)
		{
			$this->Auth->allow();
			$this->layout = "default_admin";				
		}
	}
	
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
	
	public function admin_index() {
	}
}