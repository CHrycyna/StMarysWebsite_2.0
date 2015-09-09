<?php

class BlogsController extends AppController {
	public $helpers = array ('Html', 'Form');
	
	public function index() {
		$this->set('blogs', $this->Blog->find('all'));
	}
}

?>