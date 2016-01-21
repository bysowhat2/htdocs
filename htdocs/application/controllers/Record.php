<?php
class Record extends CI_Controller {

	public function log()
	{
		date_default_timezone_set('Asia/Shanghai');
		//$message = $_GET['message'];
		//$message = 'aaa';
		$path = dirname(__FILE__).'/../logs/'.date('y-m-d-H-i-s').'_log.html';
		error_log($_SERVER['HTTP_USER_AGENT'] , 3, $path);
	}
	
	
}

?>