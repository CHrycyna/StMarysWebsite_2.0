<?php

class TwitterController extends AppController{

	public function beforeFilter() {
		parent::beforeFilter();
	
		if(Router::getParam('prefix', true) == 'api')
		{
			$this->Auth->allow('api_getTweets');
		}
	
		if($this->Auth->user() != NULL)
		{
			$this->Auth->allow();
			$this->layout = "default_admin";
		}
	}
	public function api_getTweets(){
		$this->layout = null ;
		$this->autoRender = false;
		
		if(!$this->request->is('post'))
		{
			/*return json_encode(array(
					'status_code' => 0,
					'status_text' => "Invalid Request Type",
					'data' => NULL
			));*/
		}
		// import the PBTwitter class from the Lib folder
		App::build(array('Vendor' => array(APP . 'Vendor' . DS . 'twitteroauth' . DS . 'twitteroauth' . DS)));
		App::uses('TwitterOAuth', 'Vendor');
		
		# Define constants
		define('TWEET_LIMIT', 3);
		define('TWITTER_USERNAME', 'StMarysNursery');
		define('CONSUMER_KEY', 'GCALojl85E7rai5LmypsMEvfq');
		define('CONSUMER_SECRET', 'HKtUNoWD7d1dAq3G0qG0bHpoJLXT9mQV04dcaElLZslMUzjuoE');
		define('ACCESS_TOKEN', '109068887-SBI7oWJteUbQPo3jvbwQ44qxKXSXQf8OGP0aufGF');
		define('ACCESS_TOKEN_SECRET', 'e8RgfxeNRNFdQCylQsGAzqKMsCHSMaMH1TpvSQB3olU3b');
		
		# Create the connection
		$twitter = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
		# Migrate over to SSL/TLS
		$twitter->ssl_verifypeer = true;
		# Load the Tweets
		$tweets = $twitter->get('statuses/user_timeline', array('screen_name' => TWITTER_USERNAME, 'exclude_replies' => 'true', 'include_rts' => 'true', 'count' => TWEET_LIMIT));
		# Example output
		
		$ret = array();
		$ret["username"] = TWITTER_USERNAME;
		$myTweet = array();
				
		if(!empty($tweets)) {
		    foreach($tweets as $tweet) {
		    	$t = array();
		    	$t["text"] = $tweet['text'];
		        $t["date"] = $tweet['created_at'];
		        array_push($myTweet, $t);
		    }
		  
		}
		
		$ret["tweets"] = $myTweet;
		
		
		// set the tweets to my view
		return json_encode(array(
					'status_code' => 200,
					'status_text' => 'Success',
					'data' => $ret
			));
	}
}