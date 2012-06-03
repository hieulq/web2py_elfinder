<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');$page_title=$lang_module['comment_delete_title'];$listid=$nv_Request->get_string('list','post,get');$del_array=explode(',',$listid);$del_array=array_map("intval",$del_array);foreach($del_array as $cid){$sql="DELETE FROM `".$db_config['prefix']."_".$module_data."_comments_".NV_LANG_DATA."` WHERE cid='$cid'";$result=$db->sql_query($sql);}nv_del_moduleCache($module_name);echo $lang_module['comment_delete_success'];

?>