<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_MOD_SHOPS'))die('Stop!!!');if(!defined('NV_IS_AJAX'))die('Wrong URL');$contents="";$difftimeout=360;$id=$nv_Request->get_int('id','get,post',0);$val=$nv_Request->get_int('val','get,post',0);$timeout=$nv_Request->get_int($module_name.'_'.$op.'_'.$id,'cookie',0);if($timeout==0 or NV_CURRENTTIME-$timeout>$difftimeout){$query="UPDATE `".$db_config['prefix']."_".$module_data."_rows` SET ratingdetail=ratingdetail+".$val." WHERE `id`=".$id;$db->sql_query($query);$nv_Request->set_Cookie($module_name.'_'.$op.'_'.$id,NV_CURRENTTIME);$msg=sprintf($lang_module['detail_rate_ok'],$val);$contents="OK_".$msg;}else{$timeout=ceil(($difftimeout-NV_CURRENTTIME+$timeout)/60);$timeoutmsg=sprintf($lang_module['detail_rate_timeout'],$timeout);$contents="ERR_".$timeoutmsg;}echo $contents;

?>