<?php

class PostsController extends AppController {
	public $helpers = array ('Html', 'Form');
	
	public function index() {
		$this->set('posts', $this->Post->find('all', array(
				'order' => array('Post.created DESC'),
		)) );
	}
	
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
	
		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $post);
		
		$tags = $this->Post->query("
				SELECT csy_tags.tag 
				FROM csy_tags 
				INNER JOIN csy_posts_tags on csy_tags.id = csy_posts_tags.tag_id 
				WHERE csy_posts_tags.post_id = ". $id
				);
		$this->set('tags', $tags);
	}
}

?>