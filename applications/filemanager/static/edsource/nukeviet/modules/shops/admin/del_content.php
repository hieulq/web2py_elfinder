<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$id=$nv_Request->get_int('id','post',0);$checkss=$nv_Request->get_string('checkss','post','');$listid=$nv_Request->get_string('listid','post','');$contents="NO_".$id;if($listid!=""and md5($global_config['sitekey'].session_id())==$checkss){$del_array=array_map("intval",explode(",",$listid));foreach($del_array as $id){if($id>0){$contents=nv_del_content_module($id);}}nv_insert_logs(NV_LANG_DATA,$module_name,'log_del_product',"id ".$listid,$admin_info['userid']);}elseif(md5($id.session_id())==$checkss){$contents=nv_del_content_module($id);nv_insert_logs(NV_LANG_DATA,$module_name,'log_del_product',"id ".$id,$admin_info['userid']);}nv_del_moduleCache($module_name);echo $contents;

?>