<?php

/**
 * @Project NUKEVIET 3.4
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2010 - 2012 VINADES.,JSC. All rights reserved
 * @Createdate Sun, 08 Apr 2012 00:00:00 GMT GMT
 */

if(!defined('NV_IS_FILE_ADMIN'))die('Stop!!!');if($nv_Request->isset_request('checkss','get')and $nv_Request->get_string('checkss','get')==md5($global_config['sitekey'].session_id())){$listid=$nv_Request->get_string('listid','get');$id_array=array_map("intval",explode(",",$listid));$sql="SELECT `id`, `listcatid`, `exptime`  FROM ".$db_config['prefix']."_".$module_data."_rows WHERE `id` in (".implode(",",$id_array).")";$result=$db->sql_query($sql);while(list($id,$listcatid,$exptime)=$db->sql_fetchrow($result)){if($exptime==0 or $exptime>NV_CURRENTTIME){$db->sql_query("UPDATE `".$db_config['prefix']."_".$module_data."_rows` SET `exptime` = '".NV_CURRENTTIME."' WHERE `id` =".$id."");$arr_catid=array_map("intval",explode(",",$listcatid));}}nv_del_moduleCache($module_name);}Header("Location: ".NV_BASE_ADMINURL."index.php?".NV_NAME_VARIABLE."=".$module_name."");die();

?>