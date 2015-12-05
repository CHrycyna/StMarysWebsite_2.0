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
		if(!$this->isAuthorized($this->Auth->user()))
		{
			return $this->redirect(array('controller' => 'dashboard','action' => 'unauthorized'));
		}
		$this->loadModel('Role');
		$roles = $this->Role->find('all');
        $this->set('roles', $roles);
	}

	public function admin_edit($username = null) {
		if(!$this->isAuthorized($this->Auth->user()))
		{
			return $this->redirect(array('controller' => 'dashboard','action' => 'unauthorized'));
		}
		
		$this->loadModel('Role');
		$roles = $this->Role->find('all');
		$this->set('roles', $roles);
		
		$result = $this->User->findByUsername($username);

		$this->set('user', $result);
		//unset($user['User']['password']);
		//unset($result['User']['password']);
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
	
	public function api_register() {
		$this->layout = null;
		$this->autoRender = false;
		
		if($this->request->is('post'))
		{
				$data = $this->request->data;
								
				$results = $this->User->find('all', array(
					'conditions' => array('User.username' => $data['username']),
				));
				
				if(sizeof($results) > 0)
				{
					return json_encode(array(
							'status_code' => 0,
							'status_text' => "Username already Exists",
							'data' => null
					));
				}
				
				$results = $this->User->find('all', array(
						'conditions' => array('User.email' => $data['email']),
				));
				
				if(sizeof($results) > 0)
				{
					return json_encode(array(
							'status_code' => 0,
							'status_text' => "Email already Exists",
							'data' => null
					));
				}
				
				$this->User->Clear();
				$this->User->set(array(
						'username' => $data['username'],
						'email' => $data['email'],
						'password' => $data['password'],
						'role_id' => $data['role'],
						'firstname' => $data['first'],
						'lastname' => $data['last'],
						'created' => date('Y/m/d h:i:s', time()),
						'modified' => date('Y/m/d h:i:s', time()),
				));
				
				$this->User->save();

				return json_encode(array(
						'status_code' => 200,
						'status_text' => "User Successfully Added",
						'data' => null
				));
		}
		return json_encode(array(
				'status_code' => 0,
				'status_text' => "Invalid Request Type",
				'data' => NULL
		));
	}
	
	public function api_edit() {
		$this->layout = null;
		$this->autoRender = false;
		
		if($this->request->is('post'))
		{
			$data = $this->request->data;
			
			$user = array(
				"id" => $data['id'],
				"email" => $data['email'],
				"username" => $data['username'],
				"firstname" => $data['first'],
				"lastname" => $data['last'],
				"role_id" => $data['role'],
				"modified" => date('Y/m/d h:i:s', time()),
			);
		
			// This will update Recipe with id 10
			$this->User->save($user);
			
			return json_encode(array(
				'status_code' => 200,
				'status_text' => "User has successfully been updated",
				'data' => null
			)); 
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