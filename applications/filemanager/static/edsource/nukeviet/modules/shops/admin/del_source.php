<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$sourceid=$nv_Request->get_int('sourceid','post',0);$contents="NO_".$sourceid;list($sourceid)=$db->sql_fetchrow($db->sql_query("SELECT `sourceid` FROM `".$db_config['prefix']."_".$module_data."_sources` WHERE `sourceid`=".intval($sourceid).""));if($sourceid>0){list($check_rows)=$db->sql_fetchrow($db->sql_query("SELECT COUNT(*) FROM `".$db_config['prefix']."_".$module_data."_rows` WHERE `sourceid` = '".$sourceid."'"));if(intval($check_rows)>0){$contents="ERR_".sprintf($lang_module['delcat_msg_rows'],$check_rows);}else{$query="DELETE FROM `".$db_config['prefix']."_".$module_data."_sources` WHERE `sourceid`=".$sourceid."";if($db->sql_query($query)){$db->sql_freeresult();nv_fix_source();$contents="OK_".$sourceid;}}}nv_del_moduleCache($module_name);echo $contents;

?>