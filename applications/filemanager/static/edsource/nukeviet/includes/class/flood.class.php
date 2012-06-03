<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(defined('NV_CLASS_FLOODBLOCKER'))return;define('NV_CLASS_FLOODBLOCKER',true);if(!defined('NV_CURRENTTIME'))define('NV_CURRENTTIME',time());if(!defined('NV_LOGS_EXT'))define("NV_LOGS_EXT","log");class FloodBlocker{const INCORRECT_TEMPRORARY_DIRECTORY='Incorrect temprorary directory specified';const INCORRECT_IP_ADDRESS='Incorrect IP address specified';public $is_blocker;public $time_blocker;private $logs_path;private $ip_addr;private $rules=array(10=>10,60=>30,300=>50,3600=>200 );public function __construct($logs_path,$rules=array(),$ip=''){if(!is_dir($logs_path))trigger_error(FloodBlocker::INCORRECT_TEMPRORARY_DIRECTORY,E_USER_ERROR);if(substr($logs_path,-1)!='/')$logs_path.='/';if(empty($ip))$ip=$_SERVER['REMOTE_ADDR'];$ip=ip2long($ip);if($ip==-1||$ip===false)trigger_error(FloodBlocker::INCORRECT_IP_ADDRESS,E_USER_ERROR);$this->logs_path=$logs_path;$this->ip_addr=$ip;if(!empty($rules))$this->rules=$rules;$this->is_blocker=false;$this->time_blocker=0;$this->CheckFlood();}private function CheckFlood(){$info=array();$logfile=$this->logs_path.$this->ip_addr.'.'.NV_LOGS_EXT;if(file_exists($logfile)){$info=unserialize(file_get_contents($logfile));}foreach($this->rules as $interval=>$limit){if(!isset($info[$interval])){$info[$interval]['time']=NV_CURRENTTIME;$info[$interval]['count']=0;}++$info[$interval]['count'];if(NV_CURRENTTIME-$info[$interval]['time']>$interval){$info[$interval]['count']=1;$info[$interval]['time']=NV_CURRENTTIME;}if($info[$interval]['count']>$limit){$this->time_blocker=1+(NV_CURRENTTIME-$info[$interval]['time']-$interval)*-1;$this->is_blocker=true;}}if(empty($this->is_blocker))file_put_contents($logfile,serialize($info));}}

?>