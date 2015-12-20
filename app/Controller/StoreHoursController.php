<?php
App::uses('AppController', 'Controller');

class StoreHoursController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();

		if(Router::getParam('prefix', true) == 'api')
		{
			$this->Auth->allow('api_hours');
		}
		
		if($this->Auth->user() != NULL)
		{
			$this->Auth->allow();
			$this->layout = "default_admin";
		}
	}	

	public function admin_index() {
		$hours = $this->StoreHour->find('all');
		$this->set('hours', $hours);
		
		$this->loadModel('HolidayHour');
		$sHours = $this->HolidayHour->find('all');
		$this->set('sHours', $sHours);
	}
	
	public function api_getHours() {
		$this->layout = null;
		$this->autoRender = false;
		$this->request->allowMethod('post');
		
		if(!isset($this->params['data']['id']) || !is_numeric($this->params['data']['id']))
		{
			return json_encode(array(
					'status_code' => 400,
					'status_text' => "ID must specific and be a numeric value"
			));
		}
		
		$result = $this->StoreHour->query("SELECT sh.id, sh.open, sh.close FROM `csy_store_hours` as sh WHERE sh.id = {$this->params['data']['id']}");
		
		$ret = array('id' => $this->params['data']['id']);
		$ret['open'] = date("g:i a", strtotime($result[0]['sh']['open']));
		$ret['close'] = date("g:i a", strtotime($result[0]['sh']['close']));
		
		return json_encode(array(
				'status_code' => 200,
				'status_text' => "Success",
				'data' => array("hours" => $ret
				)
		));
	}
	
	public function api_hours() {
		$this->layout = null;
		$this->autoRender = false;
		$this->request->allowMethod('post');
		
		$days = $this->StoreHour->query("SELECT `csy_store_hours`.*, `csy_holiday_hours`.`name` as holiday, `csy_holiday_hours`.`open` as hOpen, csy_holiday_hours.close as hClose, csy_holiday_hours.closed as hClosed FROM `csy_store_hours` LEFT JOIN `csy_holiday_hours` ON STR_TO_DATE(CONCAT(DATE_FORMAT(NOW(),'%X%V'),`csy_store_hours`.`day`), '%X%V%W') = `csy_holiday_hours`.`date`");
		
		$weekdays = array();
		foreach($days as $day)
		{
			$wd = array();
			$wd['id'] = $day['csy_store_hours']['id'];
			$wd['day'] = $day['csy_store_hours']['day'];
			if(isset($day['csy_holiday_hours']['holiday']))
			{
				$wd['holiday'] = $day['csy_holiday_hours']['holiday'];
				$wd['open'] = date("g:i a", strtotime($day['csy_holiday_hours']['hOpen']));
				$wd['close'] = date("g:i a", strtotime($day['csy_holiday_hours']['hClose']));
				$wd['closed'] = $day['csy_holiday_hours']['hClosed'];
			}
			else
			{
				$wd['open'] = date("g:i a", strtotime($day['csy_store_hours']['open']));
				$wd['close'] = date("g:i a", strtotime($day['csy_store_hours']['close']));
			}
			array_push($weekdays, $wd);
		};
		
		return json_encode(array(
				'status_code' => 200,
				'status_text' => "Success",
				'data' => array("store_hours" => $weekdays
				)
		));
	}
	
	public function api_updateRegularHours() {
		$this->layout = null;
		$this->autoRender = false;
		$this->request->allowMethod('post');
		
		if(!isset($this->params['data']['id']) || !is_numeric($this->params['data']['id']))
		{
			return json_encode(array(
				'status_code' => 400,
				'status_text' => "ID must specific and be a numeric value"
			));
		}
		
		$id = $this->params['data']['id'];
		
		if( !$this->StoreHour->find('count', array( 'conditions' => array('id' => $this->params['data']['id']))) )
		{
			return json_encode(array(
					'status_code' => 400,
					'status_text' => "$id is an invalid ID."
			));
		}
		
		$openingTime = date("H:i", strtotime($this->params['data']['open']));
		$closingTime = date("H:i", strtotime($this->params['data']['close']));	
		
		if($closingTime < $openingTime)
		{
			return json_encode(array(
					'status_code' => 200,
					'status_text' => "Failure",
					'details' => 'Closing time must be after opening time',
					'data' => null
			));
		}
		
		$result = $this->StoreHour->query("UPDATE `csy_store_hours` SET `open` = '$openingTime', `close` = '$closingTime' WHERE `csy_store_hours`.`id` = $id");
				
		return json_encode(array(
				'status_code' => 200,
				'status_text' => "Success",
				'details' => 'Successfully updated store hours.',
				'data' => array ( 'id' => $id )
		));
	}
}
?>