<?php 


namespace Drupal\igloo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

/*
$query = db_update('node') // Table name no longer needs {}
  ->fields(array(
    'uid' => 5,
    'status' => 1,
  ))
  ->condition('created', REQUEST_TIME - 3600, '>=')
  ->execute();

// Above Example is Equivalent to the Following in D6
$result = db_query("UPDATE {node} SET uid = %d, status = %d WHERE created >= %d", 5, 1, time() - 3600);
*/

class AjaxController extends ControllerBase {
	
	public function stream_setting_update(){

	}

	public function stream_setting_active($bool){
		$user = ControllerBase::currentUser();
		
		$num_rows = db_update('stream_setting') 
		  ->fields(array(
		    'stream_active' => (($bool=="0")?"1":"0"),
		  ))
		  ->condition('uid', $user->id(), '=')
		  ->execute();
		if($num_rows==1){
			echo $bool;
		}else
		{
			echo !$bool;
		}
		return new Response();
	}
}
  