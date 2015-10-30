<?php
class TrendingPostsShell extends AppShell {
	public $uses = array('PostTrend');
	
	public function main() {
		$day = jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")), 1);
		
		$this->out($day);
		
		$viewed = $this->PostTrend->query('SELECT post_id, Sunday + Monday + Tuesday + Wednesday + Thursday + Friday + Saturday as total ' .
										  'FROM csy_post_trends WHERE '.$day.' > 0');
		
		foreach($viewed as $posts)
		{
			$id = $posts['csy_post_trends']['post_id'];
			$total = $posts[0]['total'];
			$this->out($id . " " . $total);
			$this->PostTrend->updateAll(
				array('total' => $total),
				array('post_id' => $id)
			);
		}
						
		$this->PostTrend->updateAll(
			array($day => '0')		
		);
	}
}
?>