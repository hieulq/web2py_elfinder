<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_MAINFILE'))die('Stop!!!');if(!defined('NV_IS_CRON'))die('Stop!!!');function cron_dump_autobackup(){global $db,$db_config,$global_config,$client_info;$result=true;$current_day=mktime(0,0,0,date("n",NV_CURRENTTIME),date("j",NV_CURRENTTIME),date("Y",NV_CURRENTTIME));$w_day=$current_day-($global_config['dump_backup_day']*86400);$contents=array();$contents['savetype']=($global_config['dump_backup_ext']=="sql")?"sql":"gz";$file_ext=($contents['savetype']=="sql")?"sql":"sql.gz";$log_dir=NV_ROOTDIR."/".NV_LOGS_DIR."/dump_backup";$contents['filename']=$log_dir."/".md5(nv_genpass(10).$client_info['session_id'])."_".$current_day.".".$file_ext;if(!file_exists($contents['filename'])){if($dh=opendir($log_dir)){while(($file=readdir($dh))!==false){if(preg_match("/^([a-zA-Z0-9]+)\_([0-9]+)\.(".nv_preg_quote($file_ext).")/",$file,$m)){if(intval($m[2])>0 and intval($m[2])<$w_day){@unlink($log_dir."/".$file);}}}closedir($dh);clearstatcache();}$contents['tables']=array();$res=$db->sql_query("SHOW TABLES LIKE '".$db_config['prefix']."_%'");while($item=$db->sql_fetchrow($res)){$contents['tables'][]=$item[0];}$db->sql_freeresult($res);$contents['type']="all";include(NV_ROOTDIR."/includes/core/dump.php");if(!nv_dump_save($contents)){$result=false;}}return $result;}

?>