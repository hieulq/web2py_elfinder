<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if(!defined('NV_IS_CRON'))die('Stop!!!');function cron_auto_sendmail_error_log(){global $global_config,$lang_global;$result=true;$error_log_fileext=preg_match("/[a-z]+/i",NV_LOGS_EXT)?NV_LOGS_EXT:'log';$file=NV_ROOTDIR.'/'.NV_LOGS_DIR.'/error_logs/sendmail.'.$error_log_fileext;if(file_exists($file)and filesize($file)>0){$result=nv_sendmail(array($global_config['site_name'],$global_config['site_email']),$global_config['error_send_email'],sprintf($lang_global['error_sendmail_subject'],$global_config['site_name']),$lang_global['error_sendmail_content'],$file);if($result){if(!@unlink($file)){$result=false;}}}return $result;}

?>