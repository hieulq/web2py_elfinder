<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_SITEINFO'))die('Stop!!!');if(filter_text_input('logempty','post','')==md5("siteinfo_".session_id()."_".$admin_info['userid'])){$sql="TRUNCATE TABLE `".$db_config['prefix']."_logs`";if($db->sql_query($sql)){nv_del_moduleCache($module_name);nv_insert_logs(NV_LANG_DATA,$module_name,$lang_module['log_empty_log'],"All",$admin_info['userid']);die("OK");}else{die($lang_module['log_del_error']);}}$id=$nv_Request->get_int('id','post,get',0);$contents="NO_".$lang_module['log_del_error'];$number_del=0;if($id>0){$sql="DELETE FROM `".$db_config['prefix']."_logs` WHERE `id`=".$id."";if($db->sql_query($sql)){$db->sql_freeresult();$contents="OK_".$lang_module['log_del_ok'];++$number_del;}}else{$listall=$nv_Request->get_string('listall','post,get');$array_id=explode(',',$listall);$array_id=array_map("intval",$array_id);foreach($array_id as $id){if($id>0){$sql="DELETE FROM `".$db_config['prefix']."_logs` WHERE `id`=".$id."";$result=$db->sql_query($sql);++$number_del;}}$contents="OK_".$lang_module['log_del_ok'];}nv_insert_logs(NV_LANG_DATA,$module_name,$lang_global['delete'].' '.$lang_module['logs_title'],$number_del,$admin_info['userid']);include(NV_ROOTDIR."/includes/header.php");echo $contents;include(NV_ROOTDIR."/includes/footer.php");

?>