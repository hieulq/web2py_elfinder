<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if(!defined('NV_IS_CRON'))die('Stop!!!');function cron_ref_expired_del(){$result=true;$log_path=NV_ROOTDIR.'/'.NV_LOGS_DIR.'/ref_logs';if($dh=opendir($log_path)){$log_start=mktime(0,0,0,date("n",NV_CURRENTTIME),1,date("Y",NV_CURRENTTIME));while(($logfile=readdir($dh))!==false){if(preg_match("/^([0-9]{10,12})\.".preg_quote(NV_LOGS_EXT)."$/",$logfile,$matches)){$d=( int )$matches[1];if($d<$log_start){if(!@unlink($log_path.'/'.$logfile)){$result=false;}}}}closedir($dh);clearstatcache();}return $result;}

?>