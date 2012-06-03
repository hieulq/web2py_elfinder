<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$t=$nv_Request->get_int('t','get',0);nv_insert_logs(NV_LANG_DATA,$module_name,'log_del',"id ".$t,$admin_info['userid']);if($t==3){$sql=$sql="TRUNCATE TABLE `".NV_PREFIXLANG."_".$module_data."_send`";$db->sql_query($sql);}elseif($t==2){$sends=$nv_Request->get_array('sends','post',array());if(!empty($sends)){$in=implode(",",$sends);$sql=$sql="DELETE FROM `".NV_PREFIXLANG."_".$module_data."_send` WHERE id IN (".$in.")";$db->sql_query($sql);}}else{$id=$nv_Request->get_int('id','get',0);if($id){$sql=$sql="DELETE FROM `".NV_PREFIXLANG."_".$module_data."_send` WHERE id = ".$id;$db->sql_query($sql);}}nv_del_moduleCache($module_name);Header("Location: ".NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name);die();

?>