<?php

class PostsController extends AppController {
	public $helpers = array ('Html', 'Form');
	
	public function index() {
		$this->loadModel('User');
		$this->set('posts', $this->Post->find('all', array(
				'order' => array('Post.created DESC'),
				'fields' => array('Post.*', 'user.username'),
				'joins' => array(
						array(	'table' => 'users',
								'alias' => 'User',
								'type' => 'INNER',
								'conditions' => array(
										'User.id = Post.user_id',
								)
						)
				)
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
		if(sizeof($post))
			$this->set('post', $post);

		$this->loadModel('PostTag');
		
		$tags = $this->PostTag->find('list', array(
    			'conditions' => array('PostTag.post_id' => $id), //array of conditions 	
 				'fields' => array('Tag.tag'),
 				'joins' => array(
 						array(	'table' => 'tags',
 								'alias' => 'Tag',
 								'type' => 'LEFT',
 								'conditions' => array(
 										'Tag.id = PostTag.tag_id',
 								)
 						)
 				)
 		));
		
		if(sizeof($tags))
			$this->set('tags', $tags);
		
	}
	
	public function tag($tag = null) {
		if(!$tag) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		$this->loadModel('PostTag');
		$this->loadModel('Tag');
		$this->loadModel('User');
		
		$posts = $this->Post->find('all', array(
				'order' => array('Post.created DESC'),
				'fields' => array('Post.*', 'user.username'),
				'conditions' => array('Tag.tag' => $tag), //array of conditions
				'joins' => array(
						array(	'table' => 'users',
								'alias' => 'User',
								'type' => 'INNER',
								'conditions' => array(
										'User.id = Post.user_id',
								)
						),
						array('table' => 'post_tags',
					        'alias' => 'PostTag',
					        'type' => 'inner',
					        'conditions' => array(
					            'Post.id = PostTag.post_id'
					        )
					    ),
					    array('table' => 'tags',
					        'alias' => 'Tag',
					        'type' => 'inner',
					        'conditions' => array(
					            'PostTag.tag_id = Tag.id'
					        )
					    )
				)
		));
		
		$this->set('tag', $tag);
		$this->set('posts', $posts);
	}
	
	public function author($username) {
		if(!$username) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		$this->loadModel('User');
		
		$posts = $this->Post->find('all', array(
				'conditions' => array('User.username' => $username), //array of conditions
				'joins' => array(
						array('table' => 'users',
								'alias' => 'User',
								'type' => 'inner',
								'conditions' => array(
										'Post.user_id = User.id'
								)
						)
				)
		));
		
		$this->set('posts', $posts);
		$this->set('author', $username);
	}
}

?>