<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class StoreHoursController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		if($this->Auth->user() != NULL)
		{
			$this->Auth->allow();
			$this->layout = "default_admin";
		}
	}
	
	public function admin_index() {
		
	}
}
?>