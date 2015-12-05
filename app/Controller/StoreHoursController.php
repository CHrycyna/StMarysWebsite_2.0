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
	}
	
	public function api_hours() {
		$this->layout = null;
		$this->autoRender = false;
		
		if($this->request->is('post'))
		{
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
		
		return json_encode(array(
				'status_code' => 0,
				'status_text' => "Invalid Request Type",
				'data' => NULL
		));
	}
}
?>