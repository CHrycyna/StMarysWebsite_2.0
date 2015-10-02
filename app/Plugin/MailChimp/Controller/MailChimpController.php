<?php

App::uses('MailChimpAppController', 'MailChimp.Controller');

class MailChimpController extends MailChimpAppController {
	public $uses = ['MailChimp.MailChimp'];
	public $paginate = [];
	public function beforeFilter() {
		parent::beforeFilter();
	}
	/**
	 * Main admin backend for mailchimp
	 *
	 * @return void
	 * @throws NotFoundException
	 */
	public function admin_index() {
		$filters = [];
		if ($id = Configure::read('MailChimp.defaultListId')) {
			$filters['list_id'] = $id;
		}
		$lists = $this->MailChimp->lists($filters);
		if (empty($lists['data'])) {
			throw new NotFoundException(__('No subscriber list found'));
		}
		$defaultList = array_shift($lists['data']);
		$this->set(compact('defaultList', 'lists'));
	}
}

?>