<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if(!defined('NV_IS_CRON'))die('Stop!!!');function cron_auto_del_temp_download(){$dir=NV_ROOTDIR."/".NV_TEMP_DIR;$result=true;if($dh=opendir($dir)){while(($file=readdir($dh))!==false){if(preg_match("/^(".nv_preg_quote(NV_TEMPNAM_PREFIX).")[a-zA-Z0-9\_\.]+$/",$file)){if((filemtime($dir.'/'.$file)+600)<NV_CURRENTTIME){if(is_file($dir.'/'.$file)){if(!@unlink($dir.'/'.$file)){$result=false;}}else{$rt=nv_deletefile($dir.'/'.$file,true);if($rt[0]==0){$result=false;}}}}}closedir($dh);clearstatcache();}return $result;}

?>