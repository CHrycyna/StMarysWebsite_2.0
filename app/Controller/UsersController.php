<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

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

	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->findById($id));
	}

	public function admin_add() {
		$this->loadModel('Role');
		$roles = $this->Role->find('all');
        $this->set('roles', $roles);
	}

	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(
					__('The user could not be saved. Please, try again.')
			);
		} else {
			$this->request->data = $this->User->findById($id);
			unset($this->request->data['User']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->allowMethod('post');

		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Flash->success(__('User deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Flash->error(__('User was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function api_add() {
		$this->layout = null;
		$this->autoRender = false;
		
		if($this->request->is('post'))
		{
				
		}
		return json_encode(array(
				'status_code' => 0,
				'status_text' => "Invalid Request Type",
				'data' => NULL
		));
	}

	public function api_get() {
		$this->layout = null;
		$this->autoRender = false;
		
		if($this->request->is('post'))
		{
			$options = array(
					'order' => array('User.lastname ASC', 'User.firstname ASC'),
					'fields' => array(
							'User.*',
							'User.username', 
							'User.firstname', 
							'User.lastname', 
							'User.email',
							'User.last_login',
							'User.modified',
							'Role.role'),
					'joins' => array(
							array(	'table' => 'roles',
									'alias' => 'Role',
									'type' => 'INNER',
									'conditions' => array(
											'User.role_id = Role.id',
									)
							)
					)
			);
			
			$users = $this->User->find('all', $options);
			
			return json_encode(array(
				'status_code' => 1,
				'status_text' => "Success",
				'data' => $users
			));
		}
		return json_encode(array(
				'status_code' => 0,
				'status_text' => "Invalid Request Type",
				'data' => NULL
		));
	}
}