<?php 


namespace Drupal\igloo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;


class PageController extends ControllerBase {
  

	public function rootDir() {
        return $this->redirect('home');
    }

    public function home(){
    	$frontLiveArray = $this->buildFrontLiveArray();

    	return array(
    		'#theme' => 'home_twig',
    		'#frontLive' =>$frontLiveArray,
    		'#year' => date('Y')
		);
    }

     public function live($key){
        
       
        $liveStreamArray = $this->buildliveStreamArray($key);
        $user2 = ControllerBase::currentUser();
        global $user;
        var_dump(get_defined_vars()); 
        return array(
            '#theme' => 'live_stream_twig',
            '#liveStream' =>$liveStreamArray,
            // '#user' => $user
        );
    }
    public function stream_setting(){
        $user = ControllerBase::currentUser();
        $currentSettingArray = $this->buildStreamSettingArray($user);
        return array(
            '#theme' => 'live_stream_setting_twig',
            '#setting' =>$currentSettingArray,
            '#year' => date('Y')
        );
    }

    protected function buildStreamSettingArray($user){
        global $base_url; 
        $url = $base_url."/stream/Qd312WGH1";
        $stream_info = db_select('stream_setting','s')
            ->condition('uid', $user->id(), '=')
            ->fields('s')
            ->execute()
            ->fetchAssoc();
        
        $time = ($stream_info['stream_active']==1)?$stream_info['start_time']:"";
        $arr = array(
            'uid' => $user->id(),
            'URL' =>$stream_info['public_URL'],
            'key' => $stream_info['stream_key'],
            'title' => $stream_info['title'],
            'desc' => $stream_info['description'],            
            'time' => $time,
            'category' =>$stream_info['category'],
            'active'=>$stream_info['stream_active'],
        );
        var_dump(get_defined_vars()); 
        return $arr;
    }

    protected function buildliveStreamArray($key){
      
        global $base_url;  
        global $base_path; 
        $link = $base_url  .'/live/'. $key;
        $arr = array(
            'StreamLink' => $link,
        );
        return $arr;
    }
    protected function buildFrontLiveArray(){
    	$arr = array(
            'URL' => 'live/test',
            'Title' => 'Test Live',
            'Time' =>date("d-m-Y")
        );
    	return $arr;
    }
}
