<?php

// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class DashboardController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user() != NULL)
			$this->Auth->allow();
	}
	
	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}
	
	public function admin_index() {
		$this->layout = "default_admin";
	}
}